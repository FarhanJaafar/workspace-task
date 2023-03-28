<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddWorkspaceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required',
            'datetime'=> 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please fill the name of Workspace',
            'datetime.required' => 'Please put a due date',
        ];
    }
}
