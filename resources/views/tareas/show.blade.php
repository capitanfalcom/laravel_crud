@extends('app')

@section('content')

    <div class="container border p-4">

        <h1>Tareas</h1>
        <br>

        <div class="mb-3">
            <form action="{{ route('tareas-update', ['id' => $todo->id]) }}" method="POST">
                @method('PATCH')
                @csrf

                @if (session('success'))
                    <h6 class="alert alert-success"> {{ session('success') }} </h6>
                @endif

                @error('title')
                    <h6 class="alert alert-danger"> {{ $message }} </h6>
                @enderror

                <div class="col-10">
                    <label for="title" class="form-label">Titulo de Tarea</label>
                    <input type="text" name="title" class="form-control" value="{{ $todo->title }}">
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>

        </div>

    </div>



@endsection
