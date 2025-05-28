@extends('layouts.app')

@section('title', 'Сделайте свой заказ')

@section('content')
    <h1>Спасибо за заказ!</h1>
    <a href="{{ route('site.index') }}" class="btn btn-link">Сделать ещё один заказ</a>
@endsection
