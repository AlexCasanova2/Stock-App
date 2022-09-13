<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProveidorController;

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

Route::get('/', [PrincipalController::class, 'index'])->name('principal');

Route::get('/biblioteca', [BibliotecaController::class, 'index'])->name('biblioteca');

Route::get('/registro', [RegisterController::class, 'index'])->name('register');
Route::post('/registro', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/{user:name}', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

Route::get('/area/create', [AreaController::class, 'create'])->name('area.create');
Route::post('/area', [AreaController::class, 'store'])->name('area.store');
Route::delete('area/{area}', [AreaController::class, 'destroy'])->name('area.destroy');

Route::get('/client/create', [ClientController::class , 'create'])->name('client.create');
Route::post('/client', [ClientController::class, 'store'])->name('client.store');
Route::get('/client/{client}', [ClientController::class, 'show'])->name('client.show');
Route::delete('client/{client}', [ClientController::class, 'destroy'])->name('client.destroy');

Route::get('/element/create', [ElementController::class , 'create'])->name('element.create');
Route::post('/element', [ElementController::class, 'store'])->name('element.store');
Route::get('/element/{element}', [ElementController::class, 'show'])->name('element.show');
Route::delete('element/{element}', [ElementController::class, 'destroy'])->name('element.destroy');
Route::get('{element}/editar', [ElementController::class, 'edit'])->name('element.edit');
Route::post('/editar-element', [ElementController::class, 'updateElement'])->name('element.update');
Route::get('draft/{element}', [ElementController::class, 'setDraft'])->name('element.setDraft');

Route::get('/proveidor/create', [ProveidorController::class, 'create'])->name('proveidor.create');
Route::post('/proveidor', [ProveidorController::class, 'store'])->name('proveidor.store');
Route::get('/proveidor/{proveidor}', [ProveidorController::class, 'show'])->name('proveidor.show');
Route::delete('proveidor/{proveidor}', [ProveidorController::class, 'destroy'])->name('proveidor.destroy');

Route::get('/role/create', [RolesController::class , 'create'])->name('role.create');
Route::post('/role', [RolesController::class, 'store'])->name('role.store');

Route::post('element/{element}', [ComentarioController::class, 'store'])->name('comentarios.store');
//Route::delete('comentario/{comentario}', [ComentarioController::class, 'destroy'])->name('comentario.destroy');

Route::get('element/{element}/pdf', [ElementController::class, 'pdf'])->name('element.pdf');
Route::get('/element/search', [ElementController::class, 'search'])->name('element.search');