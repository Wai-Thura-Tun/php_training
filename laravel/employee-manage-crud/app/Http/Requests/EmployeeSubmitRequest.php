<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmployeeSubmitRequest extends FormRequest
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
            'fname' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'nname' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'salary' => 'required',
            'position' => 'required',
            'depart' => 'required',
            'skype' => 'required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'fname.required' => 'Fullname is required.',
            'fname.string' => 'Fullname must be string.',
            'dob.required' => 'Date Of Birth is required.',
            'dob.date' => 'Date Of Birth must be date-format.',
            'nname.required' => 'Nickname is required.',
            'nname.string' => 'Nickname must be string.',
            'phone.required' => 'Phone no. is required',
            'phone.numeric' => 'Phone no. must be numeric',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be valid.',
            'salary.required' => 'Salary is required.',
            'position.required' => 'Position is required',
            'depart.required' => 'Department is required',
            'skype.required' => 'SkypeID is required',
        ];
    }
}
