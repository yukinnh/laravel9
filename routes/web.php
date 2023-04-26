<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TextbookController;

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

// 投稿
Route::get('/', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class ,'show']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class,'delete']);
Route::get('/categories/{category}', [CategoryController::class,'index']);

// ブロック
Route::get('/blocks/index', [BlockController::class, 'index']);
Route::get('/blocks/fromDate', [BlockController::class, 'getFromBlocks']);

// サブジェクト
Route::get('/subjects/index', [SubjectController::class, 'index']);
Route::get('/subjects/create', [SubjectController::class, 'create']);
Route::get('/subjects/{subject}', [SubjectController::class ,'show']);
Route::post('/subjects', [SubjectController::class, 'store']);
Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit']);
Route::put('/subjects/{subject}', [SubjectController::class, 'update']);
Route::delete('/subjects/{subject}', [SubjectController::class,'delete']);

// テキストブック
Route::post('/textbooks', [TextbookController::class, 'updateInsert']);
Route::put('/textbooks/{textbook}', [TextbookController::class, 'update']);
Route::delete('/textbooks/{textbook}', [TextbookController::class,'delete']);