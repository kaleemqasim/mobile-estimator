@extends('layouts.master')

@section('content')
    <ol class="steps">
        <li class="step is-complete" data-step="1">
            <p>Producer</p>
        </li>
        <li class="step is-complete " data-step="2">
            <p>Device</p>
        </li>
        <li class="step is-active" data-step="3">
            <p>Questionnaire</p>
        </li>
    </ol>
    <div class="phoneSpecs questionarie">
        <div class="container">
            <div class="heading">
                <h1>Choose {{$device->name}} specs</h1>
                <p>At the end of the form you will receive the price estimate.</p>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <form id="msform">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-animated" role="progressbar" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                                <br>
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="stepNumber">0%</h2>
                                        <div class="capacity">
                                            <div class="row">
                                                <div class="text-center">
                                                    <h4>Configuration IPhone 13 Pro Max</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="boxes">
                                                        <h5>Color</h5>
                                                        @php
                                                            $color_html= "";

                                                                $colors = [
                                                                    'color_red' => 'red',
                                                                    'color_black' => 'black',
                                                                    'color_white' => 'white',
                                                                    'color_silver' => 'silver',
                                                                    'color_gold' => 'gold',
                                                                    'color_blue' => 'blue',
                                                                    'color_grey' => 'grey',
                                                                    'color_green' => 'green',
                                                                    'color_purple' => 'purple',
                                                                    'color_pink' => 'pink'
                                                                    ];

                                                                if ($device->color) {
                                                                foreach ($colors as $key => $color) {
                                                                     if ($device->color[$key] == 1) {
                                                                         $color_html .= '<input type="radio" class="btn-check" name="color-pick" id="check' . $key . '" value="' . $color . '" autocomplete="off" checked="">
                                                                              <label class="btn btn-light-radio" for="check' . $key . '">
                                                                                     <span class="' . $color . '" style="background-color:' . $color . ';"></span>
                                                                                     </label>
                                                                                         <p>' . ucfirst($color) . '</p>
                                                                              ';
                                                                          }
                                                                      }
                                                                    }
                                                        @endphp
                                                        <div class="d-flex">
                                                        @php
                                                            echo $color_html;
                                                        @endphp
                                                        </div>
                                                        <h5 class="mt-4 d-flex align-items-center justify-content-between">
                                                            Capacity <span data-bs-toggle="tooltip" data-placement="top"
                                                                           title="I'm a Working Tooltip">?</span></h5>
                                                        @php
                                                            $capacities_html= "";
                                                            $capacities = [
                                                                'capacity_8gb'=>'8gb',
                                                                'capacity_16gb'=>'16gb',
                                                                'capacity_32gb'=>'32gb',
                                                                'capacity_64gb'=>'64gb',
                                                                'capacity_128gb'=>'128gb',
                                                                'capacity_256gb'=>'256gb',
                                                                'capacity_512gb'=>'512gb',
                                                                'capacity_1tb'=>'1tb'
                                                            ];

                                                            if($device->capacity) {
                                                                foreach($capacities as $key =>$capacity){
                                                                    if($device->capacity[$key]) {
                                                                        $capacities_html .= '<input value="' . $capacity . '" data-price="' . $device->capacity[$key] . '" type="radio" class="btn-check" name="capacity-input" id="check' . $key . '" autocomplete="off" checked="">
                            <label class="btn btn-light" for="check' . $key . '">' . $capacity . '</label>';
                                                                    }

                                                                    if($device->capacity[$key] == 0) {
                                                                        $capacities_html .= '<input checked value="' . $capacity . '" data-price="' . $device->capacity[$key] . '" type="radio" class="btn-check" name="capacity-input" id="check' . $key . '" autocomplete="off" checked="">
                            <label class="btn btn-light" for="check' . $key . '">' . $capacity . '</label>';
                                                                        break;
                                                                    }


                                                                }
                                                            }


                                                        @endphp

                                                        @php
                                                            echo $capacities_html;
                                                        @endphp
                                                        {{--                                                                                                                <h5 class="mt-4 d-flex align-items-center justify-content-between">It is blocked in the network <span data-bs-toggle="tooltip" data-placement="top" title="I'm a Working Tooltip">?</span></h5>--}}
                                                        {{--                                                                                                                <input type="radio" class="btn-check" name="options-outlined-01" id="check01" autocomplete="off" checked="">--}}
                                                        {{--                                                                                                                <label class="btn btn-light" for="check01">Unlock</label>--}}
                                                        {{--                                                                                                                <input type="radio" class="btn-check" name="options-outlined-01" id="check02" autocomplete="off">--}}
                                                        {{--                                                                                                                <label class="btn btn-light" for="check02">Orange</label>--}}
                                                        {{--                                                                                                                <input type="radio" class="btn-check" name="options-outlined-01" id="check03" autocomplete="off">--}}
                                                        {{--                                                                                                                <label class="btn btn-light" for="check03">Vodaphone</label>--}}
                                                        {{--                                                                                                                <input type="radio" class="btn-check" name="options-outlined-01" id="check04" autocomplete="off">--}}
                                                        {{--                                                                                                                <label class="btn btn-light" for="check04">Digi</label>--}}
                                                        {{--                                                                                                                <input type="radio" class="btn-check" name="options-outlined-01" id="check05" autocomplete="off">--}}
                                                        {{--                                                                                                                <label class="btn btn-light" for="check05">Foregin Opreator</label>--}}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="modalImg">
                                                        <img src="{{asset('images/'.$device->picture)}}"
                                                             alt="modalDetail">
                                                        {{--                                                                                                                <p>Estimated: $300</p>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next"/>
                                </fieldset>
                                {{--                                <fieldset>--}}
                                {{--                                    <div class="form-card">--}}
                                {{--                                        <h2 class="stepNumber">0%</h2>--}}
                                {{--                                        <div class="capacity">--}}
                                {{--                                            <div class="row">--}}
                                {{--                                                <div class="col-md-6">--}}
                                {{--                                                    <div class="modalImg">--}}
                                {{--                                                        <img src="{{asset('images/'.$device->picture)}}" alt="modalDetail">--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}
                                {{--                                                <div class="col-md-6">--}}
                                {{--                                                    <div class="boxes">--}}
                                {{--                                                        <h5>Choose the squeezing capacity</h5>--}}
                                {{--                                                        @php--}}
                                {{--                                                            $capacities_html= "";--}}
                                {{--                                                            $capacities = [--}}
                                {{--                                                                'capacity_8gb'=>'8gb',--}}
                                {{--                                                                'capacity_16gb'=>'16gb',--}}
                                {{--                                                                'capacity_32gb'=>'32gb',--}}
                                {{--                                                                'capacity_64gb'=>'64gb',--}}
                                {{--                                                                'capacity_128gb'=>'128gb',--}}
                                {{--                                                                'capacity_256gb'=>'256gb',--}}
                                {{--                                                                'capacity_512gb'=>'512gb',--}}
                                {{--                                                                'capacity_1tb'=>'1tb'--}}
                                {{--                                                            ];--}}

                                {{--                                                            if($device->capacity) {--}}
                                {{--                                                                foreach($capacities as $key =>$capacity){--}}
                                {{--                                                                    if($device->capacity[$key]) {--}}
                                {{--                                                                        $capacities_html .= '<input value="' . $capacity . '" data-price="' . $device->capacity[$key] . '" type="radio" class="btn-check" name="capacity-input" id="check' . $key . '" autocomplete="off" checked="">--}}
                                {{--                            <label class="btn btn-light" for="check' . $key . '">' . $capacity . '</label>';--}}
                                {{--                                                                    }--}}

                                {{--                                                                    if($device->capacity[$key] == 0) {--}}
                                {{--                                                                        $capacities_html .= '<input checked value="' . $capacity . '" data-price="' . $device->capacity[$key] . '" type="radio" class="btn-check" name="capacity-input" id="check' . $key . '" autocomplete="off" checked="">--}}
                                {{--                            <label class="btn btn-light" for="check' . $key . '">' . $capacity . '</label>';--}}
                                {{--                                                                        break;--}}
                                {{--                                                                    }--}}


                                {{--                                                                }--}}
                                {{--                                                            }--}}


                                {{--                                                        @endphp--}}

                                {{--                                                        @php--}}
                                {{--                                                            echo $capacities_html;--}}
                                {{--                                                        @endphp--}}

                                {{--                                                        <h5 class="mt-4">Choose the color</h5>--}}
                                {{--                                                        @php--}}
                                {{--                                                            $color_html= "";--}}

                                {{--                                                                $colors = [--}}
                                {{--                                                                    'color_red' => 'red',--}}
                                {{--                                                                    'color_black' => 'black',--}}
                                {{--                                                                    'color_white' => 'white',--}}
                                {{--                                                                    'color_silver' => 'silver',--}}
                                {{--                                                                    'color_gold' => 'gold',--}}
                                {{--                                                                    'color_blue' => 'blue',--}}
                                {{--                                                                    'color_grey' => 'grey',--}}
                                {{--                                                                    'color_green' => 'green',--}}
                                {{--                                                                    'color_purple' => 'purple',--}}
                                {{--                                                                    'color_pink' => 'pink'--}}
                                {{--                                                                    ];--}}

                                {{--                                                                if ($device->color) {--}}
                                {{--                                                                foreach ($colors as $key => $color) {--}}
                                {{--                                                                     if ($device->color[$key] == 1) {--}}
                                {{--                                                                         $color_html .= '<input type="radio" class="btn-check" name="options-outlined-2" id="check' . $key . '" autocomplete="off" checked="">--}}
                                {{--                                                                              <label class="btn btn-light" for="check' . $key . '">--}}
                                {{--                                                                                     <span class="' . $color . '" style="background-color:' . $color . ';"></span>--}}
                                {{--                                                                                         <p>' . ucfirst($color) . '</p>--}}
                                {{--                                                                              </label>';--}}
                                {{--                                                                          }--}}
                                {{--                                                                      }--}}
                                {{--                                                                    }--}}
                                {{--                                                        @endphp--}}
                                {{--                                                        @php--}}
                                {{--                                                            echo $color_html;--}}
                                {{--                                                        @endphp--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <input type="button" name="next" class="next action-button" value="Next"/>--}}
                                {{--                                </fieldset>--}}
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="stepNumber">10%</h2>
                                        <div class="capacity">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="modalImg">
                                                        <img src="{{asset('images/'.$device->picture)}}"
                                                             alt="modalDetail">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="boxes">
                                                        <h5>1. Has the device come into contact with liquids
                                                        </h5>
                                                        <div class="form-check">
                                                            <input value="yes" class="form-check-input" type="radio"
                                                                   name="liquid-test" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input value="no" class="form-check-input" type="radio"
                                                                   name="liquid-test" id="flexRadioDefault2" checked>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next"/>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                           value="Previous"/>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="stepNumber">20%</h2>
                                        <div class="capacity">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="modalImg">
                                                        <img src="{{asset('images/'.$device->picture)}}"
                                                             alt="modalDetail">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="boxes">
                                                        <h5>2. Battery health is: <span data-bs-toggle="tooltip"
                                                                                        data-placement="top"
                                                                                        title="Go to settings -> battery and you will see the battery health percentage">?</span>
                                                        </h5>
                                                        <div class="form-check">
                                                            <input value="{{$device->device_health->above_85 ?? 0}}"
                                                                   class="form-check-input" type="radio"
                                                                   name="battery-test" id="flexRadioDefault3" checked>
                                                            <label class="form-check-label" for="flexRadioDefault3">
                                                                between 100% and 85%
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input value="{{$device->device_health->below_85 ?? 0}}"
                                                                   class="form-check-input" type="radio"
                                                                   name="battery-test" id="flexRadioDefault4">
                                                            <label class="form-check-label" for="flexRadioDefault4">
                                                                less than 85%
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next"/>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                           value="Previous"/>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="stepNumber">30%</h2>
                                        <div class="capacity">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="modalImg">
                                                        <img src="{{asset('images/'.$device->picture)}}"
                                                             alt="modalDetail">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="boxes">
                                                        <h5>3. Does the phone work in optimal parameters</h5>
                                                        <div class="form-check">
                                                            <input value="yes" class="form-check-input" type="radio"
                                                                   name="optimal-test" id="flexRadioDefault5" checked>
                                                            <label class="form-check-label" for="flexRadioDefault5">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input value="no" class="form-check-input" type="radio"
                                                                   name="optimal-test" id="flexRadioDefault6">
                                                            <label class="form-check-label" for="flexRadioDefault6">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next"/>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                           value="Previous"/>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="stepNumber">40%</h2>
                                        <div class="capacity">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="modalImg">
                                                        <img src="{{asset('images/'.$device->picture)}}"
                                                             alt="modalDetail">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="boxes">
                                                        <h5>4. What does the SCREEN of the device look like</h5>
                                                        <div class="form-check">
                                                            <input value="0" class="form-check-input" type="radio"
                                                                   name="screen-test" id="flexRadioDefault7" checked>
                                                            <label class="form-check-label" for="flexRadioDefault7">
                                                                it shows no visible signs of use
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input
                                                                value="{{$device->screen_problem->screen_fine_traces ?? 0}}"
                                                                class="form-check-input" type="radio" name="screen-test"
                                                                id="flexRadioDefault8">
                                                            <label class="form-check-label" for="flexRadioDefault8">
                                                                some fine traces
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input
                                                                value="{{$device->screen_problem->screen_visible_marks ?? 0}}"
                                                                class="form-check-input" type="radio" name="screen-test"
                                                                id="flexRadioDefault9">
                                                            <label class="form-check-label" for="flexRadioDefault9">
                                                                visible marks (semi-deep)
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input
                                                                value="{{$device->screen_problem->screen_very_visible_marks ?? 0}}"
                                                                class="form-check-input" type="radio" name="screen-test"
                                                                id="flexRadioDefault10">
                                                            <label class="form-check-label" for="flexRadioDefault10">
                                                                very visible (deep) scratches
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next"/>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                           value="Previous"/>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="stepNumber">50%</h2>
                                        <div class="capacity">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="modalImg">
                                                        <img src="{{asset('images/'.$device->picture)}}"
                                                             alt="modalDetail">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="boxes">
                                                        <h5>5. What do the BACK and SIDES of the device look like</h5>
                                                        <div class="form-check">
                                                            <input value="0" class="form-check-input" type="radio"
                                                                   name="back-side-test" id="flexRadioDefault11"
                                                                   checked>
                                                            <label class="form-check-label" for="flexRadioDefault11">
                                                                it shows no visible signs of use
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input
                                                                value="{{$device->back_side_probem->back_side_fine_traces ?? 0}}"
                                                                class="form-check-input" type="radio"
                                                                name="back-side-test" id="flexRadioDefault12">
                                                            <label class="form-check-label" for="flexRadioDefault12">
                                                                some fine traces
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input
                                                                value="{{$device->back_side_probem->back_side_visible_marks ?? 0}}"
                                                                class="form-check-input" type="radio"
                                                                name="back-side-test" id="flexRadioDefault13">
                                                            <label class="form-check-label" for="flexRadioDefault13">
                                                                visible marks (semi-deep)
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input
                                                                value="{{$device->back_side_probem->back_side_very_visible_marks ?? 0}}"
                                                                class="form-check-input" type="radio"
                                                                name="back-side-test" id="flexRadioDefault14">
                                                            <label class="form-check-label" for="flexRadioDefault14">
                                                                very visible (deep) scratches
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next"/>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                           value="Previous"/>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="stepNumber">60%</h2>
                                        <div class="capacity">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="modalImg">
                                                        <img src="{{asset('images/'.$device->picture)}}"
                                                             alt="modalDetail">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="boxes">
                                                        <h5>6. What is the form of purchase of the device</h5>
                                                        <div class="form-check">
                                                            <input value="free" class="form-check-input" type="radio"
                                                                   name="purchase-test" id="flexRadioDefault15" checked>
                                                            <label class="form-check-label" for="flexRadioDefault15">
                                                                free
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input value="abonament " class="form-check-input"
                                                                   type="radio" name="purchase-test"
                                                                   id="flexRadioDefault16">
                                                            <label class="form-check-label" for="flexRadioDefault16">
                                                                the abonament
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next"/>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                           value="Previous"/>
                                </fieldset>


                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="stepNumber">90%</h2>
                                        <div class="capacity">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="modalImg">
                                                        <img src="{{asset('images/'.$device->picture)}}"
                                                             alt="modalDetail">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="boxes">
                                                        <h5>Personal dates</h5>
                                                        <input required name="person_name" type="text"
                                                               class="form-control mb-4" placeholder="Name and surname">
                                                        <input required name="person_contact_no" type="number"
                                                               class="form-control mb-4" placeholder="Phone Number">
                                                        <input required name="person_email" type="email"
                                                               class="form-control mb-4" placeholder="Email">
                                                        <div class="form-check">
                                                            <input required class="form-check-input" type="checkbox"
                                                                   value="" id="flexCheckChecked99">
                                                            <label class="form-check-label" for="flexCheckChecked99">
                                                                I accept the terms and conditions
                                                            </label>
                                                        </div>
                                                        <a href="">Terms and Conditions</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" id="save-record" name="next" class="next action-button"
                                           value="Submit"/>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                           value="Previous"/>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="stepNumber">100%</h2>
                                        <br><br>
                                        <div class="capacity">
                                            <div class="row">
                                                <div class="text-center">
                                                    <h2 id="estimated_price"></h2>
                                                    <h2 class="mb-4">The admin will contact you.
                                                        Thank you!</h2>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{route('estimator.index')}}" class="mainPage">Back to
                                                            main page</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <p>Estimated price: <span id="price-tag"></span></p>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('page_script')
            <script>
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                })

                var device = @json($device);
                var settings = @json($settings);
                console.log(device);
                console.log(settings);

                let all_capacities = {
                    'capacity_8gb': '8gb',
                    'capacity_16gb': '16gb',
                    'capacity_32gb': '32gb',
                    'capacity_64gb': '64gb',
                    'capacity_128gb': '128gb',
                    'capacity_256gb': '256gb',
                    'capacity_512gb': '512gb',
                    'capacity_1tb': '1tb'
                };


                var selected_capacity = null;
                var selected_capacity_price = 0;
                var selected_liquid_test = null;
                var selected_battery_test = null;
                var selected_optimal_test = null;
                var selected_screen_test = null;
                var selected_purchase_test = null;
                var selected_back_side_test = null;
                var estimated_price = "{{$device->main_price}}";
                var current_step = 1;
                var selected_color = null;

                $('#price-tag').html(estimated_price)

                for (const [key, value] of Object.entries(all_capacities)) {
                    if (device.capacity[key] == 0) {
                        selected_capacity = value;
                    }
                }
                $(document).ready(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('input[type=radio][name=capacity-input]').change(function () {
                        selected_capacity = $(this).val()
                        selected_capacity_price = $(this).data('price')
                        estimate();
                    });

                    $('input[name="liquid-test"]').change(function () {
                        if ($(this).val() == 'yes') {
                            calert('Error', 'Your phone does not meet the requirement', 'error')
                            $('.action-button').prop('disabled', true)
                            $('.action-button').addClass('action-button-disabled')
                            $('.action-button').removeClass('action-button')
                            selected_liquid_test = true
                        } else {
                            $('.action-button-disabled').prop('disabled', false)
                            $('.action-button-disabled').addClass('action-button')
                            $('.action-button').removeClass('action-button-disabled')
                            selected_liquid_test = false
                        }
                    });

                    $('input[name="battery-test"]').change(function () {
                        selected_battery_test = $(this).val();
                        // if($(this).val() == 'yes') {
                        //     selected_battery_test = true
                        // } else {
                        //     selected_battery_test = false
                        // }
                        estimate();
                    });

                    $('input[name="optimal-test"]').change(function () {
                        if ($(this).val() == 'no') {
                            calert('Error', 'Your phone does not meet the requirement', 'error')
                            $('.action-button').prop('disabled', true)
                            $('.action-button').addClass('action-button-disabled')
                            $('.action-button').removeClass('action-button')
                            selected_optimal_test = true
                        } else {
                            $('.action-button-disabled').prop('disabled', false);
                            $('.action-button-disabled').addClass('action-button')
                            $('.action-button').removeClass('action-button-disabled')
                            selected_optimal_test = false
                        }
                    });

                    $('input[name="previous"]').click(function () {
                        current_step -= 1;
                        check_disabled_next()
                    });

                    $('input[name="next"]').click(function () {
                        current_step += 1;
                        check_disabled_next()
                    });

                    function check_disabled_next() {
                        if (current_step === 2 && $('input[name="liquid-test"]:checked').val() == 'yes') {
                            disable_next_btn();
                        } else if (current_step === 4 && $('input[name="optimal-test"]:checked').val() == 'no') {
                            disable_next_btn();
                        } else {
                            enable_next_btn();
                        }
                    }

                    function disable_next_btn() {
                        $('.action-button').prop('disabled', true)
                        $('.action-button').addClass('action-button-disabled')
                        $('.action-button').removeClass('action-button')
                    }

                    function enable_next_btn() {
                        $('.action-button-disabled').prop('disabled', false);
                        $('.action-button-disabled').addClass('action-button')
                        $('.action-button').removeClass('action-button-disabled')
                    }

                    $('input[name="screen-test"]').change(function () {
                        selected_screen_test = $(this).val()
                        estimate()
                    });

                    $('input[name="back-side-test"]').change(function () {
                        selected_back_side_test = $(this).val()
                        estimate()
                    });
                    $('input[name="color-pick"]').change(function () {
                        selected_color = $(this).val()
                    });

                    $('input[name="purchase-test"]').change(function () {
                        selected_purchase_test = $(this).val()
                    });

                    $('#save-record').click(function () {
                        $('#estimated_price').html(`The estimated price is ${estimated_price}`)

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('estimator.store_estimation') }}",
                            data: {
                                device_name: device.name,
                                estimated_price: estimated_price,
                                color: selected_color,
                                battery_test: selected_battery_test ? 'fine' : 'less_than_85',
                                screen_test: selected_screen_test ?? "okay",
                                back_side_test: selected_back_side_test ?? "okay",
                                purchase_test: selected_purchase_test ?? "free",
                                person_name: $("input[name=person_name]").val(),
                                person_contact_no: $("input[name=person_contact_no]").val(),
                                person_email: $("input[name=person_email]").val(),
                            },
                            success: function (data) {
                            }
                        });
                    })
                });

                function estimate() {
                    estimated_price = "{{$device->main_price}}";
                    if (selected_capacity_price) {
                        estimated_price = parseFloat(selected_capacity_price);
                    }

                    if (selected_battery_test) {
                        estimated_price = estimated_price - (parseInt(selected_battery_test))
                    }

                    if (selected_screen_test && selected_screen_test !== "") {
                        estimated_price = estimated_price - (parseInt(selected_screen_test))
                    }

                    if (selected_back_side_test && selected_back_side_test !== "") {
                        estimated_price = estimated_price - (parseInt(selected_back_side_test))
                    }

                    console.log(estimated_price)

                    $('#price-tag').html(estimated_price)
                }
            </script>
@endsection
