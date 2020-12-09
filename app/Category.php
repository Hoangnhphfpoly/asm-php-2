<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['cate_name','slug','show_menu','desc','created_by'];

    public function getCreatedBy(){
        return $this->hasOne(User::class,'id','created_by');
    }
}
