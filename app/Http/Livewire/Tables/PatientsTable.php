<?php

namespace App\Http\Livewire\Tables;

use App\Models\Patient;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PatientsTable extends LivewireDatatable
{
    public $model = Patient::class;
    public $exportable = true;

    public function builder()
    {
        return Patient::query()->with('locality');
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

            Column::name('locality.name')
                ->label('Locality Name')
                ->filterable(),

            Column::name('gender')
                ->filterable(['Male', 'FeMale', 'Trans'])
                ->label('Gender'),

            Column::name('blood_group')
                ->filterable(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'])
                ->label('Blood Group'),

            DateColumn::name('dob')
                ->label('Date of Birth')
                ->filterable(),

            Column::name('contact_no')
                ->label('Contact No.')
                ->filterable(),

            Column::name('description')
                ->label('Description')
                ->truncate(40)
                ->filterable(),

            DateColumn::name('created_at')
                ->label('First Visit')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.patient.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
