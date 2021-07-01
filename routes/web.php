<?php
use App\Http\Controllers\FileController;
use App\Http\Controllers\VideogameController;
use App\Http\Controllers\FtpvideogameController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

// Route::get('inicio', function () {
//     return view('home');
// });
//estas dos rutas de abajo nos ayudan con la validacion de correos
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

//ruta para solicitar nuevamente el correo de verificacion
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::get('/', function () {
    //return view('welcome');
    return view('home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//con verified especifica que el usuario debe tener el correo verificado para poder acceder a estas paginas
Route::resource('videogame', VideogameController::class)->middleware('verified');
//->middleware('auth');
Route::post('ftpvideogame/{ftpvideogame}/agrega-usuario', [FtpvideogameController::class, 'agregaUsuario'])->name('ftpvideogame.agrega-usuario');
Route::resource('ftpvideogame', FtpvideogameController::class)->middleware('verified');

//me envia al metodo download dentro de file el nombre del archivo que se quiere descargar
Route::get('file/download/{file}', [FileController::class, 'download'])->name('file.download');

//es la ruta para todo lo que tiene que ver con el crud de archivos, pero le quitamos algunos metodos que no utilizaremos
Route::resource('file', FileController::class)->except(['edit', 'update', 'show']);
