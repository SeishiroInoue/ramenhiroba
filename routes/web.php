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

Route::get('/', 'ReviewsController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
Route::get('login/guest', 'Auth\LoginController@guestLogin')->name('login.guest');

Route::get('search', 'SearchController@getReviewsByWord')->name('word.search');
Route::get('tag', 'SearchController@getReviewsByTag')->name('tag.search');
Route::get('score', 'SearchController@getReviewsByScore')->name('score.search');
Route::get('prefecture', 'SearchController@getReviewsByPrefecture')->name('prefecture.search');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    
    Route::group(['prefix' => 'reviews/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    });
    
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'destroy']]); 
    
    Route::get('profile/edit', 'UsersController@edit')->name('profile.edit');
    Route::put('profile/update', 'UsersController@update')->name('profile.update'); 
    Route::get('delete_confirm', 'UsersController@delete_confirm')->name('user.delete_confirm');
    
    Route::resource('reviews', 'ReviewsController', ['only' => ['store', 'destroy', 'show']]);
    
    Route::get('ranking/favorites', 'RankingsController@favorites')->name('ranking.favorites');
    Route::get('ranking/comments', 'RankingsController@comments')->name('ranking.comments');
    Route::get('ranking/reviews', 'RankingsController@reviews')->name('ranking.reviews');
    
    Route::resource('comments', 'CommentsController', ['only' => ['store', 'destroy']]);
});