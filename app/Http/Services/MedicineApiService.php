<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Resources\MedicineResource;
use App\Models\Medicine;

// TODO: Rate Limit on request
class MedicineApiService extends BaseApiService
{
   public function index()
   {
      return new MedicineResource(Medicine::all());
   }

   public function store(Request $request)
   {
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

   public function show($medicine)
   {
      $medicine = new MedicineResource(Medicine::findOrFail($medicine));
      parent::responseConstructor('Create', 'Success', $medicine);
   }

   public function update(Request $request, Medicine $medicine)
   {
      $validated = $request->validate([
         'name' => 'string|max:255',
         'substance_id' => 'number',
         'manufacturer_id' => 'number',
         'price' => 'number',
      ]);
      dd($request->only(['name', 'substance_id', 'manufacturer_id', 'price']));
      $medicine->update($request->only(['name', 'substance_id', 'manufacturer_id', 'price']));

      return new MedicineResource($medicine);
   }

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
