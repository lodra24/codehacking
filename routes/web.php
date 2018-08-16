<?php


Route::auth();

Route::get('/logout', 'Auth\LoginController@logout');


Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index');

Route::get('/post/{id}', ['as' => 'home.post', 'uses' => 'AdminPostsController@post']);


Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin', function () {

        $title = "Admin";
        return view('admin.index', compact('title'));
    });

    Route::resource('admin/users', 'AdminUsersController', ['names' => [

        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit'
    ]]);

    Route::resource('admin/posts', 'AdminPostsController', ['names' => [

        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'edit' => 'admin.posts.edit'
    ]]);

    Route::resource('admin/categories', 'AdminCategoriesController', ['names' => [

        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit'

    ]]);

    Route::delete('admin/delete/media', 'AdminMediaController@deleteMedia');

    Route::resource('admin/media', 'AdminMediaController', ['names' => [

        'index' => 'admin.media.index',
        'create' => 'admin.media.create',
        'store' => 'admin.media.store',
        'edit' => 'admin.media.edit'

    ]]);

    Route::resource('admin/comments', 'PostCommentController', ['names'=> [

        'index' => 'admin.comments.index',
        'create' => 'admin.comments.create',
        'store' => 'admin.comments.store',
        'show' => 'admin.comments.show',
        'edit' => 'admin.comments.edit'

    ]]);

    Route::resource('admin/comments/replies', 'CommentRepliesController', ['names'=>[

        'index' => 'admin.comments.replies.index',
        'create' => 'admin.comments.replies.create',
        'store' => 'admin.comments.replies.store',
        'show' => 'admin.comments.replies.show',
        'edit' => 'admin.comments.replies.edit'

    ]]);


});


Route::group(['middleware' => 'auth'], function () {

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});