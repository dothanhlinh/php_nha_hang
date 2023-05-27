<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datbanModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    const UPDATED_AT = null;
    public $timestamps = false;
    protected $table ='datban';
    protected $filltable =['id', 'idKH', 'idBan', 'SDT', 'ngayDen', 'gioDen', 'soLuongNguoi', 'Soluongban', 'tenKH', 'created_by_user_id', 'trangThai', 'created_date_time', 'lu_updated', 'lu_user_id', 'cmnd'];

    
}
