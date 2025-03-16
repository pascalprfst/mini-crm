<?php

namespace App\Actions;

use App\Models\LabelGroup;
use Illuminate\Support\Str;

class CreateLabelGroup
{
    public function handle(array $data): LabelGroup
    {
        $baseSlug = Str::slug($data['name']);
        $slug = $baseSlug;
        $counter = 1;

        while (LabelGroup::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $options = [];

        foreach ($data['options'] as $option) {
            $options[] = $option['value'];
        }

        $labelGroup = LabelGroup::create([
            'name' => $data['name'],
            'slug' => $slug,
            'model_type' => $data['modelType'],
            'values' => $options,
        ]);

        return $labelGroup;
    }
}
