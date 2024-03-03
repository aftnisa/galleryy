<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileController;

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
    return view('halutam');
});
Route::get('/login', function () {
    return view('pages.login');
})->name('login');
Route::post('/auth', [AuthController::class,'auth']);
Route::get('/register', [AuthController::class,'register']);
Route::post('/registerd', [AuthController::class,'registerd']);



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function() {
        return view('pages.dashboard');
    });
    Route::get('/getdataexplore', [ExploreController::class,'getdata']);
    Route::post('/likefotos', [ExploreController::class,'likefotos']);


    //ROUTEE PROFILE YAAA
    Route::get('/ubahprofile', function () {
        $user = auth()->user();
        return view('pages.ubahprofile', compact('user'));
    });
    Route::get('/mypost', function() {
        return view('pages.posting');
    });
    Route::get('/dataprofile', [ProfileController::class,'getdataprofile']);
    Route::get('/profile', [ProfileController::class,'album']);
    Route::get('/getdataprofile/', [ProfileController::class,'getdata']);
    Route::post('/ubahprofile', [ProfileController::class, 'update']);
    Route::post('/likefoto', [ProfileController::class, 'likefotos']);


    //ROUTE FOTO DETAIL SENDIRI YAA
    Route::get('/detailsya/{id}', function() {
        return view('pages.detailsya');
    });
    Route::get('/tampildata', function() {
        $data = auth()->user();
        return view('page.detailsya', compact('data'));
    });
    Route::get('/detailsya/{id}/getdatadetailsya', [ProfileController::class, 'getdatadetailsya']);
    Route::post('/detailsya/kirimkomentar', [ProfileController::class, 'kirimkomentar']);
    Route::get('/detailsya/getkomentar/{id}', [ProfileController::class, 'ambildatakomentar']);
    Route::get('/detailsya/{id}', [ProfileController::class, 'tampildata']);



    //ROUTEE UPLOAD FOTO
    Route::get('/upload', [FotoController::class,'upload']);
    Route::post('/uploadfoto', [FotoController::class, 'uploadImage']);



    //ROUTEE FOTO DETAILLL YAAA
    Route::get('/detail/{id}', function() {
        return view('pages.detail');
    });
    Route::get('/detail/{id}/getdatadetail', [ExploreController::class,'getdatadetail']);
    Route::get('/detail/getkomentar/{id}', [ExploreController::class,'ambildatakomentar']);
    Route::post('/detail/kirimkomentar', [ExploreController::class,'kirimkomentar']);



    //ROUTE EDITT DESKRIPSI YAAA
    Route::get('/editdes/{id}', [ProfileController::class, 'editdeskripsi']);
    Route::post('/editdeskripsi/{id}', [ProfileController::class,'updatedeskripsi']);



    //ROUTEE ALBUMM YAAA
    Route::get('/isi_album', function() {
        return view('pages.isi_album');
    });
    Route::post('/tambah_album', [ProfileController::class, 'tambah_album']);
    Route::get('/album', [ProfileController::class, 'album']);
    Route::get('/album/{id}', [ProfileController::class, 'show'])->name('album.show');



    //ROUTEE UBAHH PASSWORD YAAA
    Route::get('/ubahpassword', function () {
        return view('pages.changepassword');
    });
    Route::post('/ubahpassword', [ProfileController::class, 'ubahpassword']);



    //ROUTEE DELETE PLUSS LOGOUT YAAA
    Route::get('/delete/{id}', [FotoController::class, 'delete']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

