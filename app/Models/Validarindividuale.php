<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validarindividuale extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'validarindividuales';

    protected $fillable = ['id_inscripcion__inds','validarpago'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function inscripcionInd()
    {
        return $this->hasOne('App\Models\InscripcionInd', 'id', 'id_inscripcion__inds');
    }
    
}
