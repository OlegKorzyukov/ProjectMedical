<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Interfaces\MedicineTypeInterface;

// TODO: get out validation to request controller
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

    /**
     * update
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        if (!is_numeric($request->id)) {
            return response()->json('Not found', 404);
        }

        $validated = $request->validate([
            'name' => 'string|max:255',
            'substance_id' => 'numeric|exists:substances,id',
            'manufacturer_id' => 'numeric|exists:manufacturers,id',
            'price' => 'numeric',
        ]);
        $medicine = Medicine::findOrFail($request->id);
        $update = $medicine->update($validated);

        if ($update) {
            return response()->json('Success', 201);
        }
    }
}
