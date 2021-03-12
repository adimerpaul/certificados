<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }
    public function cer($id){
//        if(password_verify('1234567', $id)) {
//            // in case if "$crypt_password_string" actually hides "1234567"
//        }
        $data=Participante::where('id',$id)->with('certificado')->get();
//        var_dump($data->);
//        echo $data->nombre;
//        return view('cer',compact($data));
        return view("cer", ["data"=>$data]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $data=Participante::find();
        return view('home');
    }
}
