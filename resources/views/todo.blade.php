<!-- @extends('layouts.app') -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif
        <div class="col-md-8">
            <form action="{{route('todo.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Title</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="title" placeholder="Title">
                    <span class="text-danger">
                        @error('title')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description"
                        rows="3"></textarea>
                    <span class="text-danger">
                        @error('description')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>




@endsection