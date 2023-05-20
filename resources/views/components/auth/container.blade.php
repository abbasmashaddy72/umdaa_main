<div class="container sm:px-10">
    <div class="block grid-cols-2 gap-4 xl:grid">
        <!-- BEGIN: Login Info -->
        <div class="flex-col hidden min-h-screen xl:flex">
            <x-logo class="items-center pt-5 -intro-x">
                <span class="ml-3 text-lg text-white">
                    {{ config('app.name', 'Laravel') }}
                </span>
            </x-logo>
            <div class="my-auto">
                {{ $left }}
            </div>
        </div>
        <!-- END: Login Info -->
        <div class="flex h-screen py-5 my-10 xl:h-auto xl:py-0 xl:my-0">
            <div
                class="w-full px-5 py-8 mx-auto my-auto bg-white rounded-md shadow-md xl:ml-20 dark:bg-darkmode-600 xl:bg-transparent sm:px-8 xl:p-0 xl:shadow-none sm:w-3/4 lg:w-2/4">
                {{ $right }}
            </div>
        </div>
    </div>
</div>
