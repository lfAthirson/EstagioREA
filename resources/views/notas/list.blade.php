@extends('layouts.app')
@section('content')
<p class=" nav-link h1 text-center">Notas</p>

  <!-- EXIBE MENSAGENS DE SUCESSO -->
  @if(\Session::has('success'))
  <div class="container">
      <div class="alert alert-success">
        {{\Session::get('success')}}
      </div>
    </div>
  @endif

  <!-- EXIBE MENSAGENS DE ERROS -->
  @if ($errors->any())
  <div class="container nav-link ">
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
  @endif

<div class="container ">
@foreach($notas as $n)
  <br>
  <div class="row">
    <div class="col-md-12">
    <hr>
     <h2 class="h3 nav-link "><a class="as" href="/notas/{{$n->id}}">{{$n->title}}</a></h2>
     <p class="h5 nav-link ">Data: <b>{{\Carbon\Carbon::parse($n->scheduledto)->format('d/m/Y')}}</b></p>
     <p class="h5 nav-link ">Horas cumpridas: <b>{{\Carbon\Carbon::parse($n->hour)->format('h:m')}} horas</b></p>
<br>
      @auth
          <a class="btn ab" href="/notas/{{$n->id}}">Sobre</a>
          <a class="btn ab" href="/notas/{{$n->id}}/edit">Editar</a> 
          <a class="btn ab" href="/notas/{{$n->id}}/delete">Apagar</a>
      @endauth
    </div>
  </div>
  <br>
@endforeach
</div>

{{ $notas->links() }}

@auth

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <p class="text-center">
      <a class="btn ab" href="/notas/create">Criar Nota</a></p>
    </div>
</div>
</div>
@endauth

@endsection