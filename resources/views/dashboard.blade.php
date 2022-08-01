<x-app-layout>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('#') }}</x-slot>
        <div class="col-span-12 xl:col-span-4 2xl:col-span-3">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
