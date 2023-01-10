@extends('layouts.app')
@section('content')
    <h1>show me </h1>

    <div class="mybasket">
        @foreach ($baskets as $item => $baskets)
            <div class="basketclass">
                <a href="{{route('baskets.show', $basket ->id)}}">
                    <img src="{{$basket->url}}" alt="">
                    <h2>{{ $basket_item['name']}}</h2>
                    <h4>{{ $basket_item['des']}}</h4>
                    <h4>{{ $basket_item['price']}}</h4>
                </a>
                @if ($i%3 == 0)
                    <br/>
                @endif
            </div>
            <body>
                <div class="flex-center position-ref full-height">
                    <div class="content">
                        <h1>Here's a list of available products</h1>
                        <table>
                            <thead>
                                <td>Name</td>
                                <td>Des</td>
                                <td>url</td>
                                <td>Price</td>
                            </thead>
                            <tbody>
                                @foreach ($allItens as $basket_item)
                                    <tr>
                                        <td>{{ $basket_item->name }}</td>
                                        <td class="inner-table">{{ $basket_item->des }}</td>
                                        <td class="inner-table">{{ $basket_item->url }}</td>
                                        <td class="inner-table">{{ $basket_item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </body>
        @endforeach
    </div>
@endsection
