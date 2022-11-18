<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function generatePDF(Estudio $estudio)
    {
        $users = User::get();
  
        $data = [
            'title' => $estudio->nombre,
            'date' => date('m/d/Y'),
            'users' => $users,
            'estudio' => $estudio
        ]; 
            
        $pdf = PDF::loadView('pdf/myPDF', $data);
     
        return $pdf->stream('resultados.pdf');
    }
}
