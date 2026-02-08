<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $fillable = ['nomExp', 'prenomExp', 'telExp', 'specialiteExp', 'emailExp'];

    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }
}
