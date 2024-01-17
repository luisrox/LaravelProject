@extends('layouts.plantilla')

@section('title','Contáctanos ')

@section('content')
    <h1>Déjanos un mensaje</h1>

    <form action="{{route('contactanos.store')}}" method="POST">
        @csrf

        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{old('name')}}">
        </label>

        <br>

        @error('name')
            <br>
                <span>*{{$message}}</span>
            <br>
        @enderror

        <label>
            Correo:
            <br>
            <input type="text" name="correo" value="{{old('correo')}}">
        </label>

        <br>

        @error('correo')
        <br>
            <span>*{{$message}}</span>
        <br>
        @enderror


        <label>
            Mensaje:
            <br>
            <textarea name="mensaje", rows="4" value="{{old('mensaje')}}"></textarea>
        </label>

        <br>

        @error('mensaje')
        <br>
            <span>*{{$message}}</span>
        <br>
        @enderror

        <button type="submit">
            Enviar Mensaje
        </button>
    </form>

    @if (session('info'))

        <script>
            alert("{{session('info')}}")
        </script>
    @endif
@endsection()