<x-simple-select name="status_update" id="status_update" wire:click="changeSelectUpdate($event.target.value)"
    :options="$this->status()" value="{{ $status }}" :searchable="false" />
