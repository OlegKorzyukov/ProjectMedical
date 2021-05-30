<?php

namespace App\Http\Controllers\Interfaces;

use Illuminate\Http\RedirectResponse;

interface MedicineTypeInterface
{

   /**
    * type
    *
    * @return \Illuminate\Http\RedirectResponse
    */
   public function store(array $values): RedirectResponse;
}
