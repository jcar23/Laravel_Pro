@extends('layouts.app')

@section('content')
    <div class="first" style="display: flex; justify-content:center">
        <img src="/Logo/Sport_Equip_logo.jpg" width="450" height="180">
    </div>

    <div class="equipmentBrandList">
        @if (!isset($actBrand))
            <b>
        @endif
        <a style="text-decoration: none; color:black;" href="{{ route('equipments.index') }}">Todas as Marcas</a>
        @if (!isset($actBrand))
            </b>
        @endif
        @foreach ($brands as $brand)
            @if (isset($actBrand) && $actBrand == $brand->id)
                <b>
            @endif
            | <a style="text-decoration: none; color:black;" href="{{ route('equipment.by.brand', $brand->id) }}">{{$brand->name}}</a>
            @if (isset($actBrand) && $actBrand == $brand->id)
             </b>
            @endif
        @endforeach
    </div>

    <div class="equipmentList">
        @foreach ($equipments as $i => $equipment)
            <div class="equipment">
                <a style="text-decoration: none; color:black" href="{{route('equipments.show', $equipment ->id)}}">
                    <img src="{{$equipment->url}}" alt="/img/equipments">
                    <h4>{{ $equipment['name']}}</h4>
                </a>
                @if ($i%3 == 0)
                    <br/>
                @endif
            </div>
        @endforeach
    </div>


@endsection

{{-- <div class="container">
    <div class="row text-center py-5">
        <div class="col-md-3 col-sm-6 my-3 my-md-0">
            <form method="POST">
                <div class="card shadow">

                </div>
            </form>
        </div>
    </div>
</div> --}}
<style>
    .equipmentList{
        display: inline-flex;
        flex-wrap: wrap;
        justify-content: center;
        text-align: center;
        margin-top: 80px;
        align-items: left;


    }
    .equipmentList img{
        display: block;
        width: 230px;
        height: 230px;
        margin-left: 12px;
        margin-right: 12px;
        border-radius: 5%
    }

    body:{
            background-image: url("/Logo/background.jpg");
        }

</style>
