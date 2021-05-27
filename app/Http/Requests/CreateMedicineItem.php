<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMedicineItem extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $requestType = mb_strtolower($this->input('supplies_list'));
        switch ($requestType) {
            case 'substance':
                return [
                    'supplies_name' => 'string|max:200|min:3',
                ];
                break;
            case 'manufacturer':
                return [
                    'supplies_name' => 'string|max:200|min:3',
                    'supplies_link' => 'url',
                ];
                break;
            case 'medicine':
                return [
                    'supplies_name' => 'string|max:200|min:3',
                    'supplies_price' => 'integer',
                    'supplies_substance' => 'integer',
                    'supplies_manufacturer' => 'integer',
                ];
                break;
            default:
                die();
        }
    }
}
