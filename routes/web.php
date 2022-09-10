<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

Route::get('/request', function(Illuminate\Http\Request $request){
    $r = $request->all(); //put, post, querystring, delete
    $r = $request->query(); // apenas querystring
    $r = $request->path(); // tem ip tb
    $r = $request->fullUrl(); // ou somente url para vir sem Qrystring
    $r = $request->header(); //para cabecalho, autenticacao, etc

    $r = $request->input(); //para qrstring tb
    $r = $request->input('val'); //pega o valor da qrystring especifica ?val=xxx  exibe xxxx

    $r = $request->has('val'); //verifica se existe o campo preenchido da qrty ou post

    //exemplo de uso de condicional
    /* $r = $request->whenHas('val', function($val){
        dd('x', $val);
    }); */
    $r = $request->whenFilled('val', function($val){
        dd('x', $val);
    },function(){ //funciona como else
        dd ('campo nao preenchido');
    });

    //dd($r);
});

/* //aponta para o model, da tabela users
//function dd = dump and die
//user:email, pode passar a string email@xxx.com.br para pesquisar na tabela usuarios
Route::get('/user/{user:email}', function(\App\Models\User $user){
    dd ($user);
    echo '<hr>';
    echo $user;
}); */

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/user/{user}/{var?}', [UserController::class, 'show'])->name('user.show');

Route::get('/', function(){
    return view('welcome');
});




//agrupamento de rotas
Route::prefix('usuarios')->group(function(){
    Route::get('/', function(){
        return "index usuarios";
    });
    Route::get('/edit', function(){
        return "pagina editar user";
    });
    Route::get('/{id}', function($id){
        return "editar usuario: " .$id;
    });
});

//url com querystring opcional
Route::get('/empresa/{string?}', function($string = null){
    return 'entrou na pagina>: ' .$string;
});
//url com param fixo de qrystring apenas para exemplo
/* Route::get('/users/{paramA}/{paramB}', function($paramA, $paramB){
    return $paramB;
}); */
