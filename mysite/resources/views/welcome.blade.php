@extends('layouts.app')

@section('content')

<h2>Welcome</h2>
<br>
<br>
@section('content')
    <h1>Loja de Informatica</h1>
    <div class="intro">
        <img src="/img/loja.jpg" alt="loja/img">

        <a href="{{ route('produtos.index')}}">Ver Produtos</a>
    </div>
@endsection

