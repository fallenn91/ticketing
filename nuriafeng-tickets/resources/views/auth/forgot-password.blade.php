<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-content-secondary">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-emerald-600 dark:text-emerald-400">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-ui.label for="email" :required="true">{{ __('Email') }}</x-ui.label>
                <x-ui.input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-ui.button type="submit">
                    {{ __('Email Password Reset Link') }}
                </x-ui.button>
            </div>
        </form>

        <div class="mt-6 pt-6 border-t border-border text-center">
            <p class="text-sm text-content-secondary">
                <a href="{{ route('login') }}" class="font-medium text-accent hover:text-accent-hover transition-colors duration-150">
                    {{ __('Back to login') }}
                </a>
            </p>
        </div>
    </x-authentication-card>
</x-guest-layout>
