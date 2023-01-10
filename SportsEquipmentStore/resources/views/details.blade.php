@extends('layouts.app')

@section('content')
    <div class="details" >
        <!--isset ->Check whether a variable is empty. Also check whether the variable is set/declared -->
        @if (isset($equipment))
            <img src="{{ $equipment['url'] }}" alt="/img/equipments" width="250" height="150">
            <h2>{{$equipment['name'] }}</h2>
            <p>{{$equipment['des']}} <br/>
            {{$equipment['price']}}€
            </p>
            <p>
        @else
            <a href="/equipments/create">Back</a>
        @endif

        @auth
            @if ($equipment->created_by == auth()->user()->id || auth()->user()->IsAdmin)
                <form action="{{route('equipments.destroy', $equipment ->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete equipment</button>
                </form>

                <form action="{{route('equipments.edit', $equipment->id) }}" method="GET">
                    @csrf
                    <button>Edit equipment</button>
                </form>
            @endif
        @endauth


    </div>
    <div>
        @if (isset($basket_item))

            @auth
            @if ($basket_item->user_id == auth()->user()->id || $equipment->created_by == auth()->user()->id || auth()->user()->IsAdmin )
                @endauth
                    <form method="POST" enctype="multipart/form-data"
                        @if (isset($basket_item))
                            action="{{ route('baskets.addToBasket', $basket_item->id)}}"
                        @endif
                            action="{{ route('baskets.store', $basket_item->id)}}">
                            <button>Add to basket</button>
                            <input type="submit" value="addToBasket">
                        @csrf
                        @if (isset($basket_item))
                            @method('PUT')
                            <button>Add to basket</button>
                        @else
                            <input type="submit" value="addToBasket">
                    </form>
                @endauth
            @endif
        @endif

    </div>

@endsection

<style>
    .details{
        display: inline-block;
        justify-content: right;
    }
</style>
