<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'model_name',
        'description',
        'color',
        'price',
        'horsepower',
        'manufacturer_id',
        'owner_id'
    ];


    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }



}
