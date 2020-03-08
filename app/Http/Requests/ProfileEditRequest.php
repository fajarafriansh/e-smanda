<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use App\UserDetail;

class ProfileEditRequest extends FormRequest
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
            'name' => 'required|string',
            'role' => 'required|string',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Nama tidak boleh kosong.',
            'role.required' => 'Jabatan tidak boleh kosong.'
        ];
    }
}
