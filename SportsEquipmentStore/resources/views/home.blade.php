@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <?php
                        echo  "<script>alert('You have logged in sucessfully!');</script>";
                    ?>

                    {{ __('You are logged in!') }}
                </div>

            </div>
            <br>
            <div class="newbt" style="display:flex ;justify-content: center">
                <button>
                    <a href="{{route('equipments.create')}} " style="text-decoration:none; color:black">Create Equip</a>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
