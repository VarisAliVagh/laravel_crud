<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = "new_users";
    protected $primaryKey = "id";

    public function setFirstNameAttribute($value)
    {
        $this -> attributes['first_name'] = ucwords($value);
    }
    public function getDobAttribute($value)
    {
        if(!empty(date($value))){
            return date('d-M-Y',strtotime($value));
        }
    }
}
