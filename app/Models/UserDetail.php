<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property integer user_id
 * @property string gender
 * @property string nationality
 * @property string number
 * @property string location
 * @property string major

 **/
class UserDetail extends Model
{
    use HasFactory;

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class);
    }

}
