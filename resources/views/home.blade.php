@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Todo') }}</h3>
                </div>
                <div class="card-header">
                    <a href="{{url('createtodo')}}"><button class="bt btn-primary">Add Todo</button></a>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todo_data as $todo)
                        <tr id="tid{{$todo->id}}">
                            <th scope="row">{{$todo->id}}</th>
                            <td>{{$todo->title}}</td>
                            <td>{{$todo->description}}</td>
                            <td>
                                <a href="javascript:void(0)" onclick="deleteTodo({{$todo->id}})"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection