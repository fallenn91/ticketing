<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-ui.label for="email" :required="true">{{ __('Email') }}</x-ui.label>
                <x-ui.input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-ui.label for="password" :required="true">{{ __('New Password') }}</x-ui.label>
                <x-ui.input id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-ui.label for="password_confirmation" :required="true">{{ __('Confirm Password') }}</x-ui.label>
                <x-ui.input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-ui.button type="submit">
                    {{ __('Reset Password') }}
                </x-ui.button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
