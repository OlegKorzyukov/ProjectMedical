<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Resources\MedicineResource;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\Medicine;

// TODO: Rate Limit on request
//TODO: take out validation and message 
class MedicineApiService extends BaseApiService
{
   /**
    * index
    *
    * @return Response
    */
   public function index(): Response
   {
      return response(new MedicineResource(Medicine::all()), 200);
   }

   /**
    * store
    *
    * @param  mixed $request
    * @return JsonResponse
    */
   public function store(Request $request): JsonResponse
   {
      dd($request);
      $validated = $request->validate([
         'name' => 'max:255',
         'substance_id' => 'number',
         'manufacturer_id' => 'number',
         'price' => 'number',
      ]);
      $medicine = Medicine::create($validated);
      $options = [
         'operation' => 'Create',
         'status' => 'Success',
         'model' => $medicine
      ];
      return response()->json($options, 201);
   }

   /**
    * show
    *
    * @param  mixed $medicine
    * @return Response
    */
   public function show($medicine): Response
   {
      return response(new MedicineResource(Medicine::findOrFail($medicine)), 200);
   }

   /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $medicine
    * @return JsonResponse
    */
   public function update(Request $request, Medicine $medicine): JsonResponse
   {
      dd($medicine);
      $validated = $request->validate([
         'name' => 'string|max:255',
         'substance_id' => 'number',
         'manufacturer_id' => 'number',
         'price' => 'number',
      ]);

      $medicine->update($request->only(['name', 'substance_id', 'manufacturer_id', 'price']));

      $options = [
         'operation' => 'Update',
         'status' => 'Success',
         'model' => $medicine
      ];
      return response()->json($options, 201);
   }

   /**
    * destroy
    *
    * @param  mixed $medicine
    * @return JsonResponse
    */
   public function destroy($medicine): JsonResponse
   {
      $medicine = Medicine::findOrFail($medicine);
      $options = [
         'operation' => 'Destroy',
         'status' => 'Success',
         'model' => $medicine
      ];

      if ($medicine->delete()) {
         return response()->json($options, 200);
      }
   }
}
