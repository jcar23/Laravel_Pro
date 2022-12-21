@extends('layouts.app')

@section('content')
    <h1>Loja de informatica - Detalhes</h1>
    {{-- "teste:".print_r($produto,true) --}}

    <div class="detalhes">
        @if(isset($produto))
            <img src="{{ $produto['url'] }}" alt="produto/img">
            <h2>{{$produto['nome'] }}</h2>
            <p>{{$produto['descr'] }}<br/>
            € {{$produto['preco']}}
            <a href="/produtos"></a>
            </p>
        @else
            <h1>O produto não existe</h1>
        @endif
        @auth
            @if ($produto->created_by == auth()->user()->id || auth()->user()->IsAdmin)
                <form action="{{route('produtos.destroy', $produto ->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Eliminar Produto</button>
                </form>

                <form action="{{route('produtos.edit', $produto->id) }}" method="GET">
                    @csrf
                    <button>Editar Produto</button>
                </form>
            @endif
        @endauth
        <a href="/produtos">voltar aos produtos</a>
    </div>
@endsection
