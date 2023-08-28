<?php

use App\Http\Controllers\DaftarTamuController;
use App\Http\Controllers\FacebookId;
use App\Http\Controllers\ForgotPassword;
use App\Http\Controllers\GithubId;
use App\Http\Controllers\googleId;
use App\Http\Controllers\SendEmail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

// !! Login With Facebook
Route::controller(FacebookId::class)->group(function(){
    Route::get('auth/facebook','RedirectFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback','facebookCallback');
});


// !! Login with Github
Route::controller(GithubId::class)->group(function(){
    Route::get('auth/github','GithubRedirect')->name('auth.github');
    Route::get('auth/github/callback','GithubCallbak');
});

// !! login with google
Route::controller(googleId::class)->group(function(){
    Route::get('auth/google','GoogleRedirect')->name('auth.google');
    Route::get('auth/google/callback','GoogleCallback');
});


Route::get('/', function () {
    return view('welcome');
})->middleware('IsTamu');


// !! Verifikasi Email

Route::get('/email/verify', function () {
    return view('auth.verifikasiEmail');
})->name('verification.notice');
// ->middleware('auth')

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/DaftarTamu');
})->middleware(['auth', 'signed'])->name('verification.verify');

// !! Login routes

Route::get('/Login',[SessionController::class,'ViewLogin'])->middleware('IsTamu')->name('login');
Route::post('/Login',[SessionController::class,'Login']);

// !! Register Routes

Route::get('/Register',[SessionController::class,'RegisterView'])->middleware('IsTamu');
Route::post('/Register',[SessionController::class,'Register']);

// !! Home

Route::get('/DaftarTamu',[DaftarTamuController::class,'getUserAll'])->middleware('IsLogin');

// !! Absen
Route::get('/Absen',[DaftarTamuController::class,'AbsenView'])->middleware('IsLogin');
Route::post('/Absen',[DaftarTamuController::class,'Absen']);

// !! Profile
Route::get('/Profile',[DaftarTamuController::class,'ProfileView'])->middleware('IsLogin');

// !!Log Out
Route::get('/LogOut',[DaftarTamuController::class,'LogOut'])->middleware('IsLogin');

// !! ubah data
Route::get('/DaftarTamu/{id}/edit',[DaftarTamuController::class,'UbahView'])->middleware('IsLogin');
Route::put('/DaftarTamu/{id}',[DaftarTamuController::class,'Update']);

// !! Delete Daftar Tamu
Route::delete('/DaftarTamu/{nama}',[DaftarTamuController::class,'Delete'])->middleware('IsLogin');

// !! Aktifitas user
Route::get('/AktifitasTamu',[DaftarTamuController::class,'AktifitasTamu'])->middleware('IsLogin');


// !! Send Email

Route::get('/SendEmail',[SendEmail::class,'SendEmails']);

// !! forgot password View

Route::get('/forgot-password',[ForgotPassword::class,'ViewPassword'])->middleware('guest')->name('password.request');


// !! Route Post Password

Route::post('/forgot-password',[ForgotPassword::class,'ForgotPasswordPost'])->middleware('guest')->name('password.email');


// !! token password View

 Route::get('/reset-password/{token}',[ForgotPassword::class,'resetPasswordView'])->middleware('guest')->name('password.reset');

    // use App\Models\User;
    // use Illuminate\Auth\Events\PasswordReset;
    // use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Password;
// use Illuminate\Support\Str;

// !! token password Post
// Route::post('/reset-password', function (Request $request) {
//     $request->validate([
//         'token' => 'required',
//         'email' => 'required|email',
//         'password' => 'required|min:8|confirmed',
//     ]);

 
//     $status = Password::reset(
//         $request->only('email', 'password', 'password_confirmation', 'token'),
//         function (User $user, string $password) {
//             $user->forceFill([
//                 'password' => Hash::make($password)
//             ])->setRememberToken(Str::random(60));
 
//             $user->save();
 
//             event(new PasswordReset($user));
//         }
//     );
 
//     return $status === Password::PASSWORD_RESET
//                 ? redirect()->route('login')->with('status', __($status))
//                 : back()->withErrors(['email' => [__($status)]]);
// })->middleware('guest')->name('password.update');