@extends('layouts.gourmet')
@section('title', 'トップページ')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="filter">
                    <div class="content">
                        <img src="{{ asset('resources/images/main.jpg') }}" alt="">
                        <p>Gourmet Log</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection