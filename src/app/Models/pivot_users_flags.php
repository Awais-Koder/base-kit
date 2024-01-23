<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
class pivot_users_flags extends Model
{
    use HasFactory;    public $table = 'pivot_users_flags';

    public $timestamps = false;

    public $fillable = [
        'user_id',
        'isOpenRightSidebar'
    ];

    protected $casts = [
        'isOpenRightSidebar' => 'boolean'
    ];

    public static array $rules = [
        'isOpenRightSidebar' => 'required|boolean'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
