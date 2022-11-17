<?php

namespace App\Http\Livewire\Tables;

use App\Models\DoctorSchedule;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;

class DoctorScheduleTable extends LivewireDatatable
{
    public $model = DoctorSchedule::class;
    public $exportable = true;
    public $doctor_id;

    public function builder()
    {
        return DoctorSchedule::query()->where('doctor_id', $this->doctor_id);
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('day')
                ->searchable()
                ->filterable(),

            NumberColumn::name('appointment_duration')
                ->filterable(),

            TimeColumn::name('from')
                ->searchable()
                ->filterable(),

            TimeColumn::name('to')
                ->searchable()
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.doctor.schedule-actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
