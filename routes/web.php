<?php

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

// /と/recipesにアクセスしたときにindexにとぶ
Route::get('/', 'RecipesController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//ユーザー機能
// このグループに書かれたルーティングは必ずログイン認証を確認
Route::resource('recipes', 'RecipesController');

Route::group(['prefix' => 'users/{id}'], function () {
    // お気に入り一覧
    Route::get('favorites', 'UserController@favorites')->name('users.favorites');
        
    });
    
// お気に入りのルーティング
Route::group(['prefix' => 'recipes/{id}'], function () {
    Route::post('favorite', 'RecipeFavoriteController@store')->name('favorites.favorite');
    Route::delete('unfavorite', 'RecipeFavoriteController@destroy')->name('favorites.unfavorite');
});
    
    Route::resource('recipes', 'RecipesController', ['only' => ['store', 'destroy']]);