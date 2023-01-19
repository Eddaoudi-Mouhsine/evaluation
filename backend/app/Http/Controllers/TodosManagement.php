<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosManagement extends Controller
{
    //
    public function index()
    {
        $todo = Todo::all();
        return response()->json($todo);
    }
    public function show($id)
    {
        $todo = Todo::where('id', $id)->get();
        return response()->json($todo);
    }
    public function addTodos(Request $req)
    {
        $todo = new Todo();
        $todo->name = $req->input("name");
        $todo->save();
        return response()->json($todo);
    }
    public function todoEdit(Request $req, $id)
    {
        $todo = (Todo::where('id', $id)->get())[0];
        $todo->name = $req->input('name');
        $todo->save();
        return response()->json($todo);
    }
    public function todoDelete($id)
    {
        $todo = Todo::where('id', $id)->first();
        $todo->delete();
        return response()->json($todo);
    }
    public function filter($input)
    {

        $data = Todo::whereRaw("
            (
               name like '%$input%'
           
           )
       ")->get();
        return response()->json($data);
    }
    public function showTest($id)
    {
        $todo = Todo::where('id', $id)->first();
        $todo->status = "going";
        $todo->save();
        return response()->json($todo);
    }
    public function showUndoneTest($id)
    {

        $todo = Todo::where('id', $id)->first();
        $todo->status = "done";
        $todo->save();
        return response()->json($todo);
    }
    public function deleteTest($id)
    {
        $todo = Todo::where('id', $id)->first();
        $todo->delete();
        $freshTodo = Todo::all();
        return response()->json($freshTodo);
    }
}
