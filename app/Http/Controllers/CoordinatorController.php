<?php

namespace App\Http\Controllers;

use App\Models\Coordinator;
use App\Models\Degree;
use App\Models\Evaluation;
use App\Models\Faculty;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoordinatorController extends Controller
{
    public function nuevo()
    {
        $facultads = Faculty::all(['id', 'nombre']);
        return view('administrador.usuarios.coordinador.create')
            ->with(compact('facultads',$facultads));
    }

    public function ajaxTabla(Request $request){
        if($request->ajax()){
            $facultad = $request->facultad;
            $coordinators = Coordinator::whereHas('degree', function($query) use ($facultad) {
                $query->where('facultad','=',$facultad);
            })->paginate(5);
            $datos = compact('coordinators',$coordinators);
            $vista = view('administrador.usuarios.coordinador.ajax.tabla', $datos)->render();
        }
        return response()->json(array('success' => true, 'html'=>$vista));
    }

    public function create(Request $request){
        $this->validate($request, [
            'licen' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ],[
            'licen.required' => 'Debe seleccionar una licenciatura',
            'nombre.required' => 'Debe seleccionar una facultad',
            'apellido.required' => 'Es necesario ingrasar el nombre',
            'email.required' => 'El cambo correo electrónico es obligatorio',
            'email.email' => 'Debe introducir un correo electrónico válido',
            'password.required' => 'Debe introducir una clave válida',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'La contraseña tiene que tener almenos 8 caracteres'
        ]);

        $Coordinator = new Coordinator();
        $Coordinator -> licenciatura = $request->licen;
        $Coordinator -> nombre = $request-> nombre;
        $Coordinator -> apellido = $request -> apellido;
        $Coordinator -> correo = $request -> email;
        $Coordinator -> password = bcrypt($request->password);
        $Coordinator -> save();

        return view('administrador.usuarios.coordinador.ajax.exito');
    }

    public function read(Request $request){
        $facultads = Faculty::all(['id', 'nombre']);
        $vista = view('administrador.usuarios.coordinador.read')->with('facultads',$facultads);
        if($request->ajax()){
            $facultad = $request->facultad;
            $coordinators = Coordinator::whereHas('degree', function($query) use ($facultad) {
                $query->where('facultad','=',$facultad);
            })->paginate(5);
            $datos = compact('coordinators',$coordinators);
            $vista = view('administrador.usuarios.coordinador.ajax.tabla', $datos)->render();
            return $vista;
        }
        return $vista;
    }

    public function edit(Coordinator $coordinator){
        $facultads = Faculty::all(['id','nombre']);
        $degrees = Degree::all(['id','nombre','facultad']);
        return view('administrador.usuarios.coordinador.edit',compact('coordinator'))
            ->with(compact('facultads',$facultads))
            ->with(compact('degrees',$degrees));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'licen' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ],[
            'licen.required' => 'Debe seleccionar una licenciatura',
            'nombre.required' => 'Debe seleccionar una facultad',
            'apellido.required' => 'Es necesario ingrasar el nombre',
            'usuario.required' => 'No se pudo encontrar la fase',
            'email.required' => 'El cambo semestre es obligatorio',
            'email.email' => 'Debe introducir un correo electrónico válido',
            'password.required' => 'Es necesario una contraseña',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'La contraseña tiene que tener almenos 8 caracteres'
        ]);

        $Coordinator = Coordinator::findOrFail($id);
        $Coordinator -> licenciatura = $request->licen;
        $Coordinator -> nombre = $request-> nombre;
        $Coordinator -> apellido = $request -> apellido;
        $Coordinator -> correo = $request -> email;
        $Coordinator -> password = bcrypt($request->password);

        $Coordinator -> save();

        return view('administrador.usuarios.coordinador.ajax.exito');
    }

    public function showDatos(){
        if (Auth::check())
        {
            $id  =  Auth::id();
            $coordinator = Coordinator::with('degree')->findOrFail($id);
            return view('coordinador.home',compact('coordinator'));
        }
    }

    public function destroy(Request $request){
        $post = Coordinator::findOrFail($request -> id);
        $post -> delete();
        return redirect()->route('viewcoordinador');
    }

    public function allSolicitudCoordinador(Request $request){
        $coordinador  =  Auth::id();
        $coordinator = (new \App\Models\Coordinator)->where('id','=',$coordinador)->first();
        $colecion = (new \App\Models\Request)->where('coordinador','=',$coordinador)->get();
        $materias =$colecion->unique('materia');
        $estados = $colecion->unique('estado');
        $solicituds = (new \App\Models\Request)->where('coordinador','=',$coordinador)->orderBy('fecha', 'asc')->paginate(5);
        $vista =  view('coordinador.historial')->with(compact('solicituds'))->with(compact('materias'))->with(compact
        ('estados'))->with(compact('coordinator'));
        if ($request->ajax()){
            $coordinador  =  Auth::id();
            $unidad = $request->unidad;
            $estado = $request->estado;
            if ($unidad === 0 && $estado === 0){
                $solicituds = (new \App\Models\Request)->where('coordinador','=',$coordinador)->orderBy('fecha', 'asc')->paginate(5);
            }elseif ($unidad != 0 && $estado != 0){
                $solicituds = (new \App\Models\Request)->where('coordinador','=',$coordinador)
                    ->where('materia','=',$unidad)
                    ->where('materia','=',$unidad)
                    ->orderBy('fecha', 'asc')->paginate(5);
            }elseif ($unidad != 0 && $estado == 0){
                $solicituds = (new \App\Models\Request)->where('coordinador','=',$coordinador)
                    ->where('materia','=',$unidad)
                    ->orderBy('fecha', 'asc')->paginate(5);
            }elseif ($unidad == 0 && $estado != 0){
                $solicituds = (new \App\Models\Request)->where('coordinador','=',$coordinador)
                    ->where('estado','=',$estado)
                    ->orderBy('fecha', 'asc')->paginate(5);
            }
            $vista = view('coordinador.ajax.tablahistorial')->with(compact('solicituds'))->render();
        }
        return $vista;
    }

    public function filtros(Request $request)
    {
        if ($request->ajax()) {
            $coordinator = Auth::id();
            $unidad = $request->unidad;
            $estado = $request->estado;
            if ($unidad === 0 && $estado === 0) {
                $solicituds = (new \App\Models\Request)->where('coordinador', '=', $coordinator)->orderBy('fecha', 'asc')->paginate(5);
            } elseif ($unidad != 0 && $estado != 0) {
                $solicituds = (new \App\Models\Request)->where('coordinador', '=', $coordinator)
                    ->where('materia', '=', $unidad)
                    ->where('estado', '=', $estado)
                    ->orderBy('fecha', 'asc')->paginate(5);
            } elseif ($unidad != 0 && $estado == 0) {
                $solicituds = (new \App\Models\Request)->where('coordinador', '=', $coordinator)
                    ->where('materia', '=', $unidad)
                    ->orderBy('fecha', 'asc')->paginate(5);
            } elseif ($unidad == 0 && $estado != 0) {
                $solicituds = (new \App\Models\Request)->where('coordinador', '=', $coordinator)
                    ->where('estado', '=', $estado)
                    ->orderBy('fecha', 'asc')->paginate(5);
            }
            $vista = view('coordinador.ajax.tablahistorial')->with(compact('solicituds'))->render();
        }
        return response()->json(array('success' => true, 'html' => $vista));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function evaluar(Request $request){
        $id = decrypt($request->id);
        $evaluada = (new \App\Models\Evaluation)->where('solicitud','=',$id)->exists();
        if ($evaluada){
            $evaluation = (new \App\Models\Evaluation)->where('solicitud','=',$id)->first();
        }

        $solicitud = (new \App\Models\Request)->where('id','=',$id)->first();
        return view('coordinador.solicitud')->with(compact('solicitud'))->with(compact('evaluada'))->with(compact('evaluation'));
    }


}
