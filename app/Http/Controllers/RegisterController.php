<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }
    
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated())->assignRole('Admin');

        alert()->success('Usuario creado correctamente');
        
        return redirect()->route('login');
    }
}
