<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-emerald-600 dark:text-emerald-400">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-ui.label for="email" :required="true">{{ __('Email') }}</x-ui.label>
                <x-ui.input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-ui.label for="password" :required="true">{{ __('Password') }}</x-ui.label>
                <x-ui.input id="password" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded border-border text-accent focus:ring-accent/50 bg-surface">
                    <span class="ms-2 text-sm text-content-secondary">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="text-sm text-content-secondary hover:text-content transition-colors duration-150" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-ui.button type="submit">
                    {{ __('Log in') }}
                </x-ui.button>
            </div>
        </form>

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::registration()))
            <div class="mt-6 pt-6 border-t border-border text-center">
                <p class="text-sm text-content-secondary">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" class="font-medium text-accent hover:text-accent-hover transition-colors duration-150">
                        {{ __('Sign up') }}
                    </a>
                </p>
            </div>
        @endif
    </x-authentication-card>
</x-guest-layout>
