<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string password
 * @property string role
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    public function detail(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserDetail::class);
    }

    public function jobs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function appliedJobs(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Job::class, UserJob::class);
    }

}
