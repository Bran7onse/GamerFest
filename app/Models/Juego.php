<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'juegos';

    protected $fillable = ['id_aul','id_cat','nombre_jue','imagen','precio_jue','descripcion_jue'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function aulas()
    {
        return $this->hasOne('App\Models\Aula', 'id', 'id_aul');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categorias()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'id_cat');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarios()
    {
        return $this->hasMany('App\Models\Horario', 'id_jue', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcionEquses()
    {
        return $this->hasMany('App\Models\InscripcionEqu', 'id_jue', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcionInds()
    {
        return $this->hasMany('App\Models\InscripcionInd', 'id_jue', 'id');
    }
    
}
