<?php

namespace App\Http\Controllers;

use App\Models\Substance;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Interfaces\MedicineTypeInterface;

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
}
