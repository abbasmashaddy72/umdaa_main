<?php

namespace App\Http\Livewire\Tables;

use App\Models\Role;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class RolesTable extends LivewireDatatable
{
    public $model = Role::class;
    public $exportable = true;

    public function builder()
    {
        return Role::query()->with('permissions', 'users');
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('title')
                ->searchable()
                ->filterable(),

            NumberColumn::name('permissions.title:count')
                ->filterable()
                ->label('Permissions Count'),

            NumberColumn::name('users.name:count')
                ->filterable()
                ->label('Users Count'),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.role.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
