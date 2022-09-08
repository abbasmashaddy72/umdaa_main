<nav class="side-nav">
    <x-logo class="items-center pt-4 pl-5 intro-x">
        <span class="hidden ml-3 text-lg text-white xl:block">
            {{ config('app.name', 'Laravel') }}
        </span>
    </x-logo>
    <div class="my-6 side-nav__devider"></div>
    <ul>
        @foreach ($side_menu as $menuKey => $menu)
            @if ($menu == 'devider')
                <li class="my-6 side-nav__devider"></li>
            @else
                <li>
                    <a href="{{ isset($menu['route_name']) ? route($menu['route_name']) : 'javascript:;' }}"
                        class="{{ $first_level_active_index == $menuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                        <div class="side-menu__icon">
                            <i data-feather="{{ $menu['icon'] }}"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ $menu['title'] }}
                            @if (isset($menu['sub_menu']))
                                <div
                                    class="side-menu__sub-icon {{ $first_level_active_index == $menuKey ? 'transform rotate-180' : '' }}">
                                    <i data-feather="chevron-down"></i>
                                </div>
                            @endif
                        </div>
                    </a>
                    @if (isset($menu['sub_menu']))
                        <ul class="{{ $first_level_active_index == $menuKey ? 'side-menu__sub-open' : '' }}">
                            @foreach ($menu['sub_menu'] as $subMenuKey => $subMenu)
                                <li>
                                    <a href="{{ isset($subMenu['route_name']) ? route($subMenu['route_name']) : 'javascript:;' }}"
                                        class="{{ $second_level_active_index == $subMenuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                                        <div class="side-menu__icon">
                                            <i data-feather="activity"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            {{ $subMenu['title'] }}
                                            @if (isset($subMenu['sub_menu']))
                                                <div
                                                    class="side-menu__sub-icon {{ $second_level_active_index == $subMenuKey ? 'transform rotate-180' : '' }}">
                                                    <i data-feather="chevron-down"></i>
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                    @if (isset($subMenu['sub_menu']))
                                        <ul
                                            class="{{ $second_level_active_index == $subMenuKey ? 'side-menu__sub-open' : '' }}">
                                            @foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu)
                                                <li>
                                                    <a href="{{ isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name']) : 'javascript:;' }}"
                                                        class="{{ $third_level_active_index == $lastSubMenuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                                                        <div class="side-menu__icon">
                                                            <i data-feather="zap"></i>
                                                        </div>
                                                        <div class="side-menu__title">{{ $lastSubMenu['title'] }}
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
</nav>
