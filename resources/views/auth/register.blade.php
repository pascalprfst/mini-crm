<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input label="{{__('Name')}}" id="name" name="name" :value="old('name')" class="bg-white/50" required/>
        </div>

        <div class="mt-2">
            <x-input label="{{__('E-Mail')}}" id="email" type="email" name="email" :value="old('email')"
                     class="bg-white/50" required/>
        </div>

        <div class="mt-2">
            <x-input label="{{__('Passwort')}}" id="password" type="password" name="password"
                     class="bg-white/50" required/>
        </div>

        <div class="mt-2">
            <x-input label="{{__('Passwort bestätigen')}}" id="password_confirmation" type="password"
                     name="password_confirmation"
                     class="bg-white/50" required/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
