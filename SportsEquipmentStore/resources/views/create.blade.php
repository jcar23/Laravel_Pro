@extends('layouts.app')
@section('content')

    <h1 style="display: flex; justify-content:center;">Add New Equipments
        @if (isset($equipment))
            Editar Equipment
        @endif
    </h1>
    <div class="details">
        <p class="message">{{ session('mssg') }}</p>
        <div class="error">
            <ul>
                @foreach ($errors-> all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        <form method="POST" enctype="multipart/form-data"
            @if (isset($equipment))
                action="{{ route('equipments.update',$equipment->id)}}"
            @else
                action="{{ route('equipments.store')}}"
            @endif
        >
            @csrf
            @if (isset($equipment))
                @method('PUT')
            @endif
            <label for="name">Name: </label>
            <input type="text" id="name" name="name"
            @if (isset($equipment))
                value="{{$equipment->name}}"
            @endif
            >
            <br>
            <label for="des">Description: </label>
            <input type="text" name="des" id="des"
            @if (isset($equipment))
                value="{{$equipment->des}}"
            @endif
            >
            <br>
            <label for="url">Image: </label>
            <input type="file" name="url" id="url"
                onchange="document.getElementById('changed').value='true'"
            @if (isset($equipment))
                (não alterar para manter foto)
            @endif
            >
            <br>
            <label for="price">Price: </label>
            <input type="text" name="price" id="price"
            @if (isset($equipment))
                value="{{$equipment->price}}"
            @endif
            >
            <br>
            <br>

            <select name="brandModel" id="brandModel">
                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}"
                        @if (isset($equipment) && $equipment ->brand_model_id == $brand->id)
                            selected="selected"
                        @endif
                    >{{$brand->name}}</option>
                @endforeach

            </select>
            <br>
            <input type="submit"
                @if (isset($equipment))
                    value="Save"
                @else
                    value="Create"
                @endif>
        </form>

    </div>
    <div class="back">
        <pre>



            <a style="text-decoration: none; color:black; padding: 8px 15px; border:solid black;" href="/equipments">Back</a>

        </pre>
    </div>
@endsection

<style>
    .details{
        display: flex;
        justify-content: center;
    }
    .back{
        display: flex;
        justify-content: center;
    }
</style>
