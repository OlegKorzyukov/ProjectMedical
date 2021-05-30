<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Resources\MedicineResource;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\Medicine;

// TODO: Rate Limit on request
//TODO: take out validation and message 
// TODO: create request validation controller
class MedicineApiService extends BaseApiService
{
   /**
    * index
    *
    * @return MedicineResource
    */
   public function index(): MedicineResource
   {
      return new MedicineResource(Medicine::all());
   }

   /**
    * store
    *
    * @param  mixed $request
    * @return JsonResponse
    */
   public function store(Request $request): JsonResponse
   {
      $validated = $request->validate([
         'name' => 'string|max:255',
         'substance_id' => 'numeric|exists:substances,id',
         'manufacturer_id' => 'numeric|exists:manufacturers,id',
         'price' => 'numeric',
      ]);
      $medicine = Medicine::create($request->only(['name', 'substance_id', 'manufacturer_id', 'price']));
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
    * @return MedicineResource
    */
   public function show($medicine): MedicineResource
   {
      return new MedicineResource(Medicine::findOrFail($medicine));
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
      $validated = $request->validate([
         'name' => 'string|max:255',
         'substance_id' => 'numeric|exists:substances,id',
         'manufacturer_id' => 'numeric|exists:manufacturers,id',
         'price' => 'numeric',
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
