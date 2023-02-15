<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Employer\JobController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Job;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    $categories =  Category::query()->withCount('jobs')->get();
    $cat = array();
    foreach($categories as $category){
    array_push($cat, ['name'=> $category->name, 'jobs'=>$category->jobs_count, 'slug'=>$category->slug]);
    }

    return Inertia::render('Frontend/Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'jobs' =>  Job::with('user')->get(),
        'categories'=> $cat,

    ]);
});
Route::get('/job/{slug}', function ($slug){
    $categories =  Category::query()->withCount('jobs')->get();
    $cat = array();
    foreach($categories as $category){
    array_push($cat, ['name'=> $category->name, 'jobs'=>$category->jobs_count, 'slug'=>$category->slug]);
    }
    return Inertia::render('Frontend/Job',[
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'job'=> Job::with('user')->where('slug', $slug)->first(),
        'categories'=> $cat,
    ]);
})->name('job.jobs-details');

Route::get('/job-category/{slug}', function ($slug){
    $categoryR = Category::where('slug',$slug)->first();
    $categories =  Category::query()->withCount('jobs')->get();
    $cat = array();
    foreach($categories as $category){
    array_push($cat, ['name'=> $category->name, 'jobs'=>$category->jobs_count, 'slug'=>$category->slug]);
    }

    return Inertia::render('Frontend/Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'jobs' =>  Job::with('user')->where('jobCategory', $categoryR->id)->get(),
        'categories'=> $cat,

    ]);
})->name('job.jobs-category');

Route::get('/dashboard', function () {

    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permission');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.role');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::resource('/categories', CategoryController::class);

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
});

Route::middleware(['auth', 'role:employer'])->name('employer.')->prefix('employer')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Employer/Dashboard');
    })->name('index');
    Route::resource('/jobs', JobController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
