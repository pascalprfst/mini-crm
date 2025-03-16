@props(['action' => false, 'template', 'fields' ,'labelGroups','model'])

@if($action && $fields)
    <form method="POST" action="{{$action}}">
        @csrf
        <div class="grid gap-x-5 gap-y-3 w-full mb-4"
             style="grid-template-columns: repeat({{$template->grid_columns ?? 2}}, 1fr)">
            @foreach($fields as $field)
                <x-forms.form-fields :field="$field"/>
            @endforeach
        </div>

        @if(count($labelGroups) > 0)
            <hr>
            <div class="mt-4">
                @foreach($labelGroups as $group)
                    <h4 class="font-medium text-main text-base mt-4 mb-2">{{$group->name}}</h4>

                    <div class="mt-2 flex flex-wrap gap-2.5">
                        @foreach($group->values as $value)
                            <div x-data="{active: false}"
                                 @click="active = !active"
                                 :class="active ? 'border-green-600 text-green-600 bg-green-100 hover:bg-green-200' : 'border-slate-300 text-slate-800 hover:bg-slate-100'"
                                 class="px-4 py-px text-base border  rounded-md cursor-pointer">{{$value}}</div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-6">
            <x-primary-button>{{$model}} anlegen</x-primary-button>
        </div>
    </form>
@endif
