<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individuale extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'individuales';

    protected $fillable = ['nombre_ind','cedula_ind','telefono_ind','correo_ind','descripcion_ind'];

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcionInds()
    {
        return $this->hasMany('App\Models\InscripcionInd', 'id_jug', 'id');
    }
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     public function partidaInds()
{
    return $this->hasMany('App\Models\PartidaInd', 'id_jug2', 'id');
}

}

