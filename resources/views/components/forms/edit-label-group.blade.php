<div>
    <h4 class="font-medium text-slate-800 text-base mb-2">Gruppe bearbeiten</h4>
    <x-select label="Gruppe auswählen" name="group" id="group"
              wire:change="selectGroup($event.target.value)">
        <option disabled selected value="">Gruppe auswählen</option>
        @foreach($allLabelGroups as  $group)
            <option value="{{$group->id}}" wire:key="{{$group->id}}">{{$group->name}}</option>
        @endforeach
    </x-select>

    @if($selectedGroup)
        <form x-data="editLabelGroup($wire, '{{$selectedGroup->name}}', {{$selectedGroup->id}})" @submit.prevent="edit"
              class="mt-4">
            <x-input label="Name" name="newName" id="newName" x-model="newName"/>

            <h5 class="text-slate-800 text-base my-2">Optionen</h5>

            <ul>
                @foreach($selectedGroup->values as $key =>$value)
                    <li class="px-2.5 py-1 border text-base text-slate-800 border-slate-300 rounded-md bg-slate-100 mb-2 flex justify-between items-center">
                        {{$value}}
                        <i wire:click="removeLabelFromGroup('{{$key}}', {{$selectedGroup->id}})"
                           class="fa-solid fa-circle-xmark text-lg text-red-600 hover:text-red-500 ml-2 cursor-pointer"></i>
                    </li>
                @endforeach
            </ul>

            <div class="my-2">
                <x-input placeholder="Neue Option"/>
            </div>

            <x-sub-button>
                <i class="fa-solid fa-plus text-slate-800 font-semibold"></i>
                <span>Option hinzufügen</span>
            </x-sub-button>

            <x-primary-button>Speichern</x-primary-button>
        </form>
    @endif
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('editLabelGroup', ($wire, name, id) => ({
            newName: name,
            groupId: id,
            edit() {
                this.$wire.editGroup({name: this.newName}, this.groupId)
            }
        }));
    });
</script>
