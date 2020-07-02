<?php

use Illuminate\Http\Request;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/teste', function(){
        return "Olá Mundo";
        // echo "Olá";
    });

    //recebendo valor no parametro na url
    Route::get('/bemvindo/{nome}', function($name){
        echo "Olá,Seja Bem Vindo(a), " . $name . "!";

    });

    //recebendo dois valor no parametro na url
    Route::get('/ap/{nome}/{sobrenome}', function($name,$surname){
        echo "Olá,Seja Bem Vindo(a), $name $surname!";

    });

    //recebendo valor opcional no parametro na url
    // Route::get('/seunome/{nome?}', function($name = null){
    //     if(isset($name))
    //     echo "Olá,Seja Bem Vindo(a), $name !";
    //     else
    //     echo "Você não digitou nenhum nome.";
    // });

    Route::get('/seunome/{nome?}', function($name = null){
        if(isset($name))
        return "Olá,Seja Bem Vindo(a), $name !";
        return "Você não digitou nenhum nome.";
    });

    //rotas com regras
    Route::get('/rotacomregra/{nome}/{num}', function($nome,$n){
        for($i=0; $i<$n; $i++)
        echo "Olá,Seja Bem Vindo(a), $nome ! <br>";
    })->where('nome','[A-Za-z]+')->where('num','[0-9]+');

    //agrupamentos de rotas
    Route::prefix('/app')->group(function() {

    Route::get('/',function(){
        return view('app'); // chamando o html
        // return "Meu App";
    });

    Route::get('/user',function(){
         return view('user');  // chamando o html
        // return "User";
    });

    Route::get('/profile',function(){
         return view('profile');  // chamando o html
        // return "Profile";
    });

    });

    //nomeando as rotas com agrupamento
    Route::prefix('/nomeandorotas')->group(function() {

    Route::get('/',function(){
        return view('app'); // chamando o html
        // return "Meu App";
    })->name('app2');

    Route::get('/user',function(){
         return view('user');  // chamando o html
        // return "User";
    })->name('app2.user');

    Route::get('/profile',function(){
         return view('profile');  // chamando o html
        // return "Profile";
    })->name('app2.profile');

    });
    //fim do agrupamento

     //nomeando as rotas
    Route::get('/produtos',function(){
        echo "<h1>Produtos</h1>";
        echo "<ol>";
        echo "<li> Notebook </li>";
        echo "<li> Impressora </li>";
        echo "<li> Mouse </li>";
        echo "</ol>";
    })->name('meusprodutos');

    //redirecionar requisições.Redireciona com todo os métodos Get,Post,Delete,Optios,etc
    Route::redirect('todosprodutos1','produtos');

    //redireconamento com tratamento usando "->name"
      Route::get('todosprodutos',function(){
          return redirect()->route('meusprodutos');
    });

    //métodos http - utilizar postman
      Route::post('/requisicoes',function(Request $request){
          return 'Hello POST';
    });

     Route::get('/requisicoes',function(Request $request){
          return 'Hello GET';
    });

     Route::put('/requisicoes',function(Request $request){
          return 'Hello PUT';
    });

     Route::patch('/requisicoes',function(Request $request){
          return 'Hello PATCH';
    });

    Route::options('/requisicoes',function(Request $request){
          return 'Hello OPTIONS';
    });

      Route::delete('/requisicoes',function(Request $request){
          return 'Hello DELETE';
    });