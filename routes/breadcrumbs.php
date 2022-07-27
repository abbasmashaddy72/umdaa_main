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

// Application > Role
Breadcrumbs::for('role.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Role', route('role.index'));
});

// Application > Role > Create
Breadcrumbs::for('role.create', function (BreadcrumbTrail $trail) {
    $trail->parent('role.index');
    $trail->push('Create Role', route('role.create'));
});

// Application > Role > Edit
Breadcrumbs::for('role.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('role.index');
    $trail->push('Edit ' . $data->title, route('role.edit', $data));
});

// Application > Role > Show
Breadcrumbs::for('role.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('role.index');
    $trail->push('Show ' . $data->title, route('role.show', $data));
});

// Application > Branch Setting
Breadcrumbs::for('branch.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Setting', route('branch.index'));
});

// Application > Branch Setting > Create
Breadcrumbs::for('branch.create', function (BreadcrumbTrail $trail) {
    $trail->parent('branch.index');
    $trail->push('Create Branch Setting', route('branch.create'));
});

// Application > Branch Setting > Edit
Breadcrumbs::for('branch.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('branch.index');
    $trail->push('Edit Branch Setting', route('branch.edit', $data));
});

// Application > Branch Setting > Show
Breadcrumbs::for('branch.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('branch.index');
    $trail->push('Show Branch Setting', route('branch.show', $data));
});

// Application > Department
Breadcrumbs::for('department.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Department', route('department.index'));
});

// Application > Department > Create
Breadcrumbs::for('department.create', function (BreadcrumbTrail $trail) {
    $trail->parent('department.index');
    $trail->push('Create Department', route('department.create'));
});

// Application > Department > Edit
Breadcrumbs::for('department.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('department.index');
    $trail->push('Edit ' . $data->name, route('department.edit', $data));
});

// Application > Department > Show
Breadcrumbs::for('department.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('department.index');
    $trail->push('Show ' . $data->name, route('department.show', $data));
});

// Application > Referral
Breadcrumbs::for('referral.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Referral', route('referral.index'));
});

// Application > Referral > Create
Breadcrumbs::for('referral.create', function (BreadcrumbTrail $trail) {
    $trail->parent('referral.index');
    $trail->push('Create Referral', route('referral.create'));
});

// Application > Referral > Edit
Breadcrumbs::for('referral.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('referral.index');
    $trail->push('Edit ' . $data->name, route('referral.edit', $data));
});

// Application > Referral > Show
Breadcrumbs::for('referral.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('referral.index');
    $trail->push('Show ' . $data->name, route('referral.show', $data));
});

// Application > Procedure
Breadcrumbs::for('procedure.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Procedure', route('procedure.index'));
});

// Application > Procedure > Create
Breadcrumbs::for('procedure.create', function (BreadcrumbTrail $trail) {
    $trail->parent('procedure.index');
    $trail->push('Create Procedure', route('procedure.create'));
});

// Application > Procedure > Edit
Breadcrumbs::for('procedure.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('procedure.index');
    $trail->push('Edit ' . $data->name, route('procedure.edit', $data));
});

// Application > Procedure > Show
Breadcrumbs::for('procedure.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('procedure.index');
    $trail->push('Show ' . $data->name, route('procedure.show', $data));
});

// Application > Patient
Breadcrumbs::for('patient.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Patient', route('patient.index'));
});

// Application > Patient > Create
Breadcrumbs::for('patient.create', function (BreadcrumbTrail $trail) {
    $trail->parent('patient.index');
    $trail->push('Create Patient', route('patient.create'));
});

// Application > Patient > Edit
Breadcrumbs::for('patient.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('patient.index');
    $trail->push('Edit ' . $data->name, route('patient.edit', $data));
});

// Application > Patient > Show
Breadcrumbs::for('patient.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('patient.index');
    $trail->push('Show ' . $data->name, route('patient.show', $data));
});

// Application > Service
Breadcrumbs::for('service.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Service', route('service.index'));
});

// Application > Service > Create
Breadcrumbs::for('service.create', function (BreadcrumbTrail $trail) {
    $trail->parent('service.index');
    $trail->push('Create Service', route('service.create'));
});

// Application > Service > Edit
Breadcrumbs::for('service.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('service.index');
    $trail->push('Edit ' . $data->name, route('service.edit', $data));
});

// Application > Service > Show
Breadcrumbs::for('service.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('service.index');
    $trail->push('Show ' . $data->name, route('service.show', $data));
});

// Application > Doctor
Breadcrumbs::for('doctor.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Doctor', route('doctor.index'));
});

// Application > Doctor > Create
Breadcrumbs::for('doctor.create', function (BreadcrumbTrail $trail) {
    $trail->parent('doctor.index');
    $trail->push('Create Doctor', route('doctor.create'));
});

// Application > Doctor > Edit
Breadcrumbs::for('doctor.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('doctor.index');
    $trail->push('Edit ' . $data->name, route('doctor.edit', $data));
});

// Application > Doctor > Show
Breadcrumbs::for('doctor.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('doctor.index');
    $trail->push('Show ' . $data->name, route('doctor.show', $data));
});

// Application > Appointment
Breadcrumbs::for('appointment.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Appointment', route('appointment.index'));
});

// Application > Appointment > Create
Breadcrumbs::for('appointment.create', function (BreadcrumbTrail $trail) {
    $trail->parent('appointment.index');
    $trail->push('Create Appointment', route('appointment.create'));
});

// Application > Appointment > Edit
Breadcrumbs::for('appointment.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('appointment.index');
    $trail->push('Edit Appointment', route('appointment.edit', $data));
});

// Application > Appointment > Show
Breadcrumbs::for('appointment.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('appointment.index');
    $trail->push('Show Appointment', route('appointment.show', $data));
});

// Application > Billing
Breadcrumbs::for('billing.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Billing', route('billing.index'));
});

// Application > Billing > Create
Breadcrumbs::for('billing.create', function (BreadcrumbTrail $trail) {
    $trail->parent('billing.index');
    $trail->push('Create Billing', route('billing.create'));
});

// Application > Billing > Edit
Breadcrumbs::for('billing.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('billing.index');
    $trail->push('Edit Billing', route('billing.edit', $data));
});

// Application > Billing > Show
Breadcrumbs::for('billing.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('billing.index');
    $trail->push('Show Billing', route('billing.show', $data));
});

// Application > Bulk SMS
Breadcrumbs::for('bulk_sms.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Bulk SMS', route('bulk_sms.index'));
});

// Application > Bulk SMS > Create
Breadcrumbs::for('bulk_sms.create', function (BreadcrumbTrail $trail) {
    $trail->parent('bulk_sms.index');
    $trail->push('Create Bulk SMS', route('bulk_sms.create'));
});

// Application > Bulk SMS > Edit
Breadcrumbs::for('bulk_sms.edit', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('bulk_sms.index');
    $trail->push('Edit Bulk SMS', route('bulk_sms.edit', $data));
});

// Application > Bulk SMS > Show
Breadcrumbs::for('bulk_sms.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('bulk_sms.index');
    $trail->push('Show Bulk SMS', route('bulk_sms.show', $data));
});
