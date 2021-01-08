<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard(){
        $contacts = DB::table('contacts')->count();
        $companies = DB::table('companies')->count();
        $schedules = DB::table('schedules')->count();
        $responsibles = DB::table('responsibles')->count();
        
        return view('admin.dash',[
            'contacts'=>$contacts,
            'companies'=>$companies,
            'schedules'=>$schedules,
            'responsibles'=>$responsibles,
            ]);

        return view('admin.dash');
    }

    public function perfil(){
        return view('admin.user.perfil');
    }
}
