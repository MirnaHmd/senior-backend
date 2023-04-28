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
 * @property string industry
 * @property string sector
**/
class Job extends Model
{
    use HasFactory;
}
