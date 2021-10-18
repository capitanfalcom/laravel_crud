<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{

    // store para guardar tarea
    public function store( Request $request ){

        $request->validate([
            'title'=>'required|min:3'
        ]);
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('tareas')->with('success', 'tarea guardada correctamente');

    }

    // index para obtener todas las tareas
    public function index(){
        $todos = Todo::all();
        return view('tareas.index', ['todos' => $todos ]);
    }

    // show para obtener una tarea a editar
    public function show($id){
        $todo = Todo::find($id);
        return view('tareas.show', ['todo' => $todo ]);
    }

    // update para obtener todas las tareas
    public function update(Request $request, $id){
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->save();
        return redirect()->route('tareas')->with('success', 'tarea actualizada correctamente');
    }

    // destroy para obtener todas las tareas
    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('tareas')->with('success', 'tarea eliminada correctamente');
    }

}
