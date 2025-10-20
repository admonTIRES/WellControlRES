<?php

namespace App\Models\Admin\Access;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersInformation extends Model
{
    use HasFactory;
    protected $table = 'user_information';
    protected $primaryKey = 'ID_USER';
    protected $fillable = [
        'USER_ID', 
        'FNAME_USER', 
        'MDNAME_USER',
        'LSNAME_USER',
        'INSTRUCTOR_USER',
        'INSTRUCTOR_ID',
        'ROLES_USER',
        'ACTIVO_USER',
    ];

    protected $casts = [
        'ROLES_USER' => 'array'
    ];
}
