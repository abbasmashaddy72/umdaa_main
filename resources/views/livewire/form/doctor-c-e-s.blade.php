<div class="col-span-12 lg:col-span-12">
    <x-custom-form>
        <div class="grid-cols-3 gap-2 sm:grid">
            @wire('debounce.200ms')
                <x-form-input name="name" label="Name" type="text" />

                <x-form-input name="email" label="Email" type="email" />

                <x-simple-select name="gender" id="gender" label="Gender" wire:model="gender" :options="Helper::getEnum('patients', 'gender')"
                    placeholder="Please Select" search-input-placeholder="Search Gender" :searchable="true" />
            @endwire
        </div>

        @livewire('components.state-city-locality', ['selectedLocality' => $selectedLocalityId])

        <div class="grid-cols-3 gap-2 sm:grid">
            @wire('debounce.200ms')
                <x-form-input name="dob" label="Date of Birth" type="date" />

                <x-form-input name="contact_no" label="Contact No." type="number" />

                <x-form-input name="qualification" label="Qualification" type="text" />

                <x-form-input name="registration_no" label="Registration No." type="text" />

                <x-simple-select name="department_id" id="department_id" label="Department" wire:model="department_id"
                    :options="Helper::getKeyValuesWithMap('Department', 'name', 'id')" value-field='id' text-field='name' placeholder="Select Department"
                    search-input-placeholder="Search Department" :searchable="true" />

                <x-form-input name="registration_fee" label="Registration Fee" type="number" />

                <x-form-input name="consultation_fee" label="Consultation Fee" type="number" />

                <x-form-input name="review_link" label="Review Link" type="number" />

                <x-form-input name="career_start_date" label="Career Start Date" type="date" />

                <x-form-textarea name="about" label="About" />
            @endwire
        </div>
    </x-custom-form>

    @if (Helper::getRouteAction() != 'create')
        <div class="col-span-12 mt-8 lg:col-span-12">
            <div class="p-5 rounded-lg box">
                <div class="col-span-12 lg:col-span-4">
                    <div class="pr-1">
                        <div class="p-2 box">
                            <ul class="nav nav-pills" role="tablist">
                                <li id="education-tab" class="flex-1 nav-item" role="presentation">
                                    <button class="w-full py-2 nav-link active" data-tw-toggle="pill"
                                        data-tw-target="#education" type="button" role="tab"
                                        aria-controls="education" aria-selected="true">Education</button>
                                </li>
                                <li id="schedule-tab" class="flex-1 nav-item" role="presentation">
                                    <button class="w-full py-2 nav-link" data-tw-toggle="pill"
                                        data-tw-target="#schedule" type="button" role="tab"
                                        aria-controls="schedule" aria-selected="false">Schedule
                                    </button>
                                </li>
                                <li id="work-tab" class="flex-1 nav-item" role="presentation">
                                    <button class="w-full py-2 nav-link" data-tw-toggle="pill" data-tw-target="#work"
                                        type="button" role="tab" aria-controls="work" aria-selected="false">Work
                                    </button>
                                </li>
                                <li id="service-tab" class="flex-1 nav-item" role="presentation">
                                    <button class="w-full py-2 nav-link" data-tw-toggle="pill" data-tw-target="#service"
                                        type="button" role="tab" aria-controls="service"
                                        aria-selected="false">Service
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content">

                        <div id="education" class="tab-pane active" role="tabpanel" aria-labelledby="education-tab">
                            <div class="grid grid-cols-12 gap-5 mt-5">
                                <div class="col-span-12">
                                    <div class="flex items-center justify-between mt-20 lg:mt-8">
                                        <div class="mr-auto text-lg font-medium">
                                            {{ 'Education' }}
                                        </div>
                                        <div class="sm:w-auto sm:mt-0">
                                            <button
                                                wire:click="$emit('openModal', 'modals.doctor-education-modal', {{ json_encode(['doctor_id' => $doctor_id]) }})"
                                                class="mr-2 shadow-md btn btn-primary">{{ 'Add' }}</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    @livewire('tables.doctor-education-table', ['doctor_id' => $doctor_id])
                                </div>

                            </div>
                        </div>

                        <div id="schedule" class="tab-pane" role="tabpanel" aria-labelledby="schedule-tab">
                            <div class="grid grid-cols-12 gap-5 mt-5">
                                <div class="col-span-12">
                                    <div class="flex items-center justify-between mt-20 lg:mt-8">
                                        <div class="mr-auto text-lg font-medium">
                                            {{ 'Schedule' }}
                                        </div>
                                        <div class="sm:w-auto sm:mt-0">
                                            <button
                                                wire:click="$emit('openModal', 'modals.doctor-schedule-modal', {{ json_encode(['doctor_id' => $doctor_id]) }})"
                                                class="mr-2 shadow-md btn btn-primary">{{ 'Add' }}</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    @livewire('tables.doctor-schedule-table', ['doctor_id' => $doctor_id])
                                </div>

                            </div>
                        </div>

                        <div id="work" class="tab-pane" role="tabpanel" aria-labelledby="work-tab">
                            <div class="grid grid-cols-12 gap-5 mt-5">
                                <div class="col-span-12">
                                    <div class="flex items-center justify-between mt-20 lg:mt-8">
                                        <div class="mr-auto text-lg font-medium">
                                            {{ 'Work' }}
                                        </div>
                                        <div class="sm:w-auto sm:mt-0">
                                            <button
                                                wire:click="$emit('openModal', 'modals.doctor-work-modal', {{ json_encode(['doctor_id' => $doctor_id]) }})"
                                                class="mr-2 shadow-md btn btn-primary">{{ 'Add' }}</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    @livewire('tables.doctor-work-table', ['doctor_id' => $doctor_id])
                                </div>

                            </div>
                        </div>

                        <div id="service" class="tab-pane" role="tabpanel" aria-labelledby="service-tab">
                            <div class="grid grid-cols-12 gap-5 mt-5">
                                <div class="col-span-12">
                                    {{ __('Services Check List') }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
