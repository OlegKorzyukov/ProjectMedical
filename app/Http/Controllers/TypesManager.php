<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\MedicineTypeInterface;

abstract class TypesManager
{
   const MANUFACTURER = 'manufacturer';
   const SUBSTANCE = 'substance';
   const MEDICINE = 'medicine';

   /**
    * make
    *
    * @param  mixed $flag_string
    * @return MedicineTypeInterface
    */
   abstract public function make(string $flag_string): MedicineTypeInterface;
}
