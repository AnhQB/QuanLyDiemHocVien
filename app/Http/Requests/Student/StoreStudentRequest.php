<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => [
                'bail',
                'required',
                'string',
            ],
            'avatar' => [
                'bail',
                'required',
                'image'
            ],
            'date_of_birth' => [
                'bail',
                'required',
                'date',
                'before:today',

            ],
            'gender' => [
                'bail',
                'required',
                'boolean'
            ],
            'phone' => [
                'bail',
                'required',
            ],
            'address' => [
                'bail',
                'required',
                'string'
            ],
            'email' => [
                'bail',
                'nullable',
                Rule::Unique('students','email'),
            ],
            'password' => [
                'bail',
                'required'
            ],
            'semester_major' => [
                'bail',
                'required',
                'digits_between:1,9',
            ],
            'major_id' => [
                'bail',
                'required',
                Rule::exists('majors','id'),
            ],
            'degree_id' => [
                'bail',
                'required',
                Rule::exists('degrees','id'),
            ],
        ];
    }
}
