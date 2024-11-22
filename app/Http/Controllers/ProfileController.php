<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;
/**
 * @property-read UploadedFile $photo
 */
class ProfileController extends Controller
{
    public function index()
    {
        return view('profile',[
            'user' => auth()->user()
        ]);
    }

    public function update(ProfileRequest $request)
    {
        Model::unguard(true);
        $user = auth()->user();

        $data = $request->validated();
        if($file = $request->photo){
            $data['photo'] = $file->store('photos');
        }

        $user->fill($data)->save();

        return back()->with('message', 'Perfil atualizado com sucesso');
    }
}
