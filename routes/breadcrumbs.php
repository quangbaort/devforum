<?php

// Home
use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('Dashboard', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// Home > About
Breadcrumbs::for(__('List user'), function ($trail) {
    $trail->push(__('List user'), route('admin.users.index'));
});
Breadcrumbs::for(__('Create user'), function ($trail) {
    $trail->parent(__('List user'));
    $trail->push(__('Create user'), route('admin.users.index'));
});


// // Home > Blog
// Breadcrumbs::for('blog', function ($trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category->id));
// });

// // Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });

