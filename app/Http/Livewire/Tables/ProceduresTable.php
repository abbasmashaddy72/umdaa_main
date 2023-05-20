<?php

namespace App\Http\Livewire\Tables;

use App\Models\Procedure;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ProceduresTable extends LivewireDatatable
{
    public $model = Procedure::class;
    public $exportable = true;

    public function builder()
    {
        return Procedure::query();
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

            NumberColumn::name('price')
                ->label('Price')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.procedure.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
