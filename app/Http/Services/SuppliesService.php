<?php

namespace App\Http\Services;

use App\Models\Manufacturer;
use App\Models\Medicine;
use App\Models\Substance;

class SuppliesService
{
   public function splitCollection(Substance $substance, Manufacturer $manufacturer)
   {
      $substance = $substance->all();
      $merged = $substance->mergeRecursive($manufacturer->all());

      return $merged->all();
   }

   public function getAllSubstance()
   {
      return (new Substance)->all();
   }

   public function getAllManufacturer()
   {
      return (new Manufacturer)->all();
   }
   public function getAllMedicine()
   {
      return (new Medicine)->all();
   }
}
