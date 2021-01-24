<?php 

namespace App\Models;

use App\Core\Model;
use Container\Container as App;

class User extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'active',
        'fullname',
        'firstname',
        'lastname',
        'username',
        'lang',
        'role',
        'nickname',
        'emoji',
        'photo',
        'banned',
        'ban_comment',
        'ban_date_from',
        'ban_date_to',
        'state_name',
        'state_data',
        'source',
        'version',
        'first_message',
        'last_message',
        'note',
    ];
}