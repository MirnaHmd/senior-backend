<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string job_title
 * @property string salary_estimate
 * @property string job_description
 * @property string company_name
 * @property string location
 * @property string size
 * @property string industry
 * @property string sector
 **/
class Job extends Model
{
    use HasFactory;

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class);
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, UserJob::class);
    }

}
