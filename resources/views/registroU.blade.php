@extends('layouts.base')
@section('titulo')
Registro De Usuario
@endsection
@section('contenido')
<section class="cont">
    <article class="lados"></article>
    <form action="{{route('newUser')}}" method="post" class="">
        @csrf
        <input type="text" placeholder="Digite Un Nombre De Usuario" name="user" class="form-control" required>
        <select name="department" class="form-select">
            @foreach ($departments as $department)
            <option value="{{$department}}">{{$department}}</option>
            @endforeach
        </select>
        <input type="text" name="pass" placeholder="Digite Una Contraseña" class="form-control" required>
        <input type="submit" value="Crear Usuario" class="btn btn-dark">
    </form>
    <article class="lados"></article>
</section>
@endsection
