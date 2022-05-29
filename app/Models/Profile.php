<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function profileImage ()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/PZdBVGQzg5NXOp8CmzOGZx6u1W3R2ZJHrjpXwTTn.png';
        return '/storage/' . $imagePath;
    }

    public function followers() {
        return $this->belongsToMany(User::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}
