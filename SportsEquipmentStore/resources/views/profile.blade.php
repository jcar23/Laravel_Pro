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
                        echo  "<script>alert('Email enviado com Sucesso!');</script>";
                    ?>


                </div>

            </div>
            <br>
            <div class="newbt" style="display:flex ;justify-content: center">
                <h1>Profile Page</h1>
            </div>
        </div>
    </div>
</div>
@endsection
