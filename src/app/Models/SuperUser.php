<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
class SuperUser extends Model
{
    use HasFactory;    public $table = 'super_users';

    public $timestamps = false;

    public $fillable = [
        'user_id'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
