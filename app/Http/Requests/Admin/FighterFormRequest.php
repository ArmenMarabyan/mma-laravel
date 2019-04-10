<?php

namespace Mma\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FighterFormRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'nickname' => 'required',
            'nationality' => 'required',
            'wins' => 'required|integer',
            'loses' => 'required|integer',
            'not_heald' => 'required|integer',
        ];
    }
}
