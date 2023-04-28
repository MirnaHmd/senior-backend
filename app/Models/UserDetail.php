<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**

 * @property string fName
 * @property string lName
 * @property string email
 * @property string password
 * @property string gender
 * @property string nationality
 * @property string number
 * @property string location
 * @property string major

 **/
class UserDetail extends Model
{
    use HasFactory;
}
