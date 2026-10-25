<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SeoMeta extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'tool_id',
        'title',
        'description',
        'keywords',
        'og_image'
    ];

    public $translatable = ['title', 'description', 'keywords'];

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }
}
