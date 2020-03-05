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
|.phpで運用していた為、新URLにリダイレクトする
*/

// TOP
Route::get('livehouse_list', 'LivehouseController@index')->name('livehouse_list');
Route::get('livehouse_list.php', function() {
    return Redirect::to('livehouse_list');
});

// レビュー
Route::get('review', 'ReviewController@index')->name('review');
Route::get('review.php', function() {
    return Redirect::to('review');
});
Route::post('review_store', 'ReviewController@store');
Route::post('livehouse_like_update/{id}','ReviewController@updateLivehouseLike');
Route::post('review_like_update/{id}','ReviewController@updateReviewLike');

// ランキング
Route::get('ranking', 'RankingController@index')->name('ranking');
Route::get('ranking.php', function() {
    return Redirect::to('ranking');
});

// 会社概要
Route::get('company', function () {
    return view('company');
});
Route::get('company.php', function() {
    return Redirect::to('company');
});


// 管理画面
Route::prefix('admin')->group(function() {
    // ライブハウス
    Route::get('livehouses', 'Admin\LivehouseController@index')->name('admin_livehouses');
    Route::get('show/{id}','Admin\LivehouseController@show');

    Route::get('create', 'Admin\LivehouseController@create');
    Route::post('store', 'Admin\LivehouseController@store');

    Route::get('edit/{id}','Admin\LivehouseController@edit');
    Route::post('update/{id}','Admin\LivehouseController@update');

    Route::post('destroy/{id}','Admin\LivehouseController@destroy');

    // レビュー
    Route::get('reviews', 'Admin\ReviewController@index')->name('admin_reviews');

    Route::get('review_edit/{id}','Admin\ReviewController@edit');
    Route::post('review_update/{id}','Admin\ReviewController@update');

    Route::post('review_destroy/{id}','Admin\ReviewController@destroy');

    // ランキング
    Route::get('ranking', 'Admin\RankingController@index')->name('admin_ranking');
});

Auth::routes();
