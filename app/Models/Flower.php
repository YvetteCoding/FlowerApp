<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Flower extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function priceWithEuro(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->attributes['price'] . ' €'
        );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
