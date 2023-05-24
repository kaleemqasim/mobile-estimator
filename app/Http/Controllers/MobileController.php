<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceType;
use App\Models\Estimation;
use App\Models\DeviceColor;
use App\Models\DeviceHealth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ScreenProblem;
use App\Models\DeviceCapacity;
use App\Models\BackSideProblem;
use App\Models\EstimateSetting;

class MobileController extends Controller
{
    public function index() {
        return view('mobile_estimator.index');
    }

    public function devices($device_type) {
        $devices = Device::whereHas('device_type', function($innerQuery) use($device_type){
            return $innerQuery->where('device_name', $device_type);
         })->get();
        return view('mobile_estimator.devices', compact('devices'));
    }

     public function estimator($device_id) {
         $device = Device::where('id', $device_id)->with(['capacity', 'color','device_health','screen_problem','back_side_probem'])->first();
         $settings = EstimateSetting::pluck('value', 'name')->toArray();
         return view('mobile_estimator.estimator', compact('device', 'settings'));
     }

    public function store_estimation(Request $request) {
        $data = $this->mapEstimationsToTable($request);
        Estimation::create($data);
        return response()->json(['status' => 'success', 'message' => 'Estimation saved successfully'], 201);
    }



    // some helper methods related to estimations
    public function mapEstimationsToTable($request) {
        return [
            'device_name' => $request->device_name,
            'estimated_price' => $request->estimated_price,
            'color' => $request->color,
            'battery_test' => $request->battery_test,
            'screen_test' => $request->screen_test,
            'back_side_test' => $request->back_side_test,
            'purchase_test' => $request->purchase_test,
            'person_name' => $request->person_name,
            'person_contact_no' => $request->person_contact_no,
            'person_email' => $request->person_email,
        ];
    }

    public function addDevice()
    {
        $device_types = DeviceType::all();

        return view('admin.create',compact('device_types'));
    }

    public function storeDevice(Request $request)
    {
        try {
            if($request->step == 1){
                $data['name'] = $request->name;
                $data['device_type_id'] = $request->device_type_id;
                $data['main_price'] = $request->main_price;
                $imageName = "";
                if ($request->hasFile('picture')) {
                    $image = $request->file('picture');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads'), $imageName);
                }
                $data['picture'] = $imageName;
                $device = Device::create($data);
                return response()->json(['device' => $device]);
            } elseif($request->step == 2) {
                $colors = $request->except(['device_id', 'step']);
                $color_object = [];
                foreach($colors as $key=>$color) {
                    $color_object[$key] = 1;
                }
                $color_object['device_id'] = $request->device_id;
                DeviceColor::updateOrCreate(['device_id' => $request->device_id], $color_object);
            }elseif($request->step == 3) {
                $capicity_object['device_id'] = $request->device_id;
                $capicity_object['capacity_8gb'] = $request->capacity_8gb;
                $capicity_object['capacity_16gb'] = $request->capacity_16gb;
                $capicity_object['capacity_32gb'] = $request->capacity_32gb;
                $capicity_object['capacity_64gb'] = $request->capacity_64gb;
                $capicity_object['capacity_128gb'] = $request->capacity_128gb;
                $capicity_object['capacity_256gb'] = $request->capacity_256gb;
                $capicity_object['capacity_512gb'] = $request->capacity_512gb;
                $capicity_object['capacity_1tb'] = $request->capacity_1tb;

//                DeviceCapacity::create($capicity_object);
                DeviceCapacity::updateOrCreate(['device_id' => $request->device_id], $capicity_object);
            }
        elseif($request->step == 4) {
            $health_object['device_id'] = $request->device_id;
            $health_object['above_85'] = 0;
            $health_object['below_85'] = $request->below_85;

//            DeviceHealth::create($health_object);
            DeviceHealth::updateOrCreate(['device_id' => $request->device_id], $health_object);
        }
        elseif($request->step == 5) {
            $screen_object['device_id'] = $request->device_id;
            $screen_object['screen_fine_traces'] = $request->screen_fine_traces;
            $screen_object['screen_visible_marks'] = $request->screen_visible_marks;
            $screen_object['screen_very_visible_marks'] = $request->screen_very_visible_marks;

//            ScreenProblem::create($screen_object);
            ScreenProblem::updateOrCreate(['device_id' => $request->device_id], $screen_object);
        }
        elseif($request->step == 6) {
            $back_side_object['device_id'] = $request->device_id;
            $back_side_object['back_side_fine_traces'] = $request->back_side_fine_traces;
            $back_side_object['back_side_visible_marks'] = $request->back_side_visible_marks;
            $back_side_object['back_side_very_visible_marks'] = $request->back_side_very_visible_marks;

//            BackSideProblem::create($back_side_object);
            BackSideProblem::updateOrCreate(['device_id' => $request->device_id], $back_side_object);
            Device::where('id', $request->device_id)->update(['is_active' => 1]);
        }
        } catch(\Exception $e) {
            info('======');
            info($e->getMessage());
        }

    }

    public function adminDevices()
    {
        $devices = Device::get();
        return view('admin.index', compact('devices'));
    }

    public function editDevice($id)
    {
        $device = Device::where('id', $id)->with(['color', 'device_health', 'screen_problem', 'back_side_probem'])->first();
        $device_types = DeviceType::all();
        return view('admin.edit', compact('device', 'device_types'));
    }

    public function updateDevice(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        try {
            if($request->step == 1){
                $data = $request->only(['name', 'device_type_id', 'main_price']);

                $data = array_filter($data, function ($value) {
                    return $value !== '' && $value != null;
                });

                if ($request->hasFile('picture')) {
                    $image = $request->file('picture');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads'), $imageName);
                    $data['picture'] = $imageName;
                }

                $device->fill($data);
                $device->save();
            } elseif($request->step == 2) {
                $colors = $request->except(['device_id', 'step']);
                $color_object = [
                    'color_red' => '0',
                    'color_black' => '0',
                    'color_white' => '0',
                    'color_silver' => '0',
                    'color_gold' => '0',
                    'color_blue' => '0',
                    'color_grey' => '0',
                    'color_green' => '0',
                    'color_purple' => '0',
                    'color_pink' => '0'
                ];
                foreach($colors as $key=>$color) {
                    $color_object[$key] = 1;
                }
                DeviceColor::where('device_id', $id)->update($color_object);
            }elseif($request->step == 3) {
                $capicity_object['capacity_8gb'] = $request->capacity_8gb;
                $capicity_object['capacity_16gb'] = $request->capacity_16gb;
                $capicity_object['capacity_32gb'] = $request->capacity_32gb;
                $capicity_object['capacity_64gb'] = $request->capacity_64gb;
                $capicity_object['capacity_128gb'] = $request->capacity_128gb;
                $capicity_object['capacity_256gb'] = $request->capacity_256gb;
                $capicity_object['capacity_512gb'] = $request->capacity_512gb;
                $capicity_object['capacity_1tb'] = $request->capacity_1tb;

                DeviceCapacity::where('device_id', $id)->update($capicity_object);
            }
            elseif($request->step == 4) {
                $health_object['below_85'] = $request->below_85;

                DeviceHealth::where('device_id', $id)->update($health_object);
            }
            elseif($request->step == 5) {
                $screen_object['screen_fine_traces'] = $request->screen_fine_traces;
                $screen_object['screen_visible_marks'] = $request->screen_visible_marks;
                $screen_object['screen_very_visible_marks'] = $request->screen_very_visible_marks;

                ScreenProblem::where('device_id', $id)->update($screen_object);
            }
            elseif($request->step == 6) {
                $back_side_object['back_side_fine_traces'] = $request->back_side_fine_traces;
                $back_side_object['back_side_visible_marks'] = $request->back_side_visible_marks;
                $back_side_object['back_side_very_visible_marks'] = $request->back_side_very_visible_marks;

                BackSideProblem::where('device_id', $id)->update($back_side_object);
                Device::where('id', $request->device_id)->update(['is_active' => 1]);
            }

            return response()->json(['device' => $device]);
        } catch(\Exception $e) {
            info('======');
            info($e->getMessage());
        }

    }
}
