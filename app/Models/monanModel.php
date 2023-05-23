<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monanModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    const UPDATED_AT = null;
    public $timestamps = false;
    protected $table ='monan';
    protected $filltable =['id', 'idLoaiMonAn', 'idGia', 'tenMonAn', 'hinhAnh', 'moTa', 'created_by_user_id', 'created_date_time', 'lu_updated', 'lu_user_id', 'trangThai','soLuong' ];
    public function giaban(){
        return $this->belongsTo(giabanModel::class,'id','idGia');
    }
}
