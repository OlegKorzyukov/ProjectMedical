<?php

namespace App\Http\Controllers\Interfaces;

use Illuminate\Http\RedirectResponse;

interface MedicineTypeInterface
{

   /**
    * type
    *
    * @return string
    */
   public function store(array $values): RedirectResponse;
}
