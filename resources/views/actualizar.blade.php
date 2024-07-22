@extends('layouts.base')
@section('titulo')
Mofificar Información
@endsection
@section('contenido')
<section class="cont">
    <article class="lados"></article>
    <form action="{{route('update', ['id' => $incendio['id']])}}" method="post">
        @csrf
        <select name="town" class="form-select">
            <option value="{{$incendio['town']}}">{{$incendio['town']}}</option>
            @foreach ($ciudades as $ciudad)
            <option value="{{$ciudad}}">{{$ciudad}}</option>
            @endforeach
        </select>
        <input type="date" name="date" value="{{$incendio['date']}}" class="form-control">
        <input type="submit" value="Actualizar Información" class="btn btn-dark">
    </form>
    <article class="lados"></article>
</section>
@endsection
