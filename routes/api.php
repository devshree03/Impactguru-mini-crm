<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CustomerController;

Route::post('/tokens/create', function (Request $request) {
    $user = User::where('email', $request->email)->firstOrFail();

    if (!\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json(['token' => $token]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/customers', [CustomerController::class, 'apiIndex']);
    Route::get('/customers/{customer}', [CustomerController::class, 'apiShow']);
    Route::post('/customers', [CustomerController::class, 'apiStore']);
    Route::put('/customers/{customer}', [CustomerController::class, 'apiUpdate']);
    Route::delete('/customers/{customer}', [CustomerController::class, 'apiDestroy']);
});
