<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StepTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rule = [
            'content' => 'required|max:1000',
        ];
        return $rule;
    }
    protected function failedValidation(Validator $validator)
    {
        // Lưu thông tin lỗi vào session
        session()->flash('alert-error', $validator->errors()->first());
        throw new HttpResponseException(redirect()->back()->withErrors($validator)->withInput());
    }
}
