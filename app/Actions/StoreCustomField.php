<?php

namespace App\Actions;

class StoreCustomField
{
    public function handle(string $modelType, int $id, array $data): void
    {
        $model = config('models.' . $modelType);

        $entity = $model::find($id);

        $entity->update([
            'custom_fields' => $data,
        ]);
    }
}
