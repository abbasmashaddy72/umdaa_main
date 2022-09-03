@props(['active' => false])

<li class="w-full">
    <a href="#"
        class="@if ($active) text-gray-900 bg-gray-100 dark:bg-gray-700 active dark:text-white @else bg-white @endif inline-block w-full p-4 hover:text-gray-700 hover:bg-gray-50 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">{{ $slot }}</a>
</li>
