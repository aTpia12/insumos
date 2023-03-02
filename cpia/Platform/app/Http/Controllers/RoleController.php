<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function updateRole(Request $request, $id)
    {
        $user = User::find($id);

        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->rol);

        alert()->success('Usuario creado correctamente');

        return redirect()->route('users.index');
    }
}
