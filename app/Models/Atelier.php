<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atelier extends Model
{
    protected $fillable = ['nomAtelier', 'descriptionAtelier', 'evenement_id'];

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}
