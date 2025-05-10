<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    protected $table = 'statut';
public $timestamps = false;

public function verger()
{
    return $this->belongsTo(Verger::class, 'refver');
}

}
