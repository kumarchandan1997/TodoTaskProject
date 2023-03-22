<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;
use Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todo_data = DB::table('todos')->where('user_id',Auth::user()->id)->get();
        return view('home',compact('todo_data'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required|min:3|max:1000',
            ]
        );
        $todo= new Todo();
        $todo->title = $request->title;
        $todo->description= $request->description;
        $todo->user_id= Auth::user()->id;
        $todo->save();
            
       return redirect('/home') ->with('success','Todo record has been Created');
    }
    public function create()
    {
        return view('todo');
    }
        
    public function deleteTodo($id)
    {
        $todo= Todo::find($id);
        $todo->delete();
        return response()->json(['success'=>'Record has been deleted']);
    }
    
}