<?php

namespace App\Http\Livewire\Tables;

use App\Models\User;
use App\Services\Helper;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;
    public $exportable = true;

    public function builder()
    {
        return User::query()->with('roles');
    }

    public function roles()
    {
        return Helper::getKeyValues('Role', 'title', 'id');
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('name')
                ->searchable()
                ->filterable(),

            Column::name('email')
                ->searchable()
                ->filterable(),

            BooleanColumn::name('email_verified_at')
                ->label('Email Verified')
                ->filterable(),

            Column::name('roles.title')
                ->filterable($this->roles())
                ->label('Role Name'),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.users.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
