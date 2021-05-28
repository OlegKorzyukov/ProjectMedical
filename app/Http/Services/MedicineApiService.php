<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Resources\MedicineResource;
use App\Models\Medicine;

class MedicineApiService
{
   public function index()
   {
      return new MedicineResource(Medicine::all());
   }

   public function store(Request $request)
   {

      $validated = $request->validate([
         'name' => 'required|max:255',
         'substance_id' => 'required|number',
         'manufacturer_id' => 'required|number',
         'price' => 'number',
      ]);
      dd($validated);
      $medicine = Medicine::create($validated);
      return response()->json([
         'status' => 'Success',
      ], 404);
   }

   public function show($medicine)
   {
      $medicine = new MedicineResource(Medicine::findOrFail($medicine));
      dd($medicine);
   }

   public function update(Request $request, Medicine $medicine)
   {
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
      } else {

         $options = [
            'operation' => 'Destroy',
            'status' => 'Failed',
         ];
         return response()->json($options, 404);
      }
   }
}
