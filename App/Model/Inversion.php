<?php

namespace App\Model;

use App\System\Model;

class Inversion extends Model
{
    //Required fields
    protected static $table       = 'gastos';
    protected static $primaryKey  = 'id';
    //fields Table for sync up
    protected static $allowedFields = ['id_user', 'features', 'cant', 'price', 'photo', 'estado'];

    // Dates
    protected static $useTimestamps   = true;
    protected static $createdField    = 'created_at'; //no sirve
    protected static $updatedField    = 'updated_at';
}
