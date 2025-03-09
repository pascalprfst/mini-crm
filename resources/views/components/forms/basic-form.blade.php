<div>
    <form @submit.prevent="submitForm" class="mt-4">

        <label for="fieldname" class="text-sm text-slate-600 relative">
            Feldname<span class="text-red-500">*</span>
        </label>
        <input x-model="field_name" type="text" required id="fieldname" name="fieldname"
               class="w-full rounded-md border-slate-300 py-1.5"/>

        <div class="mt-4 flex items-center">
            <div @click="required = !required"
                 class="border border-slate-300 rounded-sm w-4 h-4 cursor-pointer mr-1 grid place-content-center">
                <i x-show="required" class="fa-solid fa-check text-green-500"></i>
            </div>
            <label @click="required = !required" for="required" class="text-sm text-slate-600 cursor-pointer">
                Pflichtfeld
            </label>
            <input x-model="required" class="hidden" type="checkbox" id="required"
                   name="required"/>
        </div>

        <div class="mt-6">
            <x-primary-button>
                Formularfeld speichern
            </x-primary-button>
        </div>
    </form>
</div>
