<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Post;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
// Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
//     $trail->push('Home', route('home'));
// });
Breadcrumbs::for('/', function (BreadcrumbTrail $trail) {
    $trail->push('Main', route('main'));
});

// Home > Blog
// Breadcrumbs::for('post', function (BreadcrumbTrail $trail) {
//     $trail->parent('/');
//     $trail->push('Blog', route('post'));
// });
Breadcrumbs::for('post', function( BreadcrumbTrail  $trail, $post ) {
    $trail -> parent ( '/' );
    $trail -> push ( substr($post->title, 0, 10) . '...', route( 'post', $post ));
});
// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('/');
    $trail->push($category->title, route('category', $category));
});