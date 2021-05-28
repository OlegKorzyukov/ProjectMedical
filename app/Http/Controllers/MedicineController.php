<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Interfaces\MedicineTypeInterface;

class MedicineController extends Controller implements MedicineTypeInterface
{
    /**
     * store
     *
     * @param  mixed $name
     * @param  mixed $substanceId
     * @param  mixed $manufacturerId
     * @param  mixed $price
     * @return RedirectResponse
     */
    public function store(array $params): RedirectResponse
    {
        $newManufacturer = Medicine::create([
            'name' => $params['supplies_name'],
            'substance_id' => $params['supplies_substance'],
            'manufacturer_id' => $params['supplies_manufacturer'],
            'price' => $params['supplies_price'],
        ]);
        return  redirect(route('home'));
    }

    /**
     * destroy
     *
     * @param  mixed $request
     * @return void
     */
    public function destroy(Request $request): RedirectResponse
    {
        $medicineId = filter_var($request->input('medicineId', FILTER_SANITIZE_NUMBER_INT));
        Medicine::destroy((int)$medicineId);

        return  redirect(route('home'));
    }
}
