<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PDF;

class ProyectosController extends Controller
{
    // ...
    public function index(): Renderable
    {
        $proyecto = Proyectos::paginate();
        return view('proyectos.index', compact('proyecto'));
    }

    public function create(): Renderable
    {
        $proyecto = new Proyectos;
        $title = __('Crear proyecto');
        $action = route('proyectos.store');
        $buttonText = __('Crear proyecto');
        return view('proyectos.form', compact('proyecto', 'title', 'action', 'buttonText'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'NombreProyecto' => 'required|unique:proyectos,NombreProyecto|string|max:100',
            'fuenteFondos' => 'required|string|max:100',
            'MontoPlanificado' => 'required|decimal:2',
            'MontoPatrocinado' => 'required|decimal:2',
            'MontoFondosPropios' => 'required|decimal:2'
        ]);
        Proyectos::create([
            'NombreProyecto' => $request->string('NombreProyecto'),
            'fuenteFondos' => $request->string('fuenteFondos'),
            'MontoPlanificado' => $request->input('MontoPlanificado'),
            'MontoPatrocinado' => $request->input('MontoPatrocinado'),
            'MontoFondosPropios' => $request->input('MontoFondosPropios'),
        ]);
        return redirect()->route('proyectos.index');
    }

    public function imprimir()
    {
        $title = __('Crear proyecto');
        $proyecto = Proyectos::paginate();
        
        $pdf = PDF::loadView('proyectos.imprimir', compact( 'proyecto'));
        return $pdf->stream('reporteProyecto.pdf');
    }

    public function edit(Proyectos $proyecto): Renderable
    {
        $title = __('Editar proyecto');
        $action = route('proyectos.update', $proyecto);
        $buttonText = __('Actualizar proyecto');
        $method = 'PUT';
        return view('proyectos.form', compact('proyecto', 'title', 'action', 'buttonText', 'method'));
    }

    public function update(Request $request, Proyectos $proyecto): RedirectResponse
    {
        $request->validate([
            'NombreProyecto' => 'required|unique:proyectos,NombreProyecto,' . $proyecto->id . '|string|max:100',
            'fuenteFondos' => 'required|string|max:100',
            'MontoPlanificado' => 'required|decimal:2',
            'MontoPatrocinado' => 'required|decimal:2',
            'MontoFondosPropios' => 'required|decimal:2'
        ]);
        $proyecto->update([
            'NombreProyecto' => $request->string('NombreProyecto'),
            'fuenteFondos' => $request->string('fuenteFondos'),
            'MontoPlanificado' => $request->input('MontoPlanificado'),
            'MontoPatrocinado' => $request->input('MontoPatrocinado'),
            'MontoFondosPropios' => $request->input('MontoFondosPropios'),
        ]);
        return redirect()->route('proyectos.index');
    }

    public function destroy(Proyectos $proyecto): RedirectResponse
    {
        $proyecto->delete();
        return redirect()->route('proyectos.index');
    }
}