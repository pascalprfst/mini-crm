<div>
    <header>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('global.Once your account is deleted, all of its resources and data will be permanently deleted.') }}
        </p>
    </header>

    <div class="mt-6">
        <x-danger-button
            x-data
            x-on:click.prevent="$dispatch('open-modal',  {name: 'confirm-user-deletion'})"
        >{{ __('global.Delete Account') }}</x-danger-button>
    </div>


    <x-modal name="confirm-user-deletion">
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-slate-900">
                {{ __('global.Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-slate-600">
                {{ __('global.Once your account is deleted, all of its resources and data will be permanently deleted.') }}
            </p>

            <div class="mt-6">
                <x-input id="password" name="password" type="password" placeholder="{{ __('global.Password') }}"/>
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close-modal')">
                    {{ __('global.Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('global.Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</div>
