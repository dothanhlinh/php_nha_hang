<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    const UPDATED_AT = null;
    public $timestamps = false;
    protected $table ='ban';
    protected $filltable =['tenBan', 'size', 'moTa', 'trangThai', 'created_by_user_id', 'created_date_time', 'lu_updated', 'lu_user_id'];

}
