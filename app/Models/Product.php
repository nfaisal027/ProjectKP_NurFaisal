<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory,Sluggable;

    protected $guarded = ['id'];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function brand()
    {
        return $this->belongsTo(brand::class);
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function keranjang()
    {
        return $this->hasOne(keranjang::class);
    }

}
