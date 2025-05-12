<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verger extends Model
{
protected $table = 'verger';
protected $primaryKey = 'refver';
protected $keyType = 'string';
public $incrementing = false;
public $timestamps = false;
protected $fillable = ['refver','nomver'];

public function users()
{
    return $this->belongsToMany(User::class, 'user_verger', 'refver', 'iduser');
}

public function statuts()
{
    return $this->hasMany(Statut::class, 'refver', 'refver');
}

}
