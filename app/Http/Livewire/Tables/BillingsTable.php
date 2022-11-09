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
        return Billing::query()->with('patient');
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

            Column::name('transaction_details')
                ->searchable()
                ->label('Transaction Details')
                ->filterable(),

            BooleanColumn::name('appointment_id')
                ->label('Appointment Billing'),

            BooleanColumn::name('procedure_id')
                ->label('Procedure Billing'),

            Column::callback(['id'], function ($id) {
                return view('pages.billing.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
