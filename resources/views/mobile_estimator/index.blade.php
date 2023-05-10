@extends('layouts.master')

@section('content')
    <ol class="steps">
        <li class="step is-active" data-step="1">
            <p>Producer</p>
        </li>
        <li class="step" data-step="2">
            <p>Device</p>
        </li>
        <li class="step" data-step="3">
            <p>Questionnaire</p>
        </li>
    </ol>
    <div class="chooseModal">
        <div class="container">
            <div class="heading">
                <h1>What phone do you want to sell?</h1>
                <p>To choose the phone model, please choose its manufacturer first.</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('estimator.devices', 'apple')}}">
                        <div class="card mb-3">
                            <div class="row g-0 align-items-center">
                                <div class="col-5">
                                    <img src="{{asset('images/apple.png')}}" class="img-fluid rounded-start mblImg"
                                         alt="apple">
                                </div>
                                <div class="col-7">
                                    <div class="d-flex align-items-center">
                                        <div class="card-body">
                                            <h5 class="card-title">Apple</h5>
                                            <p class="card-text"><small class="text-muted"> Alege pentru a vizualiza
                                                    lista cu dispozitive din categoria "Apple".</small></p>
                                        </div>
                                        <div class="arrow">
                                            <img src="{{asset('images/arrow.png')}}" alt="arrow">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{route('estimator.devices', 'samsung')}}">
                        <div class="card mb-3">
                            <div class="row g-0 align-items-center">
                                <div class="col-5">
                                    <img src="{{asset('images/samsung.png')}}" class="img-fluid rounded-start mblImg"
                                         alt="samsung">
                                </div>
                                <div class="col-7">
                                    <div class="d-flex align-items-center">
                                        <div class="card-body">
                                            <h5 class="card-title">Samsung</h5>
                                            <p class="card-text"><small class="text-muted"> Alege pentru a vizualiza
                                                    lista cu dispozitive din categoria "Sumsung".</small></p>
                                        </div>
                                        <div class="arrow">
                                            <img src="{{asset('images/arrow.png')}}" alt="arrow">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
