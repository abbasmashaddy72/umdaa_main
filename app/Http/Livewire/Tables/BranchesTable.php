<?php

namespace App\Http\Livewire\Tables;

use App\Models\Branch;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class BranchesTable extends LivewireDatatable
{
    public $model = Branch::class;
    public $exportable = true;

    public function builder()
    {
        return Branch::query()->with('locality');
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('locality.name')
                ->label('Location')
                ->filterable(),

            Column::name('house_no')
                ->label('House No.')
                ->filterable(),

            Column::name('landmark')
                ->label('Landmark')
                ->filterable(),

            NumberColumn::name('pin_code')
                ->label('Pin Code')
                ->filterable(),

            NumberColumn::name('registration_fee')
                ->label('Registration Fee')
                ->filterable(),

            Column::name('manager_name')
                ->label('Manger Name')
                ->filterable(),

            Column::name('manager_contact_no')
                ->label('Manger Number')
                ->filterable(),

            Column::name('manager_email')
                ->label('Manger Email')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.branch.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
