<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

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

    public function destroy(Request $request)
    {
        $manufactureId = filter_var($request->input('manufactureId', FILTER_SANITIZE_NUMBER_INT));
        Manufacturer::destroy((int)$manufactureId);

        return  redirect(route('home'));
    }
}
