<?php

namespace App\Http\Services;

use App\Http\Resources\MedicineResource;

class BaseApiService
{
   /**
    * responseConstructor
    *
    * @param  mixed $operation
    * @param  mixed $status
    * @param  mixed $model
    * @return void
    */
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
