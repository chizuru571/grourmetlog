@extends('layouts.gourmet_vertical')
@section('title', 'ダッシュボード')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>
                {{ \Carbon\Carbon::now()->format("Y/m/d") }}
                <p>{{ Auth::user()->name }} さん　こんにちは！</p></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h5><p>大阪周辺おすすめのお店TOP10</p></h5>
        @foreach($shops as $shop)
            <p>{{$shop['name'] . " " . $shop['station_name']. "駅"}}</p>
        @endforeach
            </div>
        </div>
    </div>
@endsection