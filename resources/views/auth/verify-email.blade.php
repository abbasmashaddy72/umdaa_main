<x-login-layout>
    <x-auth.container>
        @slot('left')
            <img alt="Larvel Tailwind HTML Admin Template" class="w-1/2 -mt-16 -intro-x"
                src="{{ asset('dist/images/illustration.svg') }}">
            <div class="w-4/6 mt-10 text-4xl font-medium leading-tight text-white -intro-x">
                {{ __('Thanks for signing up!') }}</div>
        @endslot
        @slot('right')
            <h2 class="text-2xl font-bold text-center intro-x xl:text-3xl xl:text-left">{{ __('Email Verification') }}</h2>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-sm font-medium text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-2 text-left intro-x text-slate-400">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            <div class="mt-8 intro-x">

                <div class="flex justify-between mt-5 intro-x xl:mt-8">

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <button class="w-full px-4 py-3 mr-auto align-top btn btn-primary xl:w-52 xl:mr-3"
                                id="btn-login" type="submit">{{ __('Resend Verification Email') }}</button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="w-full px-4 py-3 mt-3 align-top btn btn-outline-secondary xl:w-32 xl:mt-0"
                            id="btn-login" type="submit">{{ __('Sign Out') }}</button>
                    </form>

                </div>

            </div>
        @endslot
    </x-auth.container>
</x-login-layout>
