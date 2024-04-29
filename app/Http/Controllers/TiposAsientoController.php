<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\TipoAsiento;
use App\Models\VuelosAsiento;
use Illuminate\Http\Request;
use App\Models\vuelo;

class TiposAsientoController extends Controller
{
    public function inicioTiposAsientos() {
        $tiposAsientosCreados = TipoAsiento::all();
        return view('tiposAsientos', compact('tiposAsientosCreados'));
    }

    public function redirectToTiposAsientosAgregar() {
        return view('agregarTipoAsiento');
    }

    public function guardarTipoAsiento(Request $req) {

        $TipoAsiento = new TipoAsiento();

        $descripcion = $req->input('descripcion');
        $precio = $req->input('precio');
        $estado = $req->input('estado');

        $TipoAsiento->descripcion = $descripcion;
        $TipoAsiento->precio = $precio;
        $TipoAsiento->estado = $estado;

        $TipoAsiento->save();

        return redirect()->route('tipos.asientos.inicio');
    }

    public function editarTipoAsiento($id) {
        $tipoAsiento = TipoAsiento::find($id);

        return view('editarAsiento', compact('tipoAsiento'));
    }

    public function eliminarTipoAsiento($id) {
        $TipoAsiento = TipoAsiento::where('idTipoAsiento', $id)->first();
        $TipoAsiento->estado = 'I';
        $TipoAsiento->save();
        return redirect()->route('tipos.asientos.inicio');
    }

    public function guardarTipoAsientoEditado(Request $req, $id) {
        $descripcion = $req->input('descripcion');
        $precio = $req->input('precio');
        $estado = $req->input('estado');

        $TipoAsiento = TipoAsiento::find($id);
        $TipoAsiento->precio = $precio;
        $TipoAsiento->descripcion = $descripcion;
        $TipoAsiento->estado = $estado;

        $TipoAsiento->save();
        return redirect()->route('tipos.asientos.inicio');
    }

    public function guardarAsiento(Request $req) {
        $tipoAsiento = new VuelosAsiento();
        $numeroVuelo = $req->input('numeroVuelo');
        $fechaSalida = $req->input('fecha');
        $numeroAsiento = $req->input('numeroAsiento');
        $idAsiento = $req->input('numeroAsiento');
        
        $tipoAsiento->numeroVuelo = $numeroVuelo;
        $tipoAsiento->idTipoAsiento = $idAsiento;
        $tipoAsiento->numeroAsiento = $numeroAsiento;
        $tipoAsiento->save();

        return redirect()->route('vuelos');

    }

    public function agregarAsiento($idVuelo) {
        $vuelo = Vuelo::find($idVuelo);
        return view('agregarAsiento', compact('vuelo'));
    }

    public function verAsientosVuelos($idVuelo) {
        $vuelo = Vuelo::find($idVuelo);
        $asientos = json_decode(DB::table('vuelosasientos')->where('numeroVuelo', $idVuelo)->get());
        return view('vueloAsientos', compact('vuelo', 'asientos'));
    }
}
