<?php

namespace App\Http\Livewire\Tables;

use App\Models\Appointment;
use App\Services\Helper;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\TimeColumn;

class AppointmentsTable extends LivewireDatatable
{
    public $model = Appointment::class;
    public $exportable = true;

    public $status_update;

    public function changeSelectUpdate($id)
    {
        dd($id);
        $this->emit('refreshLivewireDatatable');
    }

    public function builder()
    {
        if (auth()->user()->roles->first()->title == 'Admin') {
            return Appointment::query()->with('doctor', 'patient', 'referral', 'billing', 'vitals');
        }
        return Appointment::query()->with('doctor', 'patient', 'referral', 'billing', 'vitals')->where('branch_id', auth()->user()->branch_id);
    }

    public function status()
    {
        return Helper::getEnum('appointments', 'status');
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

            BooleanColumn::name('billing.status')
                ->filterable(),

            Column::callback(['id', 'status'], function ($id, $status) {
                return view('pages.appointment.status_update', ['id' => $id, 'status' => $status]);
            })->label('Status')
                ->filterable($this->status()),

            Column::callback(['id'], function ($id) {
                return view('pages.appointment.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
