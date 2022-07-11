<x-login-layout>
    <x-auth.container>
        @slot('left')
            <img alt="Larvel Tailwind HTML Admin Template" class="w-1/2 -mt-16 -intro-x"
                src="{{ asset('dist/images/illustration.svg') }}">
            <div class="w-4/6 mt-10 text-4xl font-medium leading-tight text-white -intro-x">
                {{ __('Forgot your password?') }}</div>
            <div class="mt-5 text-lg text-white -intro-x text-opacity-70 dark:text-slate-400">
                {{ __('No problem.') }}</div>
        @endslot
        @slot('right')
            <h2 class="text-2xl font-bold text-center intro-x xl:text-3xl xl:text-left">{{ __('Forgot your password?') }}
            </h2>

            <div class="mt-2 text-center intro-x text-slate-400">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <div class="mt-8 intro-x">

                <!-- Session Status -->
                <x-auth.session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth.validation-errors class="mb-4" :errors="$errors" />

                <form id="login-form" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <x-form-input name="email" label="{{ __('Email') }}" type="email" required autofocus
                        :show-errors="false" />

                    <div class="flex justify-between mt-5 intro-x xl:mt-8">

                        <button class="w-full px-4 py-3 mr-auto align-top btn btn-primary xl:w-52 xl:mr-3" id="btn-login"
                            type="submit">{{ __('Email Password Reset Link') }}</button>

                        <a class="w-full px-4 py-3 mt-3 align-top btn btn-outline-secondary xl:w-32 xl:mt-0"
                            href="{{ route('login') }}">{{ __('Sign In') }}</a>
                    </div>

                </form>
            </div>
        @endslot
    </x-auth.container>
</x-login-layout>
