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
      $medicine = Medicine::create([
         'user_id' => $request->user()->id,
         'title' => $request->title,
         'description' => $request->description,
      ]);

      return new MedicineResource($medicine);
   }

   public function show($medicine)
   {
      return new MedicineResource(Medicine::findOrFail($medicine));
   }

   public function update(Request $request, Medicine $medicine)
   {
      if ($request->user()->id !== $medicine->user_id) {
         return response()->json(['error' => 'You can only edit your own books.'], 403);
      }

      $medicine->update($request->only(['title', 'description']));

      return new MedicineResource($medicine);
   }

   public function destroy(Medicine $medicine)
   {
      $medicine->delete();

      return response()->json(null, 204);
   }
}
