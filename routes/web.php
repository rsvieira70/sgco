<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TenantDocumentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\BankSlipTypeController;

require __DIR__ . '/auth.php';

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware(['auth', 'user.check.active', 'tenant.check.active'])->group(function () {
    Route::get('/profiles/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('/profiles/update', [ProfileController::class, 'update'])->name('profiles.update');
});

Route::middleware(['auth', 'profile.check.exist', 'user.check.active', 'tenant.check.active'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/tenants', [TenantController::class, 'index'])->middleware(['tenant.authorization'])->name('tenants.index');
    Route::get('/tenants/create', [TenantController::class, 'create'])->middleware(['tenant.authorization'])->name('tenants.create');
    Route::post('/tenants', [TenantController::class, 'store'])->middleware(['tenant.authorization'])->name('tenants.store');
    Route::get('/tenants/{id}', [TenantController::class, 'show'])->middleware(['tenant.authorization'])->name('tenants.show');
    Route::get('/tenants/{id}/edit', [TenantController::class, 'edit'])->middleware(['tenant.authorization'])->name('tenants.edit');
    Route::put('/tenants/{id}', [TenantController::class, 'update'])->middleware(['tenant.authorization'])->name('tenants.update');
    Route::patch('/tenants/{id}', [TenantController::class, 'suspend'])->middleware(['tenant.authorization'])->name('tenants.suspend');
    Route::delete('/tenants/{id}', [TenantController::class, 'destroy'])->middleware(['tenant.authorization'])->name('tenants.destroy');

    Route::get('/tenantDocuments', [TenantDocumentController::class, 'index'])->middleware(['tenant.authorization'])->name('tenantDocuments.index');
    Route::get('/tenantDocuments/create', [TenantDocumentController::class, 'create'])->middleware(['tenant.authorization'])->name('tenantDocuments.create');
    Route::post('/tenantDocuments', [TenantDocumentController::class, 'store'])->middleware(['tenant.authorization'])->name('tenantDocuments.store');
    Route::get('/tenantDocuments/{id}', [TenantDocumentController::class, 'show'])->middleware(['tenant.authorization'])->name('tenantDocuments.show');
    Route::delete('/tenantDocuments/{id}', [TenantDocumentController::class, 'destroy'])->middleware(['tenant.authorization'])->name('tenantDocuments.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::patch('/users/{id}', [UserController::class, 'suspend'])->name('users.suspend');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/departments/{id}', [DepartmentController::class, 'show'])->name('departments.show');
    Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::patch('/departments/{id}', [DepartmentController::class, 'suspend'])->name('departments.suspend');
    Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

    Route::get('/positions', [PositionController::class, 'index'])->name('positions.index');
    Route::get('/positions/create', [PositionController::class, 'create'])->name('positions.create');
    Route::post('/positions', [PositionController::class, 'store'])->name('positions.store');
    Route::get('/positions/{id}', [PositionController::class, 'show'])->name('positions.show');
    Route::get('/positions/{id}/edit', [PositionController::class, 'edit'])->name('positions.edit');
    Route::put('/positions/{id}', [PositionController::class, 'update'])->name('positions.update');
    Route::patch('/positions/{id}', [PositionController::class, 'suspend'])->name('positions.suspend');
    Route::delete('/positions/{id}', [PositionController::class, 'destroy'])->name('positions.destroy');

    Route::get('/specialties', [SpecialtyController::class, 'index'])->name('specialties.index');
    Route::get('/specialties/create', [SpecialtyController::class, 'create'])->name('specialties.create');
    Route::post('/specialties', [SpecialtyController::class, 'store'])->name('specialties.store');
    Route::get('/specialties/{id}', [SpecialtyController::class, 'show'])->name('specialties.show');
    Route::get('/specialties/{id}/edit', [SpecialtyController::class, 'edit'])->name('specialties.edit');
    Route::put('/specialties/{id}', [SpecialtyController::class, 'update'])->name('specialties.update');
    Route::patch('/specialties/{id}', [SpecialtyController::class, 'suspend'])->name('specialties.suspend');
    Route::delete('/specialties/{id}', [SpecialtyController::class, 'destroy'])->name('specialties.destroy');

    Route::get('/bankSlipTypes', [BankSlipTypeController::class, 'index'])->name('bankSlipTypes.index');
    Route::get('/bankSlipTypes/create', [BankSlipTypeController::class, 'create'])->name('bankSlipTypes.create');
    Route::post('/bankSlipTypes', [BankSlipTypeController::class, 'store'])->name('bankSlipTypes.store');
    Route::get('/bankSlipTypes/{id}', [BankSlipTypeController::class, 'show'])->name('bankSlipTypes.show');
    Route::get('/bankSlipTypes/{id}/edit', [BankSlipTypeController::class, 'edit'])->name('bankSlipTypes.edit');
    Route::put('/bankSlipTypes/{id}', [BankSlipTypeController::class, 'update'])->name('bankSlipTypes.update');
    Route::patch('/bankSlipTypes/{id}', [BankSlipTypeController::class, 'suspend'])->name('bankSlipTypes.suspend');
    Route::delete('/bankSlipTypes/{id}', [BankSlipTypeController::class, 'destroy'])->name('bankSlipTypes.destroy');

    Route::get('/teeth', [ToothController::class, 'index'])->name('teeth.index');
    Route::get('/teeth/create', [ToothController::class, 'create'])->name('teeth.create');
    Route::post('/teeth', [ToothController::class, 'store'])->name('teeth.store');
    Route::get('/teeth/{id}', [ToothController::class, 'show'])->name('teeth.show');
    Route::get('/teeth/{id}/edit', [ToothController::class, 'edit'])->name('teeth.edit');
    Route::put('/teeth/{id}', [ToothController::class, 'update'])->name('teeth.update');
    Route::patch('/teeth/{id}', [ToothController::class, 'suspend'])->name('teeth.suspend');
    Route::delete('/teeth/{id}', [ToothController::class, 'destroy'])->name('teeth.destroy');
});

Route::resources([
//    'users' => UserController::class,
    
]);



