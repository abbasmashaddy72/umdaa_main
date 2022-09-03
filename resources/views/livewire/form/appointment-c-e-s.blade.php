<x-steps-form>
    <ul
        class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
        @for ($i = 1; $i <= $totalSteps; $i++)
            <x-step.wizard-step :active="$i == $step">{{ __('Step') }} {{ $i }}</x-step.wizard-step>
        @endfor
    </ul>

    @wire('debounce.200ms')
        <div class="mt-2">
            <div class="min-h-full">
                @include('livewire.components.appointments.step' . $step)
            </div>
        </div>
    @endwire

    <div class="flex justify-between mt-4">
        @if ($step != 1)
            <x-step.wizard-button class="ml-4" wire:click="moveBack">Previous</x-step.wizard-button>
        @else
            &nbsp;
        @endif

        <x-step.wizard-button class="mr-4" wire:click="moveAhead">{{ $step != $totalSteps ? 'Next' : 'Submit' }}
        </x-step.wizard-button>
    </div>
</x-steps-form>
