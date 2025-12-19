<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-content-secondary">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-ui.label for="password" :required="true">{{ __('Password') }}</x-ui.label>
                <x-ui.input id="password" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-6">
                <x-ui.button type="submit">
                    {{ __('Confirm') }}
                </x-ui.button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
