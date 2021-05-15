<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;
use Illuminate\Support\Facades\DB;


class TodoController extends Controller
{
    public function index(Request $request){
        $items = todo::all();
        return view('todo.index',['items' => $items]);
    }
    public function create(Request $request)
    {
        $this->validate($request,todo::$rules);
        $todo = new todo;
        $form=$request->all();
        unset($form['_token_']);
        $todo->fill($form)->save();
        return redirect('/');
    }
    public function update(Request $request)
    {
        $this->validate($request, todo::$rules);
        $todo = todo::find($request->id);
        $form = $request->all();
        unset($form['_token_']);
        $todo->fill($form);
        $todo->save();
        return redirect('/');
    }
    public function delete(Request $request)
    {
        todo::find($request->id)->delete();
        return redirect('/');
    }

}
