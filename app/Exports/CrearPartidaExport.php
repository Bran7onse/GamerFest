<?php

namespace App\Exports;

use App\Models\Equipo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\Sheet;
class CrearPartidaExport implements FromView,WithEvents
{
    public $nombre_jue=null,$sheet;
    public function view(): View
    {
        $nombre_jue = $_GET['nombre_jue'] ;
        $sql = 'WITH RankedParticipants AS (
                SELECT
                    CASE 
                        WHEN j.id_cat = "2" THEN ju.nombre_jug
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
                LEFT JOIN jugadors ju ON i.id_ind = ju.id
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

        $crearPartida = DB::select($sql);

        return view('livewire.crear-partida.crearPartidaReporte', compact('crearPartida'));
    
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                
                
                $styleHeader = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => 'thin',
                            'color' => ['rgb' => '808080']
                        ],
                    ]
                ];
        $event->sheet->getStyle("A1:F50")->applyFromArray($styleHeader);
            }
        ];
    }
}