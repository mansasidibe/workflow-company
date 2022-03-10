<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpechementController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TacheController;
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

Route::get('/admin_dashboard', [DashboardController::class, 'dashbord_admin'])->name('admin.dashbord');
Route::get('/chef-equipe', [DashboardController::class, 'dashbord_chef'])->name('chef.dashbord');
Route::get('/user', [DashboardController::class, 'dashbord_user'])->name('user.dashbord');

Route::get('/', [AuthController::class, 'login'])->name('user.login');
Route::post('/', [LoginController::class, 'dologin'])->name('user.doLog');
Route::post('/regist', [RegisterController::class, 'doregister'])->name('user.doReg');
Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::get('/lock', [AuthController::class, 'lock'])->name('user.lock');
Route::post('/unlock', [AuthController::class, 'unlock'])->name('user.unlock');
Route::get('/profil', [AuthController::class, 'profil'])->name('user.profil');
Route::post('/profil', [AuthController::class, 'update_profil'])->name('update.profil');

Route::get('/parametre', [AuthController::class, 'parametre'])->name('user.setting');
Route::post('/parametre', [AuthController::class, 'storeParametre'])->name('user.doSetting');

Route::resource('/projets', ProjetController::class);
Route::resource('/taches', TacheController::class);
Route::resource('/message', MessageController::class);
Route::resource('/equipes', EquipeController::class);
Route::resource('/membre', MembreController::class);
Route::get('/projet/{projet}/suppression', [ProjetController::class, 'destroy'])->name('projet.destroy');
Route::get('/equipe/chef', [EquipeController::class, 'chef'])->name('equipe.chef');
Route::get('/equipe/projet', [EquipeController::class, 'projet'])->name('equipe.projet');
Route::get('/equipe/tache', [EquipeController::class, 'tache'])->name('equipe.tache');
Route::get('/equipe/membre', [EquipeController::class, 'membre'])->name('equipe.membre');

Route::get('/personnel/presence', [PersonnelController::class, 'presence'])->name('personnel.presence');

Route::resource('/evenements', EvenementController::class);
Route::resource('/empechement', EmpechementController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
