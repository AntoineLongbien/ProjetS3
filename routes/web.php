<?php

use Illuminate\Support\Facades\Route;
use App\View\Components\jeux;
use App\Models\Jeu;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', function () {
    return view('accueil.index');
});

Route::get('/enonce', function () {
    return view('enonce.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('jeux', 'JeuController');

Route::get('jeux.tri', function () {
    $jeux = Jeu::orderBy('nom', 'asc')->get();
    return view('jeux.index', ['jeux' => $jeux]);
})->name('jeux.tri');

Route::get('user/{id}/profile', function ($id) {
    $user=User::find($id);
    return view('jeux.profil')->with('user',$user);
})->name('profil');
