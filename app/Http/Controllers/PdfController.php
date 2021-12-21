<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use PDF;
use DB;

class PdfController extends Controller
{
    public function studentListPdf(Request $request)
    {
        $all_student= DB::table('students')
        ->get();

        $pdf = PDF::loadView('admin.studentListPdfView', compact('all_student'));
        return $pdf->download('studentlist.pdf');
    }


    public function allStudentPdf()
    {
        $students= DB::table('students')
        ->get();
    }
}
