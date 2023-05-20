<x-login-layout>
    <x-auth.container>
        @slot('left')
            <img alt="Larvel Tailwind HTML Admin Template" class="w-1/2 -mt-16 -intro-x"
                src="{{ asset('dist/images/illustration.svg') }}">
            <div class="w-4/6 mt-10 text-4xl font-medium leading-tight text-white -intro-x">
                {{ __('This is a secure area of the application.') }}</div>
        @endslot
        @slot('right')
            <h2 class="text-2xl font-bold text-center intro-x xl:text-3xl xl:text-left">{{ __('Confirm your password?') }}
            </h2>

            <div class="mt-2 text-center intro-x text-slate-400">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <div class="mt-8 intro-x">

                <!-- Validation Errors -->
                <x-auth.validation-errors class="mb-4" :errors="$errors" />

                <form id="login-form" method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <x-form-input name="password" label="{{ __('Password') }}" type="password" required autofocus
                        :show-errors="false" />

                    <div class="flex justify-end mt-5 intro-x xl:mt-8">

                        <button class="w-full px-4 py-3 mr-auto align-top btn btn-primary xl:w-52 xl:mr-3" id="btn-login"
                            type="submit">{{ __('Confirm') }}</button>
                    </div>

                </form>
            </div>
        @endslot
    </x-auth.container>
</x-login-layout>
