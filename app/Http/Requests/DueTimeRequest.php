<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class DueTimeRequest extends FormRequest
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
        return [
            'due_date' => 'required|date|after:now',
        ];
    }

    public function messages() : array
    {
        return [
            'due_date.required' => 'Vui lòng sửa lại ngày hết hạn.',
            'due_date.date' => 'Ngày hết hạn phải là một ngày hợp lệ.',
            'due_date.after' => 'Ngày hết hạn phải lớn hơn thời gian hiện tại.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        session()->flash('alert-error', $validator->errors()->first());
        throw new HttpResponseException(redirect()->back()->withErrors($validator)->withInput());
    }
}
