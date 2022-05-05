<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskCreateRequest extends FormRequest
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
            'title' => 'required',
            'detail' => 'required'
        ];
    }
}
