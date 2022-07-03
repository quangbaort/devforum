<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// Dashboard
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// Users
Breadcrumbs::for('admin.users.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Users', route('admin.users.index'));
});

Breadcrumbs::for('admin.users.create', function ($trail) {
    $trail->parent('admin.users.index');
    $trail->push('Create', route('admin.users.create'));
});

Breadcrumbs::for('admin.users.edit', function ($trail, $userID) {
    $trail->parent('admin.users.index');
    $trail->push('Update User', route('admin.users.edit', $userID));
});

// Roles
Breadcrumbs::for('admin.roles.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Roles', route('admin.roles.index'));
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

