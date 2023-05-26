@extends('layouts.master')

@section('content')
    <ol class="steps">
        <li class="step is-complete" data-step="1">
            <p>Producer</p>
        </li>
        <li class="step is-active" data-step="2">
            <p>Device</p>
        </li>
        <li class="step" data-step="3">
            <p>Questionnaire</p>
        </li>
    </ol>
    <div class="phoneSpecs">
        <div class="container">
            <div class="heading">
                <h1>What phone do you want to sell?</h1>
                <p>Please choose your phone model.</p>
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="Choose a model">
                </div>
            </div>
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-4 row-cols-lg-5 row-cols-xl-5">
                    @foreach($devices as $device)
                        <div class="col">
                            <a href="{{route('estimator.calculate', $device->id)}}">
                                <div class="card">
                                    <img src="{{asset('uploads/'.$device->picture)}}" class="card-img-top" alt="modal">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$device->name}}</h5>
                                        <hr>
                                        <small class="text-muted">Up To 3500 Lei</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
        </div>
@endsection
