<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Equipments;

class brand_model extends Model
{
    use HasFactory;

    protected $table = 'brand_model';

    public function equipments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this -> hasMany('App\Models\Equipments', 'brand_model_id','id');
    }

}
