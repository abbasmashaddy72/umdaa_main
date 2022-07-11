<x-login-layout>
    <x-auth.container>
        @slot('left')
            <img alt="Larvel Tailwind HTML Admin Template" class="w-1/2 -mt-16 -intro-x"
                src="{{ asset('dist/images/illustration.svg') }}">
            <div class="w-4/6 mt-10 text-4xl font-medium leading-tight text-white -intro-x">
                {{ __('Confirm Password') }}</div>
        @endslot
        @slot('right')
            <h2 class="text-2xl font-bold text-center intro-x xl:text-3xl xl:text-left">{{ __('Confirm Password') }}</h2>

            <div class="mt-2 text-center intro-x text-slate-400 xl:hidden">
                {{ __('A few more clicks to sign in to your account.') }}{{ __('Manage your Hospitals/Clinics in one place') }}
            </div>

            <div class="mt-8 intro-x">

                <!-- Session Status -->
                <x-auth.session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth.validation-errors class="mb-4" :errors="$errors" />

                <form id="login-form" method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <x-form-input name="email" label="{{ __('Email') }}" type="email" required :value="old('email', $request->email)"
                        :show-errors="false" />

                    <x-form-input name="password" label="{{ __('Password') }}" type="password" required autofocus
                        :show-errors="false" />

                    <x-form-input name="password_confirmation" label="{{ __('Confirm Password') }}" type="password"
                        required :show-errors="false" />

            </div>

            <div class="flex justify-end mt-5 intro-x xl:mt-8">

                <button class="w-full px-4 py-3 mr-auto align-top btn btn-primary xl:w-36 xl:mr-3" id="btn-login"
                    type="submit">{{ __('Reset Password') }}</button>
            </div>

            </form>
            </div>
        @endslot
    </x-auth.container>
</x-login-layout>
