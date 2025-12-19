<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-ui.label for="name" :required="true">{{ __('Name') }}</x-ui.label>
                <x-ui.input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-ui.label for="email" :required="true">{{ __('Email') }}</x-ui.label>
                <x-ui.input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-ui.label for="password" :required="true">{{ __('Password') }}</x-ui.label>
                <x-ui.input id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-ui.label for="password_confirmation" :required="true">{{ __('Confirm Password') }}</x-ui.label>
                <x-ui.input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-ui.button type="submit">
                    {{ __('Register') }}
                </x-ui.button>
            </div>
        </form>

        <div class="mt-6 pt-6 border-t border-border text-center">
            <p class="text-sm text-content-secondary">
                {{ __('Already registered?') }}
                <a href="{{ route('login') }}" class="font-medium text-accent hover:text-accent-hover transition-colors duration-150">
                    {{ __('Log in') }}
                </a>
            </p>
        </div>
    </x-authentication-card>
</x-guest-layout>
