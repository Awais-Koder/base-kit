<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spark\Billable;
use App\Repositories\SuperUserRepository;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\CustomVerifyEmailNotification;
class User extends Authenticatable implements MustVerifyEmail
{
    // use Billable, HasApiTokens, HasFactory, Notifiable;
    use HasApiTokens, HasFactory, Notifiable;

    protected $superUserRepository;

    public function __construct(array $attributes = [], SuperUserRepository $superUserRepository = null)
    {
        parent::__construct($attributes);
        $this->superUserRepository = $superUserRepository ?: app(SuperUserRepository::class);
    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function superUser()
    {
        return $this->hasOne(SuperUser::class, 'user_id');
    }

    public function getIsSuperUserAttribute()
    {
        return $this->superUserRepository->isSuperUser($this->id);
    }
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmailNotification($this));
    }
    
}
