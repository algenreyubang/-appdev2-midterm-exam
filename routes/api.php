<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\PRoductAccessMiddleware;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('products', ProductController::class);


Route::post('/api/upload/local', [ProductController::class, 'uploadImageLocal']);
Route::post('/api/upload/public', [ProductController::class, 'uploadImagePublic']);

Route::post('/upload', function(Request $request){
    $file = $request->file;
    Storage::disk('local')->put('/', $file);
});
Route::get('/get', function () {
	return response()->json(['message' => 'GET request handled.']);
})->middleware(PRoductAccessMiddleware::class);


Route::post('/post', function () {
	return response()->json(['message' => 'POST request handled.']);
})->middleware(PRoductAccessMiddleware::class);


Route::put('/put', function () {
	return response()->json(['message' => 'PUT request handled.']);
})->middleware(PRoductAccessMiddleware::class);


Route::patch('/patch', function () {
	return response()->json(['message' => 'PATCH request handled.']);
})->middleware(PRoductAccessMiddleware::class);


Route::delete('/delete', function () {
	return response()->json(['message' => 'DELETE request handled.']);
})->middleware(PRoductAccessMiddleware::class);