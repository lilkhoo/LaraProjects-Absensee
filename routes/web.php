<?php

use App\Http\Controllers\AbsentController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RombelController;
use App\Models\Absent;
use App\Models\Rayons;
use Illuminate\Support\Facades\Auth;

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

// Route login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

// Route register
Route::get('register', [RegisterController::class, 'index']);
// route untuk memberikan function store dari RegisterController kepada /register yang mana methodnya POST
Route::post('/register', [RegisterController::class, 'store']);

// Route Register
Route::get('/dashboard', function () {
    // return Absent::where('user_id', Auth::id())->get()[0]->user->rayon->nama_rayon;
    return view('dashboard.index', [
        'absent' => Absent::where('user_id', Auth::id())->paginate(5)
    ])->with('i', (request()->input('page', 1) - 1) * 5);
})->middleware('auth');

// Route Rayon
// Route::get('/rayons', [RayonController::class, 'index']);

// Route Logout
Route::post('/logout', [loginController::class, 'logout']);

// Route Absen
Route::resource('/absent', AbsentController::class);

// Route Rombels
Route::resource('/rombels', RombelController::class);

// Route Rayons
Route::resource('/rayons', RayonController::class);
// Route::get('/rayons{rayon:id}', [RayonController::class, 'update']);
// Route::get('/rayons{rayon:id}/edit', [RayonController::class, 'edit']); 

// Route Presence 
Route::resource('/presence', PresenceController::class);

// Route Attendance 
Route::resource('/attendance', AttendanceController::class);

Route::get('/absent/{absent:id}/izin', [AbsentController::class, 'attendance']);
Route::post('/logout', [loginController::class, 'logout']);

Route::post('/absent/{absent:id}/hadir', [AbsentController::class, 'present'])->name('absent.present');

Route::post('/absent/{absent:id}/pulang', [AbsentController::class, 'goHome'])->name('absent.goHome');
