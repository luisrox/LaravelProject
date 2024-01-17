<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurso;
use App\Models\Curso;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\RedisCaster;

use function Termwind\render;

class CursoController extends Controller
{
    public function index(){
        $cursos = Curso::orderBy('id', 'desc')->paginate();

        return view('cursos/index', compact('cursos'));
    }

    public function create(){
        return view('cursos/create');
    }

    public function store(StoreCurso $request)
    {

/*         $curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;
        $curso->save(); */
        
/*         $curso = Curso::create([
            'name' => $request->name,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria
        ]); */

        $curso = Curso::create($request->all()); 
        return redirect()->route('cursos.show', $curso);
    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(Curso $curso, Request $request)
    {

        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required',
            'slug' => 'required|unique:cursos,slug,'.$curso->id
        ]);

/*         $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;
        $curso->save(); */

        $curso->update($request->all()); 
        return redirect()->route('cursos.show', $curso);
    }

    public function show(Curso $curso){
        return view('cursos/show', compact('curso'));
    }

    public function destroy(Curso $curso){
        $curso->delete();

        return redirect()->route('cursos.index');
    }
}
