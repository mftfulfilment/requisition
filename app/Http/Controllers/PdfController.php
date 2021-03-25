<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function test()
    {
        $form = Form::first();
        //return $form;
        $pdf = PDF::loadView('pdf.test', $form);
       return $pdf->stream('invoice.pdf');
    }
}
