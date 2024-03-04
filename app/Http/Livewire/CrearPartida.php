<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Jugador;
use App\Models\Equipo;
use App\Models\Juego;
use Illuminate\Support\Facades\DB;
use App\Models\InscripcionEqu;
use PDF;
class CrearPartida extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_jue, $nombre_jug, $nombre_equ, $id_cat, $tipo_cat, $num_jug, $cedula_jug, $telefono_jug, $correo_jug, $descripcion_jug, $nombre_jue=null;
    
    public $updateMode = false;
    
    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $nombre_jue = $this->nombre_jue ;
        $juegos = Juego::all();
        // Construir la consulta SQL dinámicamente
        $sql = 'WITH RankedParticipants AS (
            SELECT
                CASE 
                    WHEN j.id_cat = "2" THEN ju.nombre_ind
                    WHEN j.id_cat = "1" THEN e.nombre_equ
                END AS participante,
                j.nombre_jue,
                j.id_cat,
                c.tipo_cat,
                j.num_jug,
                ROW_NUMBER() OVER (PARTITION BY j.id ORDER BY RAND()) AS RowNum
            FROM juegos j
            LEFT JOIN inscripcion__inds i ON j.id = i.id_jue
            LEFT JOIN inscripcion__equs g ON j.id = g.id_jue
            LEFT JOIN categorias c ON j.id_cat = c.id
            LEFT JOIN individuales ju ON i.id_ind = ju.id
            LEFT JOIN equipos e ON g.id_equ = e.id
            WHERE j.nombre_jue = "'.$nombre_jue.'"
        )
        SELECT
            GROUP_CONCAT(participante SEPARATOR "   vs   ") AS participantes,
            nombre_jue,
            id_cat,
            tipo_cat,
            num_jug
        FROM RankedParticipants
        GROUP BY id_cat, num_jug, (RowNum - 1) DIV num_jug';

    $crearPartida = DB::select($sql);

    return view('livewire.crear-partida.view', compact('crearPartida', 'juegos'));
    }
	
    public function viewPDF()
    {

        $nombre_jue = $_GET['nombre_jue'] ;
        // Construir la consulta SQL dinámicamente
        $sql = 'WITH RankedParticipants AS (
            SELECT
                CASE 
                    WHEN j.id_cat = "2" THEN ju.nombre_ind
                    WHEN j.id_cat = "1" THEN e.nombre_equ
                END AS participante,
                j.nombre_jue,
                j.id_cat,
                c.tipo_cat,
                j.num_jug,
                ROW_NUMBER() OVER (PARTITION BY j.id ORDER BY RAND()) AS RowNum
            FROM juegos j
            LEFT JOIN inscripcion__inds i ON j.id = i.id_jue
            LEFT JOIN inscripcion__equs g ON j.id = g.id_jue
            LEFT JOIN categorias c ON j.id_cat = c.id
            LEFT JOIN individuales ju ON i.id_ind = ju.id
            LEFT JOIN equipos e ON g.id_equ = e.id
            WHERE j.nombre_jue = "'.$nombre_jue.'"
        )
        SELECT
            GROUP_CONCAT(participante SEPARATOR "   vs   ") AS participantes,
            nombre_jue,
            id_cat,
            tipo_cat,
            num_jug
        FROM RankedParticipants
        GROUP BY id_cat, num_jug, (RowNum - 1) DIV 2';
        
        $crearPartida =DB::select($sql);
        
        $pdf = PDF::loadView('livewire.crear-partida.crearPartidaReporte', array('crearPartida'=> $crearPartida))->setPaper('a4','landscape');
        return $pdf->stream();
    }
    
    public function downloadPDF()
    {
        $nombre_jue = $_GET['nombre_jue'] ;
        $sql = 'WITH RankedParticipants AS (
            SELECT
                CASE 
                    WHEN j.id_cat = "2" THEN ju.nombre_ind
                    WHEN j.id_cat = "1" THEN e.nombre_equ
                END AS participante,
                j.nombre_jue,
                j.id_cat,
                c.tipo_cat,
                j.num_jug,
                ROW_NUMBER() OVER (PARTITION BY j.id ORDER BY RAND()) AS RowNum
            FROM juegos j
            LEFT JOIN inscripcion__inds i ON j.id = i.id_jue
            LEFT JOIN inscripcion__equs g ON j.id = g.id_jue
            LEFT JOIN categorias c ON j.id_cat = c.id
            LEFT JOIN individuales ju ON i.id_ind = ju.id
            LEFT JOIN equipos e ON g.id_equ = e.id
            WHERE j.nombre_jue = "'.$nombre_jue.'"
        )
        SELECT
            GROUP_CONCAT(participante SEPARATOR "   vs   ") AS participantes,
            nombre_jue,
            id_cat,
            tipo_cat,
            num_jug
        FROM RankedParticipants
        GROUP BY id_cat, num_jug, (RowNum - 1) DIV 2';
        $crearPartida =DB::select($sql);

        $pdf = PDF::loadView('livewire.crear-partida.crearPartidaReporte', array('crearPartida'=> $crearPartida))->setPaper('a4','landscape');
        return $pdf->download('Crear_Partida.pdf');
    }
}