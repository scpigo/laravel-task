@extends('layouts.app')

@section('title', 'Сделайте свой заказ')

@section('content')
    <h1>Сделайте свой заказ</h1>
    <div class="row">
        <div class="col-md-4">
            {{ html()->form('POST', route('site.add'))->open() }}
            {!! view('site.form', ['goodsList' => $goodsList]) !!}
            {{ html()->form()->close() }}
        </div>
    </div>
@endsection
