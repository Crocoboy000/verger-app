<?php

use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    protected $table = 'statut';  // The table name is statut
    protected $primaryKey = 'id'; // Assuming 'id' is the primary key
    public $incrementing = true;  // Assuming 'id' is auto-incrementing
    protected $fillable = [
        'refver', 'numver', 'dtver', 'codvar', 'nomvar',
        'pdrec', 'pdexp', 'pdeca', 'pdfre', 'login'
    ];
    public $timestamps = false;  // Set to false since you have no timestamps

    public function verger()
    {
        // Define the relationship between Statut and Verger (many to one)
        return $this->belongsTo(Verger::class, 'refver', 'refver');  // Ensure foreign key is correct
    }
}
