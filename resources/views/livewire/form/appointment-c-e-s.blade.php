<x-steps-form>
    <nav class="rounded-t-lg top-nav bg-primary dark:bg-dark">
        <ul>
            @for ($i = 1; $i <= $totalSteps; $i++)
                <x-step.wizard-step :active="$i == $step">{{ __('Step') }} {{ $i }}</x-step.wizard-step>
            @endfor
        </ul>
    </nav>

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
