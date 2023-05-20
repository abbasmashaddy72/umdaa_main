@props(['active' => false])

<li class="mt-2">
    <a href="#" class="top-menu @if ($active) top-menu--active @endif">
        <div class="top-menu__title">{{ $slot }}</div>
    </a>
</li>
