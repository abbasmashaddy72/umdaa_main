@props([
    'save' => 'true',
    'form' => 'true',
])
@php
    $string = Route::currentRouteAction();
    $prefix = 'Controllers\\';
    $index = strpos($string, $prefix) + strlen($prefix);
    $result = substr($string, $index);
@endphp
<div class="col-span-12 lg:col-span-12">
    <!-- BEGIN: Form Layout -->
    <div class="p-5 rounded-lg box">
        <div wire:ignore>
            @if ($form == true)
                @if (Helper::getRouteAction() == 'create')
                    <form wire:submit.prevent="store">
                    @elseif(Helper::getRouteAction() == 'edit' || $result == 'BranchController@index')
                        <form wire:submit.prevent="update">
                        @else
                            <form id="form">
                @endif
                @csrf
            @endif
        </div>

        <div>
            {{ $slot }}
        </div>

        <div class="mt-5 text-right" wire:ignore>
            @if ($save == true)
                @if (Helper::getRouteAction() == 'create')
                    <x-submit-button>
                        {{ __('Save') }}
                    </x-submit-button>
                @elseif(Helper::getRouteAction() == 'edit' || $result == 'BranchController@index')
                    <x-submit-button>
                        {{ __('Update') }}
                    </x-submit-button>
                @else
                @endif
            @endif
        </div>
        @if ($form == true)
            </form>
        @endif
    </div>
</div>
@if (Helper::getRouteAction() == 'show')
    @push('scripts')
        <script>
            var form = document.getElementById("form");
            var allElements = form.elements;
            for (var i = 0, l = allElements.length; i < l; ++i) {
                // allElements[i].readOnly = true;
                allElements[i].disabled = true;
            }
        </script>
    @endpush
@endif
