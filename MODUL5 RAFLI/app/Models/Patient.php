<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $with = ['vaccine'];
    protected $table = 'patients';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'id', 'vaccine_id', 'name',  'nik', 'alamat', 'image_ktp', 'no_hp'
    ];

    public function vaccine(){
       return $this->belongsTo('App\Models\Vaccine');
    }
}
