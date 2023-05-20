<?php

namespace App\Http\Livewire\Tables;

use App\Models\Department;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DepartmentsTable extends LivewireDatatable
{
    public $model = Department::class;
    public $exportable = true;

    public function builder()
    {
        return Department::query();
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('name')
                ->label('Name')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.department.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
