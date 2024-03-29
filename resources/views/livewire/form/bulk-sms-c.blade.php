<div class="grid grid-cols-12 gap-5 mt-5">
    <div class="col-span-6">
        <!-- BEGIN: Form Layout -->
        <div class="p-5 box">

            <div class="pr-1">
                <div class="p-2 box">
                    <ul class="nav nav-pills" role="tablist">
                        <li id="doctors-tab" class="flex-1 nav-item" role="presentation">
                            <button class="w-full py-2 nav-link active" data-tw-toggle="pill" data-tw-target="#doctors"
                                type="button" role="tab" aria-controls="doctors" aria-selected="true"> Doctors
                            </button>
                        </li>
                        <li id="patients-tab" class="flex-1 nav-item" role="presentation">
                            <button class="w-full py-2 nav-link" data-tw-toggle="pill" data-tw-target="#patients"
                                type="button" role="tab" aria-controls="patients" aria-selected="false"> Patients
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="doctors" class="tab-pane active" role="tabpanel" aria-labelledby="doctors-tab">
                    <div class="max-h-screen p-2 mt-5 overflow-x-auto box">
                        @wire()
                            @foreach ($doctors as $key => $value)
                                <x-form-checkbox label="{{ $value }}" name="selectedDoctors.{{ $key }}" />
                            @endforeach
                        @endwire
                    </div>
                </div>
                <div id="patients" class="tab-pane" role="tabpanel" aria-labelledby="patients-tab">
                    <div class="max-h-screen p-2 mt-5 overflow-x-auto box">
                        @wire()
                            @foreach ($patients as $key => $value)
                                <x-form-checkbox label="{{ $value }}" name="selectedPatients.{{ $key }}" />
                            @endforeach
                        @endwire
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-span-6">
        <!-- BEGIN: Form Layout -->
        <div class="p-5 box">
            <form wire:submit.prevent="store">
                @csrf

                @wire()
                    <x-form-textarea label="Selected Contact Number List" name="contactNumbers" />

                    <x-form-select name="selectedTemplate" label="Select Template" :options="$this->templates"
                        placeholder="Please Select" />

                    <x-form-textarea label="Selected Template" name="selectedTemplate" />
                @endwire

                <div class="mt-5 text-right" wire:ignore>
                    <x-submit-button>
                        {{ __('Save') }}
                    </x-submit-button>

                </div>
            </form>
        </div>
    </div>
</div>
