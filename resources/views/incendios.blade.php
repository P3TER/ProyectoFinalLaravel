@extends('layouts.base')
@section('titulo')
Página De Inicio
@endsection
@section('contenido')
<section  class="cont">
    <article class="ladosTab"></article>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Departamento</th>
                <th>Ciudad</th>
                <th>Fecha</th>
                <th>Reportado Por:</th>
                <th>Modificar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incendios as $incendio)
            <tr>
                <td>{{$incendio->department}}</td>
                <td>{{$incendio->town}}</td>
                <td>{{$incendio->date}}</td>
                <td>{{ App\Models\User::find($incendio->user_id)->user }}</td>
                {{-- No pude agregar el nombre a la tabla de otra manera que no fuese llamando directamente a todo el modelo --}}
                <td>
                    @if ($incendio->user_id == Session::get('id'))
                    <a href="{{route('update', ['id'=>$incendio->id])}}">Modificar</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <article class="ladosTab"></article>
</section>

@endsection
