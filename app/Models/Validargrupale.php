<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validargrupale extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'validargrupales';

    protected $fillable = ['id_inscripcion__equs','validarpago'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function inscripcionEqu()
    {
        return $this->hasOne('App\Models\InscripcionEqu', 'id', 'id_inscripcion__equs');
    }
    
}
