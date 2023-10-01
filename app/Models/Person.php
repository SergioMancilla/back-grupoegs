<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function cities(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function document_types(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }
}
