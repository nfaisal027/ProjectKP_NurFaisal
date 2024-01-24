<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'min:3'],
            'province_id' => ['required'],
            'kota_id' => ['required'],
            'courier' => ['required'],
            'no_hp' => ['required', 'min:9'],
            'alamat' => ['required', 'string', 'min:3'],
            'ongkir' => ['required'],
        ];
    }
}
