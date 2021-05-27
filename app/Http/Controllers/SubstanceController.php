<?php

namespace App\Http\Controllers;

use App\Models\Substance;

class SubstanceController extends Controller
{
    public function store($name)
    {

        $newSubstance = Substance::create([
            'name' => $name,
        ]);
        return  redirect(route('home'));
    }
}
