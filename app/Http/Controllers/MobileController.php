<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\EstimateSetting;
use App\Models\Estimation;
use Illuminate\Http\Request;

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
}
