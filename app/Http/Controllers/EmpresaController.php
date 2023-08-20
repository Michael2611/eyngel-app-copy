<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function store(Request $request){

        $em_nombre = $request->get('em_nombre');
        $em_email = $request->get('em_email');
        $em_password = $request->get('em_password');
        $em_pais = $request->get('em_pais');
        $em_ciudad = $request->get('em_ciudad');

        $pass_by = bcrypt($em_password);

        $empresa = new Empresa();
        $empresa->em_nombre = $em_nombre;
        $empresa->em_email = $em_email;
        $empresa->em_password = $pass_by;
        $empresa->em_pais = $em_pais;
        $empresa->em_ciudad = $em_ciudad;

        $empresa->save();

        return redirect("/");

    }
}
