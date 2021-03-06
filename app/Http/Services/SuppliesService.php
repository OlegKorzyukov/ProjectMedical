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
      $substances = ['substance' => $substance->all()];
      $manufacturers = ['manufacturer' => $manufacturer->all()];
      return array_merge($substances, $manufacturers);
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

   public function getNameById($id, $table = 'null')
   {
      if ('manufacturer' === mb_strtolower($table)) {
         return (new Manufacturer)->findOrFail($id)->name;
      }
      if ('substance' === mb_strtolower($table)) {
         return (new Substance)->findOrFail($id)->name;
      }
   }
}
