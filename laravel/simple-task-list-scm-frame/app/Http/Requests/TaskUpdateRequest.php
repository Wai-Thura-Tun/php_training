<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    /**
     * Summary of authorize
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Summary of rules
     * @return array<string>
     */
    public function rules()
    {
        return [
            'uid' => 'required',
            'utitle' => 'required',
            'udetail' => 'required'
        ];
    }
}
