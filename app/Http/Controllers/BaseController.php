<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMedicineItem;
use App\Http\Services\SuppliesService;
use App\Http\Controllers\TypesManager;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Interfaces\MedicineTypeInterface;

class BaseController extends TypesManager
{
    /**
     * index
     *
     * @param  mixed $substanceController
     * @return void
     */
    public function index()
    {
        return view('index', [
            'AllSubstance' => (new SuppliesService)->getAllSubstance(),
            'AllManufacture' => (new SuppliesService)->getAllManufacturer(),
            'AllMedicine' => (new SuppliesService)->getAllMedicine(),
            'SuppliesService' => new SuppliesService,
        ]);
    }
    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(CreateMedicineItem $request): RedirectResponse
    {
        $requestTable = mb_strtolower($request->input('supplies_list'));
        $this->make($requestTable)->store($request->input());

        return redirect()->route('home');
    }

    /**
     * make
     *
     * @param  mixed $flag_string
     * @return MedicineTypeInterface
     */
    public function make(string $flag_string): MedicineTypeInterface
    {
        switch ($flag_string) {
            case self::SUBSTANCE:
                return new SubstanceController();
                break;
            case self::MANUFACTURER:
                return new ManufacturerController();
                break;
            case self::MEDICINE:
                return new MedicineController();
                break;
            default:
                die();
        }
    }
}
