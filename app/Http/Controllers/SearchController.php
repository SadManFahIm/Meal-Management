<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchNotice (Request $request){
        if($request->ajax())
        {
            $output="abcd";
            $notice=DB::table('notices')->where('n_title','like','%'. $request->search.'%')
            ->orWhere('n_id', 'like', '%'.$request->search.'%')
            ->get();

            if($notice)
            {
                foreach ($notice as $key => $notice) {
                $output.='<tr>'.
                '<td>'.$notice->n_id.'</td>'.
                '<td>'.$notice->n_title.'</td>'.
                '<td>'.$notice->n_description.'</td>'.
                '<td>'.$notice->n_type_id.'</td>'.
                '<td>'.$notice->n_added_by.'</td>'.
                '<td>'.$notice->n_image.'</td>'.
                '<td>'.$notice->timestamp.'</td>'.
                '</tr>';
                }
            return Response($output);
            }
        }
    }
}
