@extends('layouts.master')

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <div class="container">
        <h1 class="text-center mt-3">Edit Device</h1>
        <div id="accordion" class="mt-3">

            <!-- First Collapse -->
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                            Add Device
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <!-- Multiple Checkboxes -->
                        <div class="form-check">
                            <label class="form-check-label">
                                Device Name:
                            </label>
                            <input value="{{$device->name}}" type="text" class="form-control col-4" id="name" name="name" required placeholder="Enter device name">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                Device Picture:
                            </label>
                            <input type="file" class="form-control col-4" id="picture" name="picture" accept="image/*">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                Device Type:
                            </label>
                            <select class="form-control col-4" id="device_type_id" name="device_type_id">
                                @foreach ($device_types as $dev)
                                    <option @if($device->device_type_id == $dev->id) selected @endif value="{{ $dev->id }}">{{ $dev->device_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                Device Price:
                            </label>
                            <input value="{{$device->main_price}}" class="form-control col-4" type="number" id="main_price" name="main_price" step="0.01" min="0"
                                   placeholder="Enter price">
                        </div>
                        <button id="btn1" class="btn btn-primary mt-3 next-btn" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Next
                        </button>
                    </div>
                </div>
            </div>

            <!-- Second Collapse -->
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                            Device Color
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <div class="form-check">
                            <input @if($device['color']['color_black']) checked @endif class="form-check-input" type="checkbox" name="color_black" id="color_black"
                                   value="1">
                            <label class="form-check-label" for="color_black">
                                Black
                            </label>
                        </div>
                        <div class="form-check">
                            <input @if($device['color']['color_white']) checked @endif class="form-check-input" type="checkbox" name="color_white" id="color_white"
                                   value="1">
                            <label class="form-check-label" for="color_white">
                                White
                            </label>
                        </div>
                        <div class="form-check">
                            <input @if($device['color']['color_silver']) checked @endif class="form-check-input" type="checkbox" name="color_silver" id="color_silver"
                                   value="1">
                            <label class="form-check-label" for="color_silver">
                                Silver
                            </label>
                        </div>
                        <div class="form-check">
                            <input @if($device['color']['color_gold']) checked @endif class="form-check-input" type="checkbox" name="color_gold" id="color_gold"
                                   value="1">
                            <label class="form-check-label" for="color_gold">
                                Gold
                            </label>
                        </div>
                        <div class="form-check">
                            <input @if($device['color']['color_blue']) checked @endif class="form-check-input" type="checkbox" name="color_blue" id="color_blue"
                                   value="1">
                            <label class="form-check-label" for="color_blue">
                                Blue
                            </label>
                        </div>
                        <div class="form-check">
                            <input @if($device['color']['color_grey']) checked @endif class="form-check-input" type="checkbox" name="color_grey" id="color_grey"
                                   value="1">
                            <label class="form-check-label" for="color_grey">
                                Grey
                            </label>
                        </div>
                        <div class="form-check">
                            <input @if($device['color']['color_red']) checked @endif class="form-check-input" type="checkbox" name="color_red" id="color_red"
                                   value="1">
                            <label class="form-check-label" for="color_red">
                                Red
                            </label>
                        </div>
                        <div class="form-check">
                            <input @if($device['color']['color_green']) checked @endif class="form-check-input" type="checkbox" name="color_green" id="color_green"
                                   value="1">
                            <label class="form-check-label" for="color_green">
                                Green
                            </label>
                        </div>
                        <div class="form-check">
                            <input @if($device['color']['color_purple']) checked @endif class="form-check-input" type="checkbox" name="color_purple" id="color_purple"
                                   value="1">
                            <label class="form-check-label" for="color_purple">
                                Purple
                            </label>
                        </div>
                        <div class="form-check">
                            <input @if($device['color']['color_pink']) checked @endif class="form-check-input" type="checkbox" name="color_pink" id="color_pink"
                                   value="1">
                            <label class="form-check-label" for="color_pink">
                                Pink
                            </label>
                        </div>

                        <button id="btn2" class="btn btn-primary mt-3 next-btn" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Next
                        </button>
                    </div>
                </div>
            </div>

            <!-- Third Collapse -->
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">
                            Device Capacity
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <!-- Multiple Checkboxes -->
                        <div class="form-check">
                            <label class="form-check-label">
                                8Gb:
                            </label>
                            <input value="{{$device['capacity']['capacity_8gb']}}" class="form-control col-4" type="number" name="capacity_8gb" id="capacity_8gb" step="0.01" min="0"
                                   placeholder="Enter price">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                16Gb:
                            </label>
                            <input value="{{$device['capacity']['capacity_16gb']}}" class="form-control col-4" type="number" name="capacity_16gb" id="capacity_16gb" step="0.01" min="0"
                                    placeholder="Enter price">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                32Gb:
                            </label>
                            <input value="{{$device['capacity']['capacity_32gb']}}" class="form-control col-4" type="number" name="capacity_32gb" id="capacity_32gb" step="0.01" min="0"
                                   placeholder="Enter price">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                64Gb:
                            </label>
                            <input value="{{$device['capacity']['capacity_64gb']}}" class="form-control col-4" type="number" name="capacity_64gb" id="capacity_64gb" step="0.01" min="0"
                                   placeholder="Enter price">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                128Gb:
                            </label>
                            <input value="{{$device['capacity']['capacity_128gb']}}" class="form-control col-4" type="number" name="capacity_128gb" id="capacity_128gb" step="0.01"
                                   min="0" placeholder="Enter price">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                256Gb:
                            </label>
                            <input value="{{$device['capacity']['capacity_256gb']}}" class="form-control col-4" type="number" name="capacity_256gb" id="capacity_256gb" step="0.01"
                                   min="0" placeholder="Enter price">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                512Gb:
                            </label>
                            <input value="{{$device['capacity']['capacity_512gb']}}" class="form-control col-4" type="number" name="capacity_512gb" id="capacity_512gb" step="0.01"
                                   min="0" placeholder="Enter price">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                1Tb:
                            </label>
                            <input value="{{$device['capacity']['capacity_1tb']}}" class="form-control col-4" type="number" name="capacity_1tb" id="capacity_1tb" step="0.01" min="0"
                                   placeholder="Enter price">
                        </div>
                        <button id="btn3" class="btn btn-primary mt-3 next-btn" data-toggle="collapse"
                                data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" >
                            Next
                        </button>
                    </div>
                </div>
            </div>
            <!-- Four Collapse -->
            <div class="card">
                <div class="card-header" id="headingFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"
                                aria-expanded="false" aria-controls="collapseFour" >
                            Device Health
                        </button>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                    <div class="card-body">
                        <!-- Multiple Checkboxes -->
                        <div class="form-check">
                            <label class="form-check-label">
                                Below 85%:
                            </label>
                            <input value="{{$device->device_health->below_85}}" class="form-control col-4" type="number" name="below_85" id="below_85" step="0.01" min="0"
                                   placeholder="Enter price">
                        </div>
                        <button id="btn4" class="btn btn-primary mt-3 next-btn" data-toggle="collapse"
                                data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" >
                            Next
                        </button>
                    </div>
                </div>
            </div>
            <!-- Five Collapse -->
            <div class="card">
                <div class="card-header" id="headingFive">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"
                                aria-expanded="false" aria-controls="collapseFive" >
                            Device Screen
                        </button>
                    </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                    <div class="card-body">
                        <!-- Multiple Checkboxes -->
                        <div class="form-check">
                            <label class="form-check-label">
                                Screen Fine Traces:
                            </label>
                            <input value="{{$device->screen_problem->screen_fine_traces}}" class="form-control col-4" type="number" name="screen_fine_traces" id="screen_fine_traces" step="0.01"
                                   min="0" placeholder="Enter price">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                Screen Visibe Marks:
                            </label>
                            <input value="{{$device->screen_problem->screen_visible_marks}}" class="form-control col-4" type="number" name="screen_visible_marks" id="screen_visible_marks" step="0.01"
                                   min="0" placeholder="Enter price">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                Screen Very Visibe Marks:
                            </label>
                            <input value="{{$device->screen_problem->screen_very_visible_marks}}" class="form-control col-4" type="number" name="screen_very_visible_marks" id="screen_very_visible_marks"
                                   step="0.01" min="0" placeholder="Enter price">
                        </div>
                        <button id="btn5" class="btn btn-primary mt-3 next-btn" data-toggle="collapse"
                                data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" >
                            Next
                        </button>
                    </div>
                </div>
            </div>
            <!-- Six Collapse -->
            <div class="card">
                <div class="card-header" id="headingSix">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix"
                                aria-expanded="false" aria-controls="collapseSix" >
                            Device Back Side Problems
                        </button>
                    </h5>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                    <div class="card-body">
                        <!-- Multiple Checkboxes -->
                        <div class="form-check">
                            <label class="form-check-label">
                                Back Side Fine Traces:
                            </label>
                            <input value="{{$device->back_side_probem->back_side_fine_traces}}" class="form-control col-4" type="number" name="back_side_fine_traces" id="back_side_fine_traces" step="0.01"
                                   min="0" placeholder="Enter price">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                Back Side Visible Marks:
                            </label>
                            <input value="{{$device->back_side_probem->back_side_visible_marks}}" class="form-control col-4" type="number" name="back_side_visible_marks" id="back_side_visible_marks"
                                   step="0.01" min="0" placeholder="Enter price">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                Back Side Very Visible Marks:
                            </label>
                            <input value="{{$device->back_side_probem->back_side_very_visible_marks}}" class="form-control col-4" type="number" name="back_side_very_visible_marks" id="back_side_very_visible_marks"
                                   step="0.01" min="0" placeholder="Enter price">
                        </div>
                        <button id="btn6" class="btn btn-primary mt-3 next-btn" data-toggle="collapse"
                                data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" >
                            Next
                        </button>
                    </div>
                </div>
            </div>

            <!-- Add more collapses as needed -->

        </div>
    </div>
@endsection
@section('page_script')
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var device_id = null;
        $(document).ready(function() {


            $(".collapse").on("show.bs.collapse", function() {
                $(this).prev(".card-header").find(".btn").addClass("collapsed");
            });

            $(".collapse").on("hide.bs.collapse", function() {
                $(this).prev(".card-header").find(".btn").removeClass("collapsed");
            });

            $('#btn1').click(function() {
                var formData = new FormData();
                var picture = $('#picture').prop('files')[0];
                formData.append('picture', picture);
                formData.append('name', $('#name').val());
                formData.append('device_type_id', $('#device_type_id').val());
                formData.append('main_price', $('#main_price').val());
                formData.append('step', 1);

                submitAjax(formData);
            })

            $('#btn2').click(function() {
                var formData = new FormData();
                $('#collapseTwo input:checked').each(function() {
                    formData.append($(this).attr('name'), 1);
                })
                formData.append('device_id', device_id);
                formData.append('step', 2);

                submitAjax(formData);
            })

            $('#btn3').click(function() {
                var formData = new FormData();
                formData.append('device_id', device_id);
                formData.append('capacity_8gb', $('#capacity_8gb').val());
                formData.append('capacity_16gb', $('#capacity_16gb').val());
                formData.append('capacity_32gb', $('#capacity_32gb').val());
                formData.append('capacity_64gb', $('#capacity_64gb').val());
                formData.append('capacity_128gb', $('#capacity_128gb').val());
                formData.append('capacity_256gb', $('#capacity_256gb').val());
                formData.append('capacity_512gb', $('#capacity_512gb').val());
                formData.append('capacity_1tb', $('#capacity_1tb').val());
                formData.append('step', 3);
                submitAjax(formData);
            })

            $('#btn4').click(function() {
                var formData = new FormData();
                formData.append('device_id', device_id);
                formData.append('below_85', $('#below_85').val());
                formData.append('step', 4);
                submitAjax(formData);
            })

            $('#btn5').click(function() {
                var formData = new FormData();
                formData.append('device_id', device_id);
                formData.append('screen_fine_traces', $('#screen_fine_traces').val());
                formData.append('screen_visible_marks', $('#screen_visible_marks').val());
                formData.append('screen_very_visible_marks', $('#screen_very_visible_marks').val());
                formData.append('step', 5);
                submitAjax(formData);
            })

            $('#btn6').click(function() {
                var formData = new FormData();
                formData.append('device_id', device_id);
                formData.append('back_side_fine_traces', $('#back_side_fine_traces').val());
                formData.append('back_side_visible_marks', $('#back_side_visible_marks').val());
                formData.append('back_side_very_visible_marks', $('#back_side_very_visible_marks').val());
                formData.append('step', 6);
                submitAjax(formData);
            })

        });

        function submitAjax(data) {
            $.ajax({
                url: '/device/update/'+"{{$device->id}}",
                method: 'POST',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (data.get('step') == 1) {
                        device_id = response.device.id;
                    }
                },
                error: function(xhr) {
                    // Handle the error
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
@endsection
