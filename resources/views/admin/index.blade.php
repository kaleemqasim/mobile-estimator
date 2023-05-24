@extends('layouts.master')

@section('content')
    <div class="phoneSpecs">
        <div class="container">
            <div class="heading" style="text-align: right !important">
                <div class="row">
                    <a href="{{ route('device') }}"><button class="btn btn-primary" type="button" >Add Device</button></a>
                </div>
            </div>
            <div class="row">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-4 row-cols-lg-5 row-cols-xl-5">
                    @foreach($devices as $device)
                        <div class="col">
                            <a href="{{route('admin.device.edit', $device->id)}}">
                                <div class="card">
                                    <img src="{{asset('uploads/'.$device->picture)}}" class="card-img-top" alt="modal">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$device->name}}</h5>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Maximum prices {{$device->main_price}}</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
