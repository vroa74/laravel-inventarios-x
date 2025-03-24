<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;  // import dompdf
use App\Models\Co;
use App\Models\Ncor;
use App\Models\Tcor;
use App\Models\Ccor;


class ReportsController extends Controller
{
    public function rg_report_1($id, $tipoReporte){
         $registro = Co::find($id);
         $filename = "file_".$registro->id."_".$registro->ncor."pdf";
//        return view('reports.report1', compact('registro', 'tipoReporte'));
        $pdf = Pdf::loadView('reports.report1', compact('registro', 'tipoReporte'));
        return $pdf->stream($filename);

        //        dd($id,$tipoReporte, $registro);
//         $pdf = PDF::loadHTML('hola esta es la pagina de inicio de impresion');
//         return $pdf->stream('reports.pdf'); //ver el archivo en linea

    }

    public function rg_report_2(){

    }

    public function rg_report_3(){

    }

    public function user_report(){

    }

}
