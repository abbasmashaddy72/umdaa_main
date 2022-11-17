<?php

namespace App\Http\Livewire\Tables;

use App\Models\DoctorWork;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DoctorWorkTable extends LivewireDatatable
{
    public $model = DoctorWork::class;
    public $exportable = true;
    public $doctor_id;

    public function builder()
    {
        return DoctorWork::query()->where('doctor_id', $this->doctor_id);
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('where')
                ->label('Where')
                ->filterable(),

            DateColumn::name('from')
                ->label('From')
                ->filterable(),

            DateColumn::name('to')
                ->label('To')
                ->filterable(),


            Column::name('designation')
                ->label('Designation')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.doctor.work-actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
