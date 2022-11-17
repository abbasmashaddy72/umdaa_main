<?php

namespace App\Http\Livewire\Tables;

use App\Models\DoctorEducation;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DoctorEducationTable extends LivewireDatatable
{
    public $model = DoctorEducation::class;
    public $exportable = true;
    public $doctor_id;

    public function builder()
    {
        return DoctorEducation::query()->where('doctor_id', $this->doctor_id);
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('title')
                ->label('Title')
                ->filterable(),

            NumberColumn::name('completed')
                ->label('Completed')
                ->filterable(),

            Column::name('where')
                ->label('Where')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.doctor.education-actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
