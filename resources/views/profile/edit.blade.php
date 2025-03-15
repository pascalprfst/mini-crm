<x-app-layout>
    <x-section heading="{{ __('global.Profile Information') }}">
        @include('profile.partials.update-profile-information-form')
    </x-section>

    <div class="grid gap-8 grid-cols-1 lg:grid-cols-2 mt-8">
        <x-section heading="{{ __('global.Update Password') }}">
            @include('profile.partials.update-password-form')
        </x-section>

        <x-section class="max-h-max" heading="{{ __('global.Delete Account') }}">
            @include('profile.partials.delete-user-form')
        </x-section>
    </div>
</x-app-layout>
