<?php

namespace App\Http\Controllers;

use App\Models\Substance;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Interfaces\MedicineTypeInterface;

// TODO: get out validation to request controller
class SubstanceController extends Controller implements MedicineTypeInterface
{
    /**
     * store
     *
     * @param  mixed $name
     * @return RedirectResponse
     */
    public function store(array $params): RedirectResponse
    {
        $newSubstance = Substance::create([
            'name' => $params['supplies_name'],
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
        $substanceId = filter_var($request->input('substanceId', FILTER_SANITIZE_NUMBER_INT));
        Substance::destroy((int)$substanceId);

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
        ]);
        $substance = Substance::findOrFail($request->id);
        $update = $substance->update($validated);
        if ($update) {
            return response()->json('Success', 201);
        }
    }
}
