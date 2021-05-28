<?php

namespace App\Http\Services;

use App\Http\Resources\MedicineResource;

class BaseApiService
{
   public function responseConstructor(string $operation, string $status, MedicineResource $model)
   {
      $options = [
         'operation' => $operation,
         'status' => $status,
         'model' => $model
      ];

      return response()->json($options, 201);
   }
}
