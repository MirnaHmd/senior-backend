<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string user_id
 * @property string gender
 * @property string number
 * @property string location
 * @property string major
 **/
class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'number',
        'location',
        'gender',
        'major'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class);
    }

}
