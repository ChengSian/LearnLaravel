@extends('hello')


@section('title','xxxxxxx')


@section('red')
    <div style="width: 100px;height: 100px;background-color: #ff0000;">gggggg</div>
    <p>loramssssss</p>
@stop

@component('alert',['foo'=>'bar'])
    @slot('title')
        Forbidden
    @endslot

    @slot('gg')
        gg
    @endslot

    你没有权限访问这个资源！
@endcomponent


