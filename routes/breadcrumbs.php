<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Application
Breadcrumbs::for('#', function (BreadcrumbTrail $trail) {
    $trail->push('Application', '/');
});

// Application > User
Breadcrumbs::for('user.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('User', route('user.index'));
});

// Application > User > Create
Breadcrumbs::for('user.create', function (BreadcrumbTrail $trail) {
    $trail->parent('user.index');
    $trail->push('Create User', route('user.create'));
});

// Application > User > Edit
Breadcrumbs::for('user.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('user.index');
    $trail->push('Edit ' . $data->name, route('user.edit', $data));
});

// Application > User > Show
Breadcrumbs::for('user.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('user.index');
    $trail->push('Show ' . $data->name, route('user.show', $data));
});

// Application > CRUD
Breadcrumbs::for('crud.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('CRUD', route('crud.index'));
});

// Application > CRUD > Create
Breadcrumbs::for('crud.create', function (BreadcrumbTrail $trail) {
    $trail->parent('crud.index');
    $trail->push('Create CRUD', route('crud.create'));
});

// Application > CRUD > Edit
Breadcrumbs::for('crud.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('crud.index');
    $trail->push('Edit ' . $data->title, route('crud.edit', $data));
});

// Application > CRUD > Show
Breadcrumbs::for('crud.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('crud.index');
    $trail->push('Show ' . $data->title, route('crud.show', $data));
});
