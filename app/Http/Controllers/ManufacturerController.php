<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    public function store($name, $link)
    {
        $newManufacturer = Manufacturer::create([
            'name' => $name,
            'link' => $link,
        ]);
        return  redirect(route('home'));
    }
}
