<?php

namespace App\Http\Requests;

use App\Enums\TypeUnitEnum;
use App\Enums\UserHasRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SpacesRequest extends FormRequest
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
                'space_name' => 'required|string|max:25',
                'access_level_space_id' => 'required|exists:access_level_spaces,id',
                'space_description' => 'nullable|string|max:1000',
            ];
            return $rule;
    }
}
