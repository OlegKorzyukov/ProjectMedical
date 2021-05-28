<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Resources\MedicineResource;
use App\Models\Medicine;

// TODO: Rate Limit on request
class MedicineApiService extends BaseApiService
{
   /**
    * index
    *
    * @return void
    */
   public function index()
   {
      return new MedicineResource(Medicine::all());
   }

   /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
   public function store(Request $request)
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
    * @return void
    */
   public function show($medicine)
   {
      $medicine = new MedicineResource(Medicine::findOrFail($medicine));
      parent::responseConstructor('Create', 'Success', $medicine);
   }

   /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $medicine
    * @return void
    */
   public function update(Request $request, Medicine $medicine)
   {
      dd($medicine);
      $validated = $request->validate([
         'name' => 'string|max:255',
         'substance_id' => 'number',
         'manufacturer_id' => 'number',
         'price' => 'number',
      ]);

      $medicine->update($request->only(['name', 'substance_id', 'manufacturer_id', 'price']));

      return new MedicineResource($medicine);
   }

   /**
    * destroy
    *
    * @param  mixed $medicine
    * @return void
    */
   public function destroy($medicine)
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
