<?php

namespace App\Http\Livewire\Tables;

use App\Models\Service;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ServicesTable extends LivewireDatatable
{
    public $model = Service::class;
    public $exportable = true;

    public function builder()
    {
        return Service::query()->with('department');
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

            Column::name('department.name')
                ->label('Department Name')
                ->filterable(),

            Column::name('excerpt')
                ->label('Excerpt')
                ->truncate(40)
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.service.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
