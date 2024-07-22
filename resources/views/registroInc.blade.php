@extends('layouts.base')
@section('titulo')
Registro De Usuario
@endsection
@section('contenido')
<section class="cont">
    <article class="lados"></article>
    <form action="{{route('newFire')}}" method="post">
        @csrf
        <select name="town" class="form-select">
            @foreach ($ciudades as $ciudad)
            <option value="{{$ciudad}}">{{$ciudad}}</option>
            @endforeach
        </select>
        <input type="date" name="date" placeholder="Ingrese La Fecha Del Incendio" class="form-control">
        <input type="submit" value="Crear Registro" class="btn btn-dark">
    </form>
    <article class="lados"></article>
</section>
@endsection
