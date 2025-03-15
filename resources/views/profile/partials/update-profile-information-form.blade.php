<div>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profilinformationen') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Aktualisieren Sie Ihre Profilinformationen und E-Mail-Adresse.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex flex-col items-center space-y-4">
            <div class="relative group">
                <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-100">
                    <img id="preview-image"
                         src="{{ $user->avatar_url ?? '/assets/placeholder-avatar.png' }}"
                         alt="Profilbild"
                         class="w-full h-full object-cover bg-white">
                </div>
                <label for="photo"
                       class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white opacity-0 group-hover:opacity-100 rounded-full cursor-pointer transition-all duration-200">
                    <span>Foto ändern</span>
                </label>
                <input type="file"
                       id="photo"
                       name="photo"
                       accept="image/*"
                       class="hidden"
                       onchange="previewImage(event)">
            </div>
            <p class="text-sm text-gray-500">Klicken Sie hier, um ein neues Foto hochzuladen</p>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                              :value="old('name', $user->name)"
                              required autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('name')"/>
            </div>

            <div>
                <x-input-label for="email" :value="__('E-Mail')"/>
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                              :value="old('email', $user->email)" required autocomplete="username"/>
                <x-input-error class="mt-2" :messages="$errors->get('email')"/>

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Ihre E-Mail-Adresse ist nicht verifiziert.') }}

                            <button form="send-verification"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Klicken Sie hier, um die Verifizierungs-E-Mail erneut zu senden.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('Ein neuer Verifizierungslink wurde an Ihre E-Mail-Adresse gesendet.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Speichern') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Gespeichert.') }}</p>
            @endif
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview-image');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<style>
    .group:hover .group-hover\:opacity-100 {
        opacity: 1;
    }
</style>
