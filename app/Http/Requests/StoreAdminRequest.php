<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:3|max:25',
            'last_name' => 'required|min:3|max:25',
            'gender' => 'required|in:' . implode(',', User::getEnum('gender')),
            // 'gender' => ['required', new Enum(ServerStatus::class)],
            'date_of_birth' => 'required|date',
            'email' => 'required|email',
            'password' => 'required',
            'mobile' => 'required',
        ];
    }
}
