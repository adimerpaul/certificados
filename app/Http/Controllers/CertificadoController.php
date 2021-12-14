<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use App\Models\Detalle;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Certificado::with('detalle')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d=new Certificado();
        $d->nombre=$request->nombre;
        $d->url=$request->url;
        $d->descripcion=$request->descripcion;
        $d->fecha=$request->fecha;
        $d->user_id=Auth::user()->id;
        $d->save();
        foreach ($request->detalle as $detalle){
            $de=new Detalle();
            $de->descripcion=$detalle['descripcion'];
            $de->icono=$detalle['icono'];
            $de->certificado_id=$d->id;
            $de->save();
        }

        return $d;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $pdf = app('dompdf.wrapper');
//        $pdf->loadHTML('
//        <h1>ceritificado</h1>
//        <img src="cer.png" alt="Logo" height="75px">
//            ');
        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->stream();
//        return $pdf->download('Certificados.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $d=Certificado::find($id);
        $d->nombre=$request->nombre;
        $d->descripcion=$request->descripcion;
        $d->fecha=$request->fecha;
        $d->user_id=Auth::user()->id;
        $d->save();
        Detalle::where('certificado_id',$id)->delete();
        foreach ($request->detalle as $detalle){
            $de=new Detalle();
            $de->descripcion=$detalle['descripcion'];
            $de->icono=$detalle['icono'];
            $de->certificado_id=$d->id;
            $de->save();
        }
        return $d;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d=Certificado::find($id);
        $d->delete();
    }
}
