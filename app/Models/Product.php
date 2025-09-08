<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'category_id',
        'name',
        'slug',
        'description',
        'is_featured'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(related: Brand::class);  
    }

    public function Category(): BelongsTo
    {
        return $this->belongsTo(related: Category::class);  
    }

    public function Sku(): HasMany
    {
        return $this->hasMany(Sku::class); 
    }
}
