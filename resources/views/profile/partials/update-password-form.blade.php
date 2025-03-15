<div>
    <header>
        <p class="mt-1 text-sm text-slate-600">
            {{ __('global.use-secure-password') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6">
        @csrf
        @method('put')

        <x-input
            label="{{ __('global.current-password') }}"
            id="update_password_current_password"
            name="current_password"
            type="password"
            autocomplete="current-password"
        />

        <div class="my-2">
            <x-input
                label="{{ __('global.new-password') }}"
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
            />
        </div>

        <x-input
            label="{{ __('global.confirm-password') }}"
            id="update_password_password_confirmation"
            name="password_confirmation"
            type="password"
            autocomplete="new-password"
        />

        <div class="flex items-center gap-4 mt-6">
            <x-primary-button>{{ __('global.save') }}</x-primary-button>
        </div>
    </form>
</div>
