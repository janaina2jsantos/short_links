<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $table    = "links";
    protected $fillable = ['user_id', 'url', 'url_shor', 'counter'];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
