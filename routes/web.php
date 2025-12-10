<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controladores Admin
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\InterestTopicController;

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
| DASHBOARD (Redirección según rol)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = Auth::user();
    
    if ($user->role === 'admin') {
        return redirect()->route('admin.team.index');
    } elseif ($user->role === 'auxiliar') {
        return redirect()->route('admin.team.index');
    }
    
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| PANEL ADMIN (requiere autenticación)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
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


/*
|--------------------------------------------------------------------------
| AUTENTICACIÓN
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
