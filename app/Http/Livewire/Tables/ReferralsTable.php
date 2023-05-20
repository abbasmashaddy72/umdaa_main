<?php

namespace App\Http\Livewire\Tables;

use App\Models\Referral;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ReferralsTable extends LivewireDatatable
{
    public $model = Referral::class;
    public $exportable = true;

    public function builder()
    {
        return Referral::query();
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

            Column::name('qualification')
                ->label('Qualification')
                ->filterable(),

            Column::name('clinic_name')
                ->label('Clinic Name')
                ->filterable(),

            Column::name('contact_no')
                ->label('Contact No.')
                ->filterable(),

            BooleanColumn::name('personal')
                ->label('Is Personal')
                ->filterable(),

            Column::name('location')
                ->label('Clinic Location'),

            Column::callback(['id'], function ($id) {
                return view('pages.referral.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
