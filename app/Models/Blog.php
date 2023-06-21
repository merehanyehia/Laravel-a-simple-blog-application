<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;

    public function Comment():HasMany{
        return $this->hasMany(Comment::class);
    }

    protected $fillable=['title','content','user_id'];

    public function users():BelongsTo{
       return $this->belongsTo(User::class,'user_id');
    }

}
