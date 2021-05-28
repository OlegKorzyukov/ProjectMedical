<?php

namespace App\Http\Controllers;

use App\Models\Substance;
use Illuminate\Http\Request;

class SubstanceController extends Controller
{
    public function store($name)
    {

        $newSubstance = Substance::create([
            'name' => $name,
        ]);
        return  redirect(route('home'));
    }

    public function destroy(Request $request)
    {
        $substanceId = filter_var($request->input('substanceId', FILTER_SANITIZE_NUMBER_INT));
        Substance::destroy((int)$substanceId);

        return  redirect(route('home'));
    }
}
