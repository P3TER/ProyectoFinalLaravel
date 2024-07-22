@extends('layouts.base')
@section('titulo')
Iniciar Sesión
@endsection
@section('contenido')
<section class="cont">
    <article class="lados"></article>
    <form action="{{route('login')}}" method="post">
        @csrf
        <input type="text" placeholder="Ingrese El Nombre De Usuario" name="user" class="form-control">
        <input type="text" placeholder="Ingrese Su Contraseña" name="pass" class="form-control">
        <input type="submit" value="Ingresar" class="btn btn-dark">
    </form>
    <article class="lados"></article>
</section>
@endsection
