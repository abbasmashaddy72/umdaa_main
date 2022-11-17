<div class="flex justify-around space-x-1">
    <a wire:click='$emit("openModal", "modals.doctor-work-modal", @json(['doctor_work_id' => $id]))'
        class="p-1 rounded text-primary hover:bg-primary hover:text-white">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
            </path>
        </svg>
    </a>
</div>
