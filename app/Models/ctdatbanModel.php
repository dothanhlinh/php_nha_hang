<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ctdatbanModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    const UPDATED_AT = null;
    public $timestamps = false;
    protected $table ='chitietdatban';
    protected $filltable =['id', 'idLoaiMonAn', 'idDatBan', 'tenMonAn', 'hinhAnh', 'giaBan', 'soLuong', 'trangThai', 'created_by_user_id', 'created_date_time', 'lu_updated', 'lu_user_id' ];

    public function monan_(){
        return $this->belongsTo(monanModel::class,'id','idLoaiMonAn');
    }
    public static function thongkedoanhthu()
    {
        return self::sum(ctdatbanModel::raw('soLuong * 	idDatBan'));
    }
}
