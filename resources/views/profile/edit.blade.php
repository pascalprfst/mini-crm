<x-app-layout>
    <x-section heading="{{ __('Profile Information') }}">
        @include('profile.partials.update-profile-information-form')
    </x-section>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
