@extends('layouts.app')
@section('content')
    <h1>Loja de Informatica - Produtos</h1>


    <div class="listaTipos">
        @if (!isset($actTipo))
            <b>
        @endif
        <a href="{{ route('produtos.index') }}">Todos os produtos</a>
        @if (!isset($actTipo))
            </b>
        @endif
        @foreach ($tipos as $tipo)
            @if (isset($actTipo) && $actTipo == $tipo->id)
                <b>
            @endif
            - <a href="{{ route('products.by.tipo', $tipo->id) }}">{{$tipo->nome}}</a>
            @if (isset($actTipo) && $actTipo == $tipo->id)
             </b>
            @endif
        @endforeach
    </div>

    <div class="listaProdutos">
        @foreach ($produtos as $i => $produto)
        <div class="produto">
            <a href="{{route('produtos.show', $produto ->id)}}">
                <img src="{{$produto->url}}" alt="img/produto">
                <h2>{{ $produto['nome']}}</h2>
            </a>
            @if ($i%3 == 0)
                <br/>
            @endif
        </div>
    @endforeach
    </div>


    <div>
        <pre>


        </pre>
        <button><a href="/produtos/create">Create Product</a>
        </button>
    </div>
@endsection

{{-- @extends('layouts.layout') --}}


