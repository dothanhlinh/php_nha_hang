<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giabanModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    const UPDATED_AT = null;
    public $timestamps = false;
    protected $table ='giaban';
    protected $filltable =['id', 'giaBan', 'moTa', 'trangThai', 'created_by_user_id', 'created_date_time', 'lu_updated', 'lu_user_id' ];
}
