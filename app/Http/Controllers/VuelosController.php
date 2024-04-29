<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vuelo;

class VuelosController extends Controller
{
    public function inicio() {
        return view('inicio');
    }

    public function redirectToVuelos() {

        $Vuelos = Vuelo::all();

        return view('vuelos', compact('Vuelos'));
    }


    public function redirectToFormCrearVuelo() {
        return view('nuevoVuelo');
    }

    public function crearNuevoVuelo(Request $req) {
        $Vuelo = new Vuelo();

        $numeroVuelo = $req->input('numeroVuelo');
        $origen = $req->input('origen');
        $destino = $req->input('destino');
        $fecha = $req->input('fecha');
        $cantidad = $req->input('cantidad');

        if (Vuelo::find($numeroVuelo) != null) {
            return redirect()->route('vuelos.inicio');
        }

        if(Vuelo::find($numeroVuelo) == null || Vuelo::find($numeroVuelo)->fechasalida == $fecha) {
            $Vuelo->numeroVuelo = $numeroVuelo;
            $Vuelo->origen = $origen;
            $Vuelo->destino = $destino;
            $Vuelo->fechasalida = $fecha;
            $Vuelo->numeroAsientos = $cantidad;
            $Vuelo->save();
        }
        return redirect()->route('vuelos.inicio');
    }

    public function editarVuelo($id) {
        $vuelo = Vuelo::find($id);
        return view('editarVuelo', compact('vuelo'));
    }

    public function guardarVueloEditado(Request $req, $id) {
        $vuelo = Vuelo::find($id);

        $origen = $req->input('origen');
        $destino = $req->input('destino');

        $vuelo->origen = $origen;
        $vuelo->destino = $destino;
        $vuelo->save();

        return redirect()->route('vuelos.inicio');
    }

    public function eliminarVuelo($id) {
        $vuelo = Vuelo::find($id);
        $vuelo->delete();

        return redirect()->route('vuelos');
    }

    
}
