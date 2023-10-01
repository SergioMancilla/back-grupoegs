<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function people(): HasMany
    {
        return $this->hasMany(Person::class);
    }
}
