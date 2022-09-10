<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users', [
            'users' => $users
        ]);
    }

    //public function show($id, $var = null){
    // User recebido na funcao show, vem do model, e so de passar ID já da select automaticamente e retorna o json do objeto users (table)
    public function show(User $user, $var=null){
        //return 'x: ' .$user . '<br><bR>var: ' .$var;
        return view('user',['user_arr' => $user]);
    }
}
