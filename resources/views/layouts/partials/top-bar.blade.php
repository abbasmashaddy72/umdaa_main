<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    {{ $breadcrumb }}
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Notifications -->
    <div class="mr-auto intro-x dropdown sm:mr-6">
        <div class="cursor-pointer dropdown-toggle notification notification--bullet" role="button" aria-expanded="false"
            data-tw-toggle="dropdown">
            <i data-feather="bell" class="notification__icon dark:text-slate-500"></i>
        </div>
        <div class="pt-2 notification-content dropdown-menu">
            <div class="notification-content__box dropdown-content">
                <div class="notification-content__title">Notifications</div>
                <div class="relative flex items-center cursor-pointer ">
                    <div class="flex-none w-12 h-12 mr-1 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                            src="{{ asset('dist/images/profile-8.jpg') }}">
                        <div
                            class="absolute bottom-0 right-0 w-3 h-3 border-2 border-white rounded-full bg-success dark:border-darkmode-600">
                        </div>
                    </div>
                    <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                            <a href="javascript:;" class="mr-5 font-medium truncate">Christian Bale</a>
                            <div class="ml-auto text-xs text-slate-400 whitespace-nowrap">01:10 PM</div>
                        </div>
                        <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of the
                            printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy
                            text ever since the 1500</div>
                    </div>
                </div>
                <div class="relative flex items-center mt-5 cursor-pointer">
                    <div class="flex-none w-12 h-12 mr-1 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                            src="{{ asset('dist/images/profile-8.jpg') }}">
                        <div
                            class="absolute bottom-0 right-0 w-3 h-3 border-2 border-white rounded-full bg-success dark:border-darkmode-600">
                        </div>
                    </div>
                    <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                            <a href="javascript:;" class="mr-5 font-medium truncate">Brad Pitt</a>
                            <div class="ml-auto text-xs text-slate-400 whitespace-nowrap">03:20 PM</div>
                        </div>
                        <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem Ipsum is
                            not simply random text. It has roots in a piece of classical Latin literature from 45 BC,
                            making it over 20</div>
                    </div>
                </div>
                <div class="relative flex items-center mt-5 cursor-pointer">
                    <div class="flex-none w-12 h-12 mr-1 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                            src="{{ asset('dist/images/profile-8.jpg') }}">
                        <div
                            class="absolute bottom-0 right-0 w-3 h-3 border-2 border-white rounded-full bg-success dark:border-darkmode-600">
                        </div>
                    </div>
                    <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                            <a href="javascript:;" class="mr-5 font-medium truncate">Robert De Niro</a>
                            <div class="ml-auto text-xs text-slate-400 whitespace-nowrap">01:10 PM</div>
                        </div>
                        <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader
                            will be distracted by the readable content of a page when looking at its layout. The point
                            of using Lorem </div>
                    </div>
                </div>
                <div class="relative flex items-center mt-5 cursor-pointer">
                    <div class="flex-none w-12 h-12 mr-1 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                            src="{{ asset('dist/images/profile-8.jpg') }}">
                        <div
                            class="absolute bottom-0 right-0 w-3 h-3 border-2 border-white rounded-full bg-success dark:border-darkmode-600">
                        </div>
                    </div>
                    <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                            <a href="javascript:;" class="mr-5 font-medium truncate">Russell Crowe</a>
                            <div class="ml-auto text-xs text-slate-400 whitespace-nowrap">05:09 AM</div>
                        </div>
                        <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem Ipsum is
                            not simply random text. It has roots in a piece of classical Latin literature from 45 BC,
                            making it over 20</div>
                    </div>
                </div>
                <div class="relative flex items-center mt-5 cursor-pointer">
                    <div class="flex-none w-12 h-12 mr-1 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                            src="{{ asset('dist/images/profile-8.jpg') }}">
                        <div
                            class="absolute bottom-0 right-0 w-3 h-3 border-2 border-white rounded-full bg-success dark:border-darkmode-600">
                        </div>
                    </div>
                    <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                            <a href="javascript:;" class="mr-5 font-medium truncate">Kevin Spacey</a>
                            <div class="ml-auto text-xs text-slate-400 whitespace-nowrap">01:10 PM</div>
                        </div>
                        <div class="w-full truncate text-slate-500 mt-0.5">There are many variations of passages of
                            Lorem Ipsum available, but the majority have suffered alteration in some form, by injected
                            humour, or randomi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Notifications -->
    <!-- BEGIN: Account Menu -->
    <div class="w-10 h-10 intro-x dropdown">
        <div class="relative flex items-center justify-center w-10 h-10 text-xl text-white uppercase rounded-full shadow-lg bg-primary dropdown-toggle"
            role="button" aria-expanded="false" data-tw-toggle="dropdown">
            {{ Auth::user()->initials }}</div>
        <div class="w-56 dropdown-menu">
            <ul class="text-white dropdown-content bg-primary">
                <li class="p-2">
                    <div class="font-medium">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">
                        {{ Auth::user()->roles->first()->title }}</div>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <a href="" class="dropdown-item hover:bg-white/5"><i data-feather="user"
                            class="w-4 h-4 mr-2"></i>Profile</a>
                </li>
                <li>
                    <a href="" class="dropdown-item hover:bg-white/5">
                        <i data-feather="edit" class="w-4 h-4 mr-2"></i>
                        Add Account
                    </a>
                </li>
                <li>
                    <a href="" class="dropdown-item hover:bg-white/5">
                        <i data-feather="lock" class="w-4 h-4 mr-2"></i>
                        Reset Password
                    </a>
                </li>
                <li>
                    <a href="" class="dropdown-item hover:bg-white/5">
                        <i data-feather="help-circle" class="w-4 h-4 mr-2"></i>
                        Help
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="dropdown-item hover:bg-white/5">
                            <i data-feather="toggle-right"class="w-4 h-4 mr-2"></i>
                            Logout
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>
