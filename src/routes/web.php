<?php

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

Route::get(
    '/',
    '\App\Http\Controllers\indexController@index'
)->name('index');

Route::prefix('group')->group(function () {
    Route::get(
        '/',
        '\App\Http\Controllers\GroupController@index'
    )->name('group.index');
    Route::get(
        '/create',
        '\App\Http\Controllers\GroupController@create'
    )->name('group.create');
    Route::post(
        '/store',
        '\App\Http\Controllers\GroupController@store'
    )->name('group.store');
    Route::get(
        '/list\{group_id}',
        '\App\Http\Controllers\GroupController@list'
    )->name('group.list');
});

Route::prefix('member')->group(function () {
    Route::get(
        '/',
        '\App\Http\Controllers\MemberController@index'
    )->name('member.index');
    Route::get(
        '/detail',
        '\App\Http\Controllers\MemberController@show'
    )->name('member.show');
    Route::get(
        '/create',
        '\App\Http\Controllers\MemberController@create'
    )->name('member.create');
    Route::post(
        '/store',
        '\App\Http\Controllers\MemberController@store'
    )->name('member.store');
    Route::get(
        '/edit/{member_id}',
        '\App\Http\Controllers\MemberController@edit'
    )->name('member.edit');
    Route::put(
        '/update/{member_id}',
        '\App\Http\Controllers\MemberController@update'
    )->name('member.update');
});
