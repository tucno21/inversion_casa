<?php

namespace App\Model;

use App\System\Model;

class User extends Model
{
    //Required fields
    protected static $table       = 'users';
    protected static $primaryKey  = 'id';
    //fields Table for sync up
    protected static $allowedFields = ['name', 'username', 'password'];
    //if there is a password field encrypt
    //the field must be the same $allowedFields
    protected static $passEncrypt = true;
    protected static $password = 'password'; //password_hash($password, PASSWORD_BCRYPT)
    //password_verify(Input['password'], $result->password) //true - false;

    // Dates
    protected static $useTimestamps   = true;
    protected static $createdField    = 'created_at'; //no sirve
    protected static $updatedField    = 'updated_at';
}
