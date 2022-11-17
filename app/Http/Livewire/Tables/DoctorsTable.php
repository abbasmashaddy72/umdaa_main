<?php

namespace App\Http\Livewire\Tables;

use App\Models\Doctor;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DoctorsTable extends LivewireDatatable
{
    public $model = Doctor::class;
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->roles->first()->title == 'Admin') {
            return Doctor::query()->with('department');
        }
        return Doctor::query()->with('department')->where('branch_id', auth()->user()->branch_id);
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

            Column::name('email')
                ->label('Email')
                ->filterable(),

            Column::name('gender')
                ->filterable(['Male', 'FeMale', 'Trans'])
                ->label('Gender'),

            DateColumn::name('dob')
                ->label('Date of Birth')
                ->filterable(),

            Column::name('qualification')
                ->label('Qualification')
                ->filterable(),

            Column::name('registration_no')
                ->label('Registration No.'),

            NumberColumn::name('registration_fee')
                ->label('Registration Fee')
                ->filterable(),

            NumberColumn::name('consultation_fee')
                ->label('Consultation Fee')
                ->filterable(),

            Column::name('about')
                ->label('About')
                ->truncate(40)
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.doctor.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
