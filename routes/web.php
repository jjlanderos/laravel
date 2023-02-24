<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
   echo "<a href='".route('contactos')."'>Contacto</a><br>"; //route('ruta_con_nombre')
   echo "<a href='".route('contactos')."'>Contacto 2</a>";
});
*/
Route::get('login', function(){
    echo 'login aqui';
});

Route::get('saludo/{param?}', function( $nombre = 'Invitado' ){  //? significa que no sea obligatorio
  return 'bienvenido '.$nombre;
});

Route::get('contactame', function(){
    echo "contacto";
})->name('contactos');  //ruta con nombre define el nombre con el que se identificara la ruta globalmente

/*
Route::get('/', function(){
    $nombre = 'Jesus Ibarra';
    //////Distintas formas de pasar parametros a la vista////////
    //return view('home')->with('nombre',$nombre);
    //return view('home')->with(['nombre'=>$nombre]);
    //return view('home',['nombre'=>$nombre]);
    return view('home',compact('nombre')); //nombre es nombre de la variable
})->name('home');
*/
/*
Route::view('ruta','vista','parametros');
*/

Route::view('/','home',['nombre'=>'jesus ibara'])->name('home');//solo para paginas que no tengan o no requieren el paso de muchas variables
Route::view('/quienes-somos','about')->name('about');
//Route::view('/portfolio','portfolio',compact('portafolio'))->name('portfolio');

////////////////////////////////////RUTAS REST/////////////////////////////////////////////////////////////
/*
Route::get('/portafolio','ProjectController@index')->name('project.index');// sintaxis: (url, controlador)
Route::get('/portafolio/crear','ProjectController@create')->name('project.create');

Route::get('/portafolio/{project}/editar','ProjectController@edit')->name('project.edit');
Route::patch('/portafolio/{project}','ProjectController@update')->name('project.update');

Route::post('/portafolio','ProjectController@store')->name('project.store');
Route::get('/portafolio/{project}','ProjectController@show')->name('project.show');// sintaxis: (url, controlador)

Route::delete('/portafolio/{project}','ProjectController@destroy')->name('project.destroy');
*/

//////////////////////////////////////ROUTE RESOURCE/////////////////////////////////////////
// 1.- Route::resource('project','ProjectController');
// 2.- Route::resource('portafolio','ProjectController')->names('project'); -->agregando nombre
Route::resource('portafolio','ProjectController')
    ->names('project')
    ->parameters(['portafolio'=>'project']);//nombre de parametro debe ser igual al definido en las clses
   // ->middleware('auth');  //para agregar un middleware
////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Route::resource('projects','PortfolioController'); //define varias routas
Route::view('/contacto','contact')->name('contact');
Route::post('contact','messageController@store')->name('messages.store');

Auth::routes(['register'=>false]);  //si se requiere quitar una ruta agreagarla de forma de arreglo
