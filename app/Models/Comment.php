<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    public function User():BelongsTo{
        return $this->belongsTo(User::class);
    }

    
    public function Blog():BelongsTo{
        return $this->belongsTo(Blog::class);
    }
}
