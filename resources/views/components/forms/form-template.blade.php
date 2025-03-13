@props(['action' => false, 'template', 'fields' , 'model'])

@if($action && $fields)
    <form method="POST" action="{{$action}}">
        @csrf
        <div class="grid gap-x-5 gap-y-3 w-full"
             style="grid-template-columns: repeat({{$template->grid_columns ?? 2}}, 1fr)">
            @foreach($fields as $field)
                <x-forms.form-fields :field="$field"/>
            @endforeach
        </div>

        <div class="mt-6">
            <x-primary-button>{{$model}} anlegen</x-primary-button>
        </div>
    </form>
@endif
