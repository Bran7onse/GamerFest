<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscripcionInd extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'inscripcion__inds';

    protected $fillable = ['id_ind','id_jue','precio_ins','pago_ins'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function juegos()
    {
        return $this->hasOne('App\Models\Juego', 'id', 'id_jue');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function individuales()
    {
        return $this->hasOne('App\Models\Individuale', 'id', 'id_ind');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partidaInds()
    {
        return $this->hasMany('App\Models\PartidaInd', 'id_jug2', 'id');
    }
    
    
}
