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

// トップページ
Route::get('/', 'ReviewsController@index')->name('welcome');

// ユーザー新規登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ユーザーログイン、ログアウト
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ゲストログイン 
Route::post('login/guest', 'Auth\LoginController@guestLogin')->name('login.guest');

// キーワード検索
Route::get('search', 'SearchController@getReviewsByWord')->name('word.search');
// タグ検索
Route::get('tag', 'SearchController@getReviewsByTag')->name('tag.search');
// おすすめ度(スコア)検索
Route::get('score', 'SearchController@getReviewsByScore')->name('score.search');
// 都道府県検索
Route::get('prefecture', 'SearchController@getReviewsByPrefecture')->name('prefecture.search');

// About画面表示
Route::get('about', function() {
    return view('about');
})->name('about');
// プライバシーポリシー画面表示
Route::get('privacy', function() {
    return view('privacy');
})->name('privacy');
// 利用規約画面表示
Route::get('terms', function() {
    return view('terms');
})->name('terms');

## ログイン状態で利用可能
Route::group(['middleware' => ['auth']], function () {
    
    # ユーザー関係
    Route::group(['prefix' => 'users/{id}'], function () {
        // フォロー、アンフォロー機能
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        // フォロー、フォロワー表示
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        // お気に入り表示
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    
    # レビュー関係
    Route::group(['prefix' => 'reviews/{id}'], function () {
        // お気に入り追加、削除
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    });
    
    // ユーザー一覧表示、詳細表示、退会機能
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'destroy']]); 
    
    // ユーザープロフィール編集
    Route::get('profile/edit', 'UsersController@edit')->name('profile.edit');
    Route::put('profile/update', 'UsersController@update')->name('profile.update');
    // パスワード編集
    Route::get('profile/password/edit', 'UsersController@editPassword')->name('password.edit');
    Route::put('profile/password/update', 'UsersController@updatePassword')->name('password.update');
    
    // ユーザー退会確認画面表示
    Route::get('delete_confirm', 'UsersController@delete_confirm')->name('user.delete_confirm');
    
    // レビュー保存、詳細表示
    Route::resource('reviews', 'ReviewsController', ['only' => ['store', 'show']]);
    // 一覧画面でレビュー削除
    Route::post('reviews/delete/{id}', 'ReviewsController@destroy')->name('reviews.destroy');
    // 詳細画面でレビュー削除
    Route::post('reviews/show/delete/{id}', 'ReviewsController@destroyAtShow')->name('show.destroy');
    // タイムライン画面表示
    Route::get('timeline', 'ReviewsController@getReviewsByFollowings')->name('timeline');
    
    // レビューお気に入り数ランキング画面表示
    Route::get('ranking/favorites', 'RankingsController@favorites')->name('ranking.favorites');
    // レビューコメント数ランキング画面表示
    Route::get('ranking/comments', 'RankingsController@comments')->name('ranking.comments');
    // ユーザーレビュー数ランキング画面表示
    Route::get('ranking/reviews', 'RankingsController@reviews')->name('ranking.reviews');
    
    // コメント保存、削除
    Route::resource('comments', 'CommentsController', ['only' => 'store']);
    Route::post('comments/delete/{id}', 'CommentsController@destroy')->name('comments.destroy');
    
    // レビューフォーム画面表示
    Route::get('create', function() {
        return view('reviews.form');
    })->name('reviews.form');
});