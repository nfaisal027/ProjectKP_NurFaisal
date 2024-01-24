<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoTipsRequest extends FormRequest
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
            'title' => ['required'],
            'deskripsi' => ['required'],
            'thumbnail' => ['required'],
            'files1' => 'nullable|mimes:jpeg,jpg,png,mp4,mov',
            'files2' => 'nullable|mimes:jpeg,jpg,png,mp4,mov',
            'files3' => 'nullable|mimes:jpeg,jpg,png,mp4,mov',
            'files4' => 'nullable|mimes:jpeg,jpg,png,mp4,mov',
        ];
    }
}
