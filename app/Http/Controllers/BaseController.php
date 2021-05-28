<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMedicineItem;

class BaseController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function store(CreateMedicineItem $request)
    {
        $requestTable = mb_strtolower($request->input('supplies_list'));
        $name = $request->input('supplies_name') ?? null;
        $link = $request->input('supplies_link') ?? null;
        $substanceId = $request->input('supplies_substance') ?? null;
        $manufacturerId = $request->input('supplies_manufacturer') ?? null;
        $price = $request->input('supplies_price') ?? null;

        //DONT DO THIS
        switch ($requestTable) {
            case 'substance':
                (new SubstanceController())->store($name);
                break;
            case 'manufacturer':

                (new ManufacturerController)->store($name, $link);
                break;
            case 'medicine':
                (new MedicineController)->store($name, $substanceId, $manufacturerId, $price);
                break;
            default:
                die();
        }

        return redirect()->route('home');
    }
}
