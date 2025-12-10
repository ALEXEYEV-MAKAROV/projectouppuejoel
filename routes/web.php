<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controladores Admin
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\InterestTopicController;

// Controladores de Autenticación
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordResetController;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', function () {
    return view('home');
})->name('home');

// Páginas estáticas
Route::get('/about', function () { 
    return view('about'); 
})->name('about');

Route::get('/team', function () { 
    $members = \App\Models\TeamMember::where('is_active', true)
                                     ->orderBy('sort_order')
                                     ->get();
    return view('team', compact('members')); 
})->name('team');

Route::get('/informacion-academica', function () { 
    $publications = \App\Models\Publication::where('is_active', true)
                                           ->orderBy('publication_year', 'desc')
                                           ->orderBy('sort_order')
                                           ->get();
    return view('informacion-academica', compact('publications')); 
})->name('informacion-academica');

Route::get('/temas-interes', function () { 
    $topics = \App\Models\InterestTopic::where('is_active', true)
                                       ->orderBy('sort_order')
                                       ->get();
    return view('temas-interes', compact('topics')); 
})->name('temas-interes');

// Perfiles individuales de equipo
Route::get('/team/{slug}', function ($slug) {
    $member = \App\Models\TeamMember::where('slug', $slug)
                                    ->where('is_active', true)
                                    ->firstOrFail();
    return view('perfiles.show', compact('member'));
})->name('team.show');

/*
|--------------------------------------------------------------------------
| RUTAS DE AUTENTICACIÓN
|--------------------------------------------------------------------------
*/

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// Registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register')
    ->middleware('guest');

Route::post('/register', [RegisterController::class, 'register'])
    ->middleware('guest');

// Recuperación de contraseña
Route::get('/forgot-password', [PasswordResetController::class, 'showLinkRequestForm'])
    ->name('password.request')
    ->middleware('guest');

Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])
    ->name('password.email')
    ->middleware('guest');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])
    ->name('password.reset')
    ->middleware('guest');

Route::post('/reset-password', [PasswordResetController::class, 'reset'])
    ->name('password.update')
    ->middleware('guest');

/*
|--------------------------------------------------------------------------
| DASHBOARD (Redirección según rol)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = Auth::user();
    
    if ($user->role === 'admin' || $user->role === 'auxiliar') {
        return redirect()->route('admin.team.index');
    }
    
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| PANEL ADMIN (requiere autenticación)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // CRUD Team Members
    Route::get('team', [TeamMemberController::class, 'index'])->name('team.index');
    Route::get('team/create', [TeamMemberController::class, 'create'])->name('team.create');
    Route::post('team', [TeamMemberController::class, 'store'])->name('team.store');
    Route::get('team/{id}/edit', [TeamMemberController::class, 'edit'])->name('team.edit');
    Route::put('team/{id}', [TeamMemberController::class, 'update'])->name('team.update');
    Route::delete('team/{id}', [TeamMemberController::class, 'destroy'])->name('team.destroy');
    
    // CRUD Publications
    Route::get('publications', [PublicationController::class, 'index'])->name('publications.index');
    Route::get('publications/create', [PublicationController::class, 'create'])->name('publications.create');
    Route::post('publications', [PublicationController::class, 'store'])->name('publications.store');
    Route::get('publications/{id}/edit', [PublicationController::class, 'edit'])->name('publications.edit');
    Route::put('publications/{id}', [PublicationController::class, 'update'])->name('publications.update');
    Route::delete('publications/{id}', [PublicationController::class, 'destroy'])->name('publications.destroy');
    
    // CRUD Interest Topics
    Route::get('topics', [InterestTopicController::class, 'index'])->name('topics.index');
    Route::get('topics/create', [InterestTopicController::class, 'create'])->name('topics.create');
    Route::post('topics', [InterestTopicController::class, 'store'])->name('topics.store');
    Route::get('topics/{id}/edit', [InterestTopicController::class, 'edit'])->name('topics.edit');
    Route::put('topics/{id}', [InterestTopicController::class, 'update'])->name('topics.update');
    Route::delete('topics/{id}', [InterestTopicController::class, 'destroy'])->name('topics.destroy');
});