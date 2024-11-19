<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Password;
class RegisterRequest extends FormRequest
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
           'name'=>['required','string'],
           'email'=>['required','email','confirmed','unique:users'],
           'password'=>['required', Password::defaults()],
           
       ];
    }

    public function tryToRegister():bool{
        Model::unguard(true);
       $user = User::query()->create(
           $this->validated()
       );
        
        auth()->login($user);
        return true;
    }
}
