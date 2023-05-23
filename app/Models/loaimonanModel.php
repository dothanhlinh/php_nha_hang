<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaimonanModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    const UPDATED_AT = null;
    public $timestamps = false;
    protected $table ='loaimonan';
    protected $filltable =['id', 'tenLoai', 'moTa', 'trangThai', 'created_by_user_id', 'created_date_time', 'lu_updated', 'lu_user_id' ];
    
    public  function loaiMA(){
        return $this->belongsTo(loaimonanModel::class,'id','idLoaiMonAn');
    }
}
