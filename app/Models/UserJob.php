<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string user_id,
 * @property string job_id,
 * @property string file_path
 **/
class UserJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'job_id',
        'file_path'
    ];
}
