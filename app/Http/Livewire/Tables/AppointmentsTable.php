<?php

namespace App\Http\Livewire\Tables;

use App\Models\Appointment;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\TimeColumn;

class AppointmentsTable extends LivewireDatatable
{
    public $model = Appointment::class;
    public $exportable = true;

    public function builder()
    {
        return Appointment::query()->with('doctor', 'patient', 'referral');
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('patient.name')
                ->searchable()
                ->label('Patient Name')
                ->filterable(),

            Column::name('doctor.name')
                ->searchable()
                ->label('Doctor Name')
                ->filterable(),

            Column::name('referral.name')
                ->searchable()
                ->label('Referral Name')
                ->filterable(),

            DateColumn::name('date')
                ->defaultSort(today())
                ->filterable(),

            TimeColumn::name('time')
                ->defaultSort(now())
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.appointment.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
