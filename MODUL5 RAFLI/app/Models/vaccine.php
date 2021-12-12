<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $table = 'vaccines';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'id', 'name', 'price', 'description', 'image'
    ];
    
    public function order()
    {
        return $this->hasMany('App\Models\Patient');
    }

}
