<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
    public function store($name, $substanceId, $manufacturerId, $price)
    {
        $newManufacturer = Medicine::create([
            'name' => $name,
            'substance_id' => $substanceId,
            'manufacturer_id' => $manufacturerId,
            'price' => $price,
        ]);
        return  redirect(route('home'));
    }

    public function destroy(Request $request)
    {
        $medicineId = filter_var($request->input('medicineId', FILTER_SANITIZE_NUMBER_INT));
        Medicine::destroy((int)$medicineId);

        return  redirect(route('home'));
    }
}
