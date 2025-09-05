<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_featured'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(related: Product::class);
    }

    
}
