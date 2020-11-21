<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'reply',
    ];

    // <------ Relationships ------>

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
