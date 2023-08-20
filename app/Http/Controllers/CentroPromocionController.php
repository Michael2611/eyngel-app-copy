<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CentroPromocionController extends Controller
{
    public function index()
    {

        $eyngel_id = $_GET['eyngel_id'];
        if (Auth::user()->id == $eyngel_id) {
            $user_eyngel_id = DB::table('users')
                ->select('pu_file','pu_id','pu_extension')
                ->join('post_user', 'users.id', '=', 'post_user.pu_id_user')
                ->where('id', $eyngel_id)
                ->where(function($query){
                    $query->where('pu_extension', 'mp4')
                    ->orWhere('pu_extension', 'jpg')
                    ->orWhere('pu_extension', 'png')
                    ->orWhere('pu_extension', 'webp')
                    ->orWhere('pu_extension', 'jpeg');
                })
                ->get();
            return view('promocionar.index', compact('user_eyngel_id'));
        } else {
            return redirect('/');
        }
    }
}
