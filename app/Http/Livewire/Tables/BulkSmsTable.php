<?php

namespace App\Http\Livewire\Tables;

use App\Models\BulkSMS;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class BulkSmsTable extends LivewireDatatable
{
    public $model = BulkSMS::class;
    public $exportable = true;

    public function builder()
    {
        return BulkSMS::query();
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            NumberColumn::name('tracking_id')
                ->label('Tracking Id')
                ->filterable(),

            NumberColumn::name('total_sent')
                ->label('Total Sent')
                ->filterable(),

            NumberColumn::name('processed')
                ->label('Processed')
                ->filterable(),

            NumberColumn::name('invalid')
                ->label('InValid')
                ->filterable(),

            NumberColumn::name('duplicate')
                ->label('Duplicate')
                ->filterable(),

            NumberColumn::name('dnd')
                ->label('DND')
                ->filterable(),

            NumberColumn::name('valid')
                ->label('Valid')
                ->filterable(),

            DateColumn::name('created_at')
                ->label('Sent At')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.bulk_sms.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
