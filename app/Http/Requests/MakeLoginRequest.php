<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
class MakeLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function tryToLogin():bool{
        if($user = User::query()->where('email', '=', $this->email)->first())
        {
            if(Hash::check($this->password,$user->password)){
                auth()->login($user);
                return true;
            }
        }
        return false;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'email'=>['required','email'],
            'password'=>'required'
        ];
    }
}
