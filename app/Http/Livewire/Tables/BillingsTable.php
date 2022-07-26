<?php

namespace App\Http\Livewire\Tables;

use App\Models\Billing;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class BillingsTable extends LivewireDatatable
{
    public $model = Billing::class;
    public $exportable = true;

    public function builder()
    {
        return Billing::query()->with('appointment', 'patient', 'procedure');
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

            NumberColumn::name('discount')
                ->label('Discount')
                ->filterable(),

            NumberColumn::name('round_off')
                ->label('Round Off')
                ->filterable(),

            Column::name('mode_of_payment')
                ->searchable()
                ->label('Mode of Payment')
                ->filterable(),

            BooleanColumn::name('appointment_id')
                ->label('Appointment Billing'),

            BooleanColumn::name('procedure_id')
                ->label('Procedure Billing'),
        ];
    }
}
