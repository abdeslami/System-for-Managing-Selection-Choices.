<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\ChoixClassementController;
use App\Http\Controllers\CondidatureController;
use App\Http\Controllers\PDFController;
use App\Models\Candidature;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('agGrid');
});
Route::get('/admin', function () {
    return view('layouts.compte-layout');
});
Route::get("/acceuil", function(){
    return view("acceuil");
} );
Route::get("/users", function(){
    return User::select('name', 'email', 'role')->get();
}); 

Auth::routes(/* ["verify"=>true] */);
Route::get("/suivi", [CandidatureController::class,"index"])/* ->middleware('verified') */;
Route::get("/inscription", [CandidatureController::class,"create"]);
Route::post("/inscription/s1", [CandidatureController::class,"store"])->name("candidat-store");

Route::get("/choix", [ChoixClassementController::class,"index"]);
Route::get("/pdf", [PDFController::class,"generatePDF"])->name("fiche");




/* Route::get("/admin", [AdminController::class,'afficheDonne']);
 */
/* Route::get("/compte", [AdminController::class,'afficheDonneBase']);
Route::get("/fiche", [AdminController::class,'fiche']);

Route::get("/test", [AdminController::class,'affichetest']);
Route::get("/etudiante/{s?}", [AdminController::class,'etudiante']);




Route::get("/etudiant", [CondidatureController::class,'create']);
Route::post("/ajouterE", [CondidatureController::class,'store'])->name('ajouterE');
Route::get('/index',[CondidatureController::class,'index']);

*/
/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified'); 
 */