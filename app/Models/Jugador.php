<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'jugadors';

    protected $fillable = ['id_equ','nombre_jug','cedula_jug','telefono_jug','correo_jug','descripcion_jug'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipos()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'id_equ');
    }
    
    /** */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    //public function inscripcionInds()
    //{
       // return $this->hasMany('App\Models\InscripcionInd', 'id_jug', 'id');
    //}
    
}
