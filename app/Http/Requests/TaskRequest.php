<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaskRequest extends FormRequest
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
            'task_name' => 'required|string|min:3|max:255',
            'task_description' => 'required|string|min:3|max:1000',
            'task_image' => 'image|mimes:jpeg,png,gif,webp|max:2048', // max size in KB
            'users' => 'array',
            'users.*' => 'integer|exists:users,id',
            'due_date' => 'nullable|date|after:now',
        ];
    }

    public function messages(): array
    {
        return [
            'task_name.required' => 'Vui lòng nhập tên dự án.',
            'task_name.min' => 'Tên dự án phải có ít nhất 3 ký tự.',
            'task_name.max' => 'Tên dự án không được vượt quá 255 ký tự.',
            'task_description.required' => 'Vui lòng nhập mô tả.',
            'task_description.min' => 'Mô tả phải có ít nhất 3 ký tự.',
            'task_description.max' => 'Mô tả không được vượt quá 1000 ký tự.',
            'task_image.required' => 'Vui lòng tải lên một hình ảnh.',
            'task_image.image' => 'Tệp phải là một hình ảnh.',
            'task_image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, hoặc gif.',
            'task_image.max' => 'Tệp không được vượt quá 2 MB.',
            'users.array' => 'Trường người dùng phải là một mảng.',
            'users.*.integer' => 'ID người dùng phải là số nguyên.',
            'users.*.exists' => 'Người dùng đã chọn không hợp lệ.',
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
