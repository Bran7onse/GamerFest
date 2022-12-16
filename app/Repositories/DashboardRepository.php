<?php

namespace App\Repositories;


use App\Models\Categoria;
use App\Models\Horario;
use App\Models\Juego;
use App\Models\InscripcionInd;
use App\Models\InscripcionEqu;
use App\Models\PartidaInd;
use App\Models\PartidaEqu;
use App\Models\User;
use Carbon\Carbon;

/**
 * Class DashboardRepository
 * @package App\Repositories
 * @version July 26, 2021, 12:17 pm UTC
 */

class DashboardRepository
{
    
    /** @var  CategoriaRepository */
    private $categoriaRepository;
    /**
     * /** @var  HorarioRepository */
    private $horarioRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    private function getDashboardInfo()
    {
        $dashboardInfo = [];
        
        $dashboardInfo['cat_count'] =  Categoria::get()->count();
        
        return $dashboardInfo;
    }

    private function getChartCategoriaInfo()
    {
        $labels = [];
        $dataset1 = [];
        $dataset1['label'] = 'Categoria';
        $dataset1['data'] = [];
        

        $data = Categoria::get(['id', 'tipo_cat','num_jug_cat']);
        foreach ($data as $key => $value) {
            $dataset1['backgroundColor'][$key] = 'rgba(' . rand(1, 255) . ',' . rand(1, 255) . ',' . rand(1, 255) . ',' .rand(1,8).')';
            $dataset1['data'][$key] = $value->num_jug_cat;
            $labels[$key] = $value->tipo_cat;
        }

        
        $datasets = [];
        $datasets[] = $dataset1;

        $data = [];
        $data['labels'] = array_values($labels);
        $data['datasets'] = $datasets;

        $chart = [];
        $chart['type'] = 'bar';
        $chart['data'] = $data;
        return $chart;
    }
    private function getChartInscripcionesInfo()
    {
        $labels = [];
        $dataset1 = [];
        $dataset1['label'] = ['Inscripciones individuales','Inscripciones Equipos'];
        $dataset1['data'] = [];
        $dataset1['borderColor'] = ['rgb(20, 150, 192, 0.3)','rgb(20, 150, 192, 0.3)'];
        $dataset1['borderWidht'] = ['2','2'];

        $data = InscripcionInd::get()->count();
        $data2 = InscripcionEqu::get()->count();
            $dataset1['backgroundColor']= ['rgb(20, 50, 92, 0.3)','rgb(20, 150, 192, 0.3)'];
            array_push($dataset1['data'] ,$data);
            array_push($dataset1['data'] ,$data2);
            array_push($labels ,'Inscripcion Individual');
            array_push($labels ,'Inscripciones Equipos');
    

        $datasets = [];
        $datasets[] = $dataset1;

        $data = [];
        $data['labels'] = array_values($labels);
        $data['datasets'] = $datasets;

        $chart = [];
        $chart['type'] = 'pie';
        $chart['data'] = $data;
        return $chart;
    }
    private function getChartPartidasInfo()
    {
        $labels = [];
        $dataset1 = [];
        $dataset1['label'] = ['Partidas individuales','Partidas en Equipos'];
        $dataset1['data'] = [];
        $dataset1['borderColor'] = ['rgb(20, 150, 192, 0.3)','rgb(20, 150, 192, 0.3)'];
        $dataset1['borderWidht'] = ['2','2'];

        $data = PartidaInd::get()->count();
        $data2 = PartidaEqu::get()->count();
            $dataset1['backgroundColor']= ['rgb(10, 234, 100, 0.1)','rgb(30, 10, 225, 0.4)'];
            array_push($dataset1['data'] ,$data);
            array_push($dataset1['data'] ,$data2);
            array_push($labels ,'Partida Individual');
            array_push($labels ,'Partida Equipos');
    

        $datasets = [];
        $datasets[] = $dataset1;

        $data = [];
        $data['labels'] = array_values($labels);
        $data['datasets'] = $datasets;

        $chart = [];
        $chart['type'] = 'doughnut';
        $chart['data'] = $data;
        return $chart;
    }
    private function getChartPreciosInscripcionInfo()
    {
        $labels = [];
        $dataset1 = [];
        $dataset1['label'] = ['Inscripciones individuales','Inscripciones en Equipos'];
        $dataset1['data'] = [];
        $dataset1['borderColor'] = ['rgb(5, 180, 122, 0.1)','rgb(20, 150, 192, 0.3)'];
        $dataset1['borderWidht'] = ['2','2'];

        $data = InscripcionInd::sum('precio_ins');
        $data2 = InscripcionEqu::sum('precio_ins_equ');
            $dataset1['backgroundColor']= ['rgb(50, 93, 100, 0.9)','rgb(80, 10, 25, 0.4)'];
            array_push($dataset1['data'] ,$data);
            array_push($dataset1['data'] ,$data2);
            array_push($labels ,'Inscripcion Individual');
            array_push($labels ,'Inscripcion Equipos');
    

        $datasets = [];
        $datasets[] = $dataset1;

        $data = [];
        $data['labels'] = array_values($labels);
        $data['datasets'] = $datasets;

        $chart = [];
        $chart['type'] = 'pie';
        $chart['data'] = $data;
        return $chart;
    }
    private function getChartJuegosInfo()
    {
        $labels = [];
        $dataset1 = [];
        $dataset1['label'] = ['Inscripciones individuales','Inscripciones en Equipos'];
        $dataset1['data'] = [];
        $dataset1['borderColor'] = ['rgb(5, 180, 122, 0.1)','rgb(20, 150, 192, 0.3)'];
        $dataset1['borderWidht'] = ['2','2'];

        $labels = [];
        $dataset1 = [];
        $dataset1['label'] = 'Precios Juegos';
        $dataset1['data'] = [];
        

        $data = Juego::get(['id', 'nombre_jue','precio_jue']);
        foreach ($data as $key => $value) {
            $dataset1['backgroundColor'][$key] = 'rgba(' . rand(1, 255) . ',' . rand(1, 255) . ',' . rand(1, 255) . ',' .rand(1,8).')';
            $dataset1['data'][$key] = $value->precio_jue;
            $labels[$key] = $value->nombre_jue;
        }

        
        $datasets = [];
        $datasets[] = $dataset1;

        $data = [];
        $data['labels'] = array_values($labels);
        $data['datasets'] = $datasets;

        $chart = [];
        $chart['type'] = 'bar';
        $chart['data'] = $data;
        return $chart;
    }

    public function getCharInscipcionJuego()
     {
        $labels = [];
        $dataset1 = [];
        $dataset1['label'] = [];
        $dataset1['data'] = [];
        $dataset1['borderColor'] = ['rgb(5, 180, 122, 0.1)','rgb(20, 150, 192, 0.3)'];
        $dataset1['borderWidht'] = ['2','2'];

        $labels = [];
        $dataset1 = [];
        $dataset1['label'] = 'Precios Juegos';
        $dataset1['data'] = [];
        

        $data = InscripcionInd :: select('id_jue', InscripcionInd::raw('count(*) as total'))
    ->groupBy('id_jue')
    ->get();
        foreach ($data as $key => $value) {
            $dataset1['backgroundColor'][$key] = 'rgba(' . rand(1, 255) . ',' . rand(1, 255) . ',' . rand(1, 255) . ',' .rand(1,8).')';
            $dataset1['data'][$key] = $value->total;
            $labels[$key] = $value->id_jue;
        }
    

    $datasets = [];
        $datasets[] = $dataset1;

        $data = [];
        $data['labels'] = array_values($labels);
        $data['datasets'] = $datasets;

        $chart = [];
        $chart['type'] = 'bar';
        $chart['data'] = $data;
        return $chart;
     }
    public function ObtenerData()
    {
        $dashboard = [];
        $dashboard['dashboardInfo'] = $this->getDashboardInfo();
        $dashboard['chartCategoria'] = $this->getChartCategoriaInfo();
        $dashboard['chartInscripcion'] = $this->getChartInscripcionesInfo();
        $dashboard['chartPartida'] = $this->getChartPartidasInfo();
        $dashboard['chartPrecios'] = $this->getChartPreciosInscripcionInfo();
        $dashboard['chartJuegos'] = $this->getChartJuegosInfo();
        $dashboard['charInscipcionJuego'] = $this->getCharInscipcionJuego();
        return $dashboard;
    }
}
