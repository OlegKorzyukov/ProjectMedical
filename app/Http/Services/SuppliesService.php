<?php

namespace App\Http\Services;

use App\Models\Manufacturer;
use App\Models\Medicine;
use App\Models\Substance;

class SuppliesService
{
   /**
    * splitCollection
    *
    * @param  mixed $substance
    * @param  mixed $manufacturer
    * @return void
    */
   public function splitCollection(Substance $substance, Manufacturer $manufacturer)
   {
      $substance = $substance->all()->push('substance');
      $merged = $substance->mergeRecursive($manufacturer->all()->push('manufacturer'));

      return $merged->all();
   }

   /**
    * getAllSubstance
    *
    * @return void
    */
   public function getAllSubstance()
   {
      return (new Substance)->all();
   }

   /**
    * getAllManufacturer
    *
    * @return void
    */
   public function getAllManufacturer()
   {
      return (new Manufacturer)->all();
   }
   /**
    * getAllMedicine
    *
    * @return void
    */
   public function getAllMedicine()
   {
      return (new Medicine)->all();
   }
}
