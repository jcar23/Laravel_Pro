@extends('layouts.app')
@section('content')

    <h1>Loja de informatica -
        @if (isset($produto))
            Editar Produto
        @else
            criar produto
        @endif
    </h1>
    <div class="detalhes">
        <p class="message">{{ session('mssg') }}</p>
        <div class="error">
            <ul>
                @foreach ($errors-> all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        <form method="POST" enctype="multipart/form-data"
            @if (isset($produto))
                action="{{ route('produtos.update',$produto->id)}}"
            @else
                action="{{ route('produtos.store')}}"
            @endif
        >
            @csrf
            @if (isset($produto))
                @method('PUT')
            @endif
            <label for="name">Nome do Produto: </label>
            <input type="text" id="name" name="name"
            @if (isset($produto))
                value="{{$produto->nome}}"
            @endif
            >
            <br>
            <label for="descr">Descrição do Produto: </label>
            <input type="text" name="descr" id="descr"
            @if (isset($produto))
                value="{{$produto->descr}}"
            @endif
            >
            <br>
            <label for="url">Imagem: </label>
            <input type="file" name="url" id="url"
                onchange="document.getElementById('changed').value='true';"
            @if (isset($produto))
                (não alterar para manter foto)
            @endif
            >
            <br>
            <label for="preco">Preço: </label>
            <input type="text" name="preco" id="preco"
            @if (isset($produto))
                value="{{$produto->preco}}"
            @endif
            >

            <select name="tipoProduto" id="tipoProduto">
                @foreach ($tipos as $tipo)
                    <option value="{{$tipo->id}}"
                        @if (isset($produto) && $produto ->tipo_produto_id == $tipo->id)
                            selected="selected"
                        @endif
                    >{{$tipo->nome}}</option>
                @endforeach

            </select>
            <br>
            <input type="submit"
                @if (isset($produto))
                    value="Editar Produto"
                @else
                    value="Criar Produto"
                @endif>
        </form>
        <pre>
            <a href="/produtos">Voltar aos Produtos</a>
        </pre>
    </div>
@endsection
