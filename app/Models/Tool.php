<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Laravel\Scout\Searchable;

class Tool extends Model
{
    use HasFactory, HasTranslations, Searchable;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'blade_view_name',
        'is_active',
        'order'
    ];

    public $translatable = ['name', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function seoMeta()
    {
        return $this->hasOne(SeoMeta::class);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->getTranslation('name', 'es') . ' ' . $this->getTranslation('name', 'en'),
            'description' => $this->getTranslation('description', 'es') . ' ' . $this->getTranslation('description', 'en'),
        ];
    }
}
