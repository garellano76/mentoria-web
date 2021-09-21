<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;

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


Route::get('/', function () {   
    return view('posts', [
        'posts' => Post::latest('published_at')
            ->with('category')
            ->get()
    ]);
});

Route::get('/post/{post}', function (Post $post) {
    return view ('post', [
        'post' => $post,
    ]);
}); // validacion de caracteres en url-> where('post', '[A-Za-z\_-]+');
     
Route::get('/category/{category:slug}', function (Category $category) {
    return view ('posts', [
        'posts' => $category->posts,
    ]);
}); // validacion de caracteres en url-> where('post', '[A-Za-z\_-]+');
    

//Route::get('/', fn () => view ('welcome'));
//Route::get('/', fn () => 'Hola Segic');
//Route::get('/', fn () => ['id' => 7, 'url' => 'http://www.segic.cl']);
