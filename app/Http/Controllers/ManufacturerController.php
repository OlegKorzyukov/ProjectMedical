<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Interfaces\MedicineTypeInterface;

// TODO: get out validation to request controller
class ManufacturerController extends Controller implements MedicineTypeInterface
{
    /**
     * store
     *
     * @param  mixed $name
     * @param  mixed $link
     * @return RedirectResponse
     */
    public function store(array $params): RedirectResponse
    {
        $newManufacturer = Manufacturer::create([
            'name' => $params['supplies_name'],
            'link' => $params['supplies_link'],
        ]);
        return  redirect(route('home'));
    }

    /**
     * destroy
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        $manufactureId = filter_var($request->input('manufactureId', FILTER_SANITIZE_NUMBER_INT));
        Manufacturer::destroy((int)$manufactureId);

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
            'link' => 'string'
        ]);
        $manufacturer = Manufacturer::findOrFail($request->id);
        $update = $manufacturer->update($validated);

        if ($update) {
            return response()->json('Success', 201);
        }
    }
}
