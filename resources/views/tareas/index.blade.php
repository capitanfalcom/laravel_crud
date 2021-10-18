@extends('app')

@section('content')

    <div class="container border p-4">

        <h1>Tareas</h1>
        <br>

        <div class="mb-3">
            <form action="{{ route('tareas') }}" method="POST">
                @csrf

                @if (session('success'))
                    <h6 class="alert alert-success"> {{ session('success') }} </h6>
                @endif

                @error('title')
                    <h6 class="alert alert-danger"> {{ $message }} </h6>
                @enderror

                <div class="col">
                    <label for="title" class="form-label">Titulo Tarea</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>


            <div class="container">
                @foreach ( $todos as $todo )

                    <div class="row py-1">
                        <div class="col-md-9 d-flex aling-items-center">
                            <a href="{{ route('tareas-show', ['id' => $todo->id]) }}"> {{ $todo->title }}</a>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('tareas-destroy', [$todo->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm"> Eliminar </button>
                        </form>
                    </div>

                @endforeach
            </div>
        </div>

    </div>



@endsection
