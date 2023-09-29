@extends('layouts.gourmet_vertical')
@section('title', 'Gourmet Logの新規作成')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>お店 新規登録</h2>
                <form action="{{ route('gourmet.confirm') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <font color="red"><li>{{ $e }}</li></font>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3">店名 <font color="red">*</font></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="shop_name" value="{{ old('shop_name', request('shop_name')) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">店名 フリガナ <font color="red">*</font></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name_katakana" value="{{ old('name_katakana', request('name_katakana')) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">カテゴリー <font color="red">*</font></label>
                        <div class="col-md-9">
                            @foreach($categories as $category)
                                <label><input type="radio" name="category_id" value="{{$category->id}}" 
                                    @if(!empty(old('category_id',request('category_id'))))
                                        {{ $category->id == old('category_id',request('category_id')) ? "checked" : ""}}
                                    @endif
                                    >{{$category->name}}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">レビュー（最高:5 / 最低:1） <font color="red">*</font></label>
                        <div class="col-md-9">
                        <select name="review">
                            <option value="">下記の中から選択してください</option>
                            @foreach($reviews as $review)
                                <option value="{{$review}}" {{ old('review',request('review'))==$review ? "selected" :""}}>{{$review}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">料理写真</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Google Map URL</label>
                        <div class="col-md-9">
                            <input type="url" class="form-control" name="map_url" value="{{ old('map_url', request('map_url')) }}" placeholder="https://example.com" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">電話番号</label>
                        <div class="col-md-9">
                            <input type="tel" class="form-control" name="tel" value="{{ old('tel', request('tel')) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">コメント <font color="red">*</font></label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="comment" rows="2">{{ old('comment', request('comment')) }}</textarea>
                        </div>
                    </div>
                    @csrf
                    <div class ="row">
                    <div class="col-12 d-flex justify-content-center">
                    <div class="row mt-3">
                        <div class="col-md-5">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="確認画面へ">
                            </a>
                        </div>
                        </div>
                        </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection