<?php
// app\Http\Controllers\Sitrep\SitrepController.php

namespace App\Http\Controllers\Sitrep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
// use App\Models\Division;
// use App\Models\Complaint;
// use App\Models\Complaint_status;
// use App\Models\User;
// use App\Models\Admin;
use App\Models\Crime_type;
use App\Models\State;
// use App\Models\LGA;
use App\Models\City;
use App\Models\Reporting_agency;
use App\Models\Sitrep;
use App\Models\Sitrep_Detail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon; 
// use Illuminate\Support\Facades\Auth as FacadesAuth;
use DB;
// use App\Http\Controllers\CAL_MONTH_GREGORIAN_SHORT;

class SitrepController extends Controller
{
    

   

    public function index()
    {
        $states = State::all();
        return view('sitrep.sitrep.index', compact('states'));
    }

    public function getCities(Request $request)
    {
        $stateId = $request->input('state_id');
        $cities = City::where('state_id', $stateId)->get();
        return response()->json($cities);
    }

    public function StateAddSitrep() {
        // GET THE ID OFTHE STATER
        $state_id = Auth::user()->state; 
        //$cities = City::where('state_id', $state_id)->get();
        $lgas = DB::table("cities")->where('id','>',0)->where('state_id', $state_id)->get();       
        $states = DB::table("states")->where('id', $state_id)->get();       
        // dd($states);
        $reporting_agency_id = Auth::user(); 
        $reporting_agencies = Reporting_agency::where('id','>',0)->orderBy('id')->get();
        $crime_types = Crime_type::all();
        // $states = State::all();
        // dd($state_id);
        return view('sitrep.sitrep.state_add_sitrep', compact('crime_types','states','state_id','lgas','reporting_agencies'))->with('error','Sitrep Added Successfully');;
    } //end method add_sitrep 

     public function AdminAddSitrep() {
        $reporting_agency_id = Auth::user(); 
        $reporting_agencies = Reporting_agency::where('id','>',0)->orderBy('id')->get();
        $states = DB::table("state")->pluck('name','id');        
        $crime_types = Crime_type::all();
        $states = State::all();
        // dd($states);
        return view('sitrep.sitrep.admin_add_sitrep', compact('crime_types','states','reporting_agencies'));
    } //end method add_sitrep 

    public function AdminSubmitSitrep(Request $request)
    {
        //  dd($request->all());

        $state = state::find($request->state);
        $lga = city::find($request->city);
        $state =$state->name;
        $lga =$lga->name;

        $user_id = Auth::user()->id; 
        $sitrep_id = time();
        $incident_date = $request->incident_date;
        $sitrep_details= new Sitrep_Detail();
        $sitrep_details->user_id =  $user_id; 
        $sitrep_details->state_id =  $state; 
        $sitrep_details->sitrep_id = $sitrep_id;
        $sitrep_details->incident_date = $request->incident_date;
        $sitrep_details->crime_description=$request->crime_description;
        $sitrep_details->police_action=$request->police_action;
        $sitrep_details->reporting_agency=$request->reporting_agency;
        $sitrep_details->incident_level=$request->incident_level;
        $sitrep_details->save();

       
        for ($a = 0; $a < count($request->crime_type); $a++)
        {
            if ($request->state == 28 || $request->state == 31 || $request->state == 25 || $request->state == 29 || $request->state == 13 || $request->state == 30) {  $geo_zone = 'South West';  }
            if ($request->state == 1 || $request->state == 17 || $request->state == 14 || $request->state == 4 || $request->state == 11 ) {  $geo_zone = 'South East';  }   
            if ($request->state == 12 || $request->state == 6 || $request->state == 10 || $request->state == 3 || $request->state == 9 || $request->state == 33) {  $geo_zone = 'South South';  }
            if ($request->state == 20 || $request->state == 18 || $request->state == 21 || $request->state == 22 || $request->state == 37 || $request->state == 34 || $request->state == 19) {  $geo_zone = 'North West';  }
            if ($request->state == 2 || $request->state == 35 || $request->state == 16 || $request->state == 5 || $request->state == 8 || $request->state == 36) {  $geo_zone = 'North East';  }
            if ($request->state == 26 || $request->state == 7 || $request->state == 32 || $request->state == 15 || $request->state == 27 || $request->state == 23 || $request->state == 24 ) {  $geo_zone = 'North Central';  }       
             
            $answers[] = [
                'user_id' => $user_id,
                'sitrep_id' => $sitrep_id,
                'incident_time' => $request->incident_time,               
                'incident_date' => $request->incident_date,               
                'incident_level' => $request->incident_level,
                'crime_type' => $request->crime_type[$a],
                'number_incident' => $request->number_incidents[$a],
                'number_victims' => $request->number_victims[$a], 
                'number_victims_injured' => $request->number_victims_injured[$a], 
                'number_victims_rescused' => $request->number_victims_rescused[$a], 
                'number_casualties' => $request->number_victim_casualties[$a], 
                'number_arrest' => $request->number_arrests[$a], 
                'suspect_casualties' => $request->suspect_casualties[$a], 
                'number_firearms' => $request->number_firearms[$a], 
                'number_dane_gun' => $request->number_dane_gun[$a], 
                'number_ammunition' => $request->number_ammunition[$a], 
                'number_caterages' => $request->number_caterages[$a], 
                'number_vehicle' => $request->number_vehicle[$a], 
                'number_others' => $request->number_others[$a], 
                'remarks' => $request->remarks[$a], 
                'reporting_agency' => $request->reporting_agency, 
                'police_casualties' => $request->police_casualties[$a], 
                'operative_casualties' => $request->operative_casualties[$a],
                'state_id' => $state, 
                'lga' => $lga, 
                'location' => $request->location,
                'geo_zone' => $geo_zone,
            ];
        }
        $sitrep_dinsert = Sitrep::insert($answers);


        $yesterday_date=Carbon::now(-24)->toDateTimeString(); // now(-6) this will subtract four hours from hours of reporting            
        $yesterday_date = date('Y-m-d', strtotime($yesterday_date));
        $police_division = $user_id; //USE police_division INSTEAD OF id
        $sitrep_details = Sitrep_Detail::where('sitrep_id','=',$sitrep_id)
                                        ->where('incident_date','=',$incident_date)
                                        ->limit(1)->get();
        // return redirect()->route('admin.add_sitrep',['id' => $sitrep_id])->with('error','Sitrep Added Successfully');
        return redirect()->route('view.ioo.sitrep');

    }// End of submit_sitrep Method

    public function StateSubmitSitrep(Request $request)
    {
        // dd($request->all());

        $state = state::find($request->state);
        $lga = city::find($request->city);
        // $state = $request->state; 
        $state = $request->state2; 
        $lga = $request->city; 
        // dd($lga);

        $user_id = Auth::user()->id; 
        $sitrep_id = time();
        $incident_date = $request->incident_date;

        $sitrep_details= new Sitrep_Detail();
        $sitrep_details->user_id =  $user_id; 
        $sitrep_details->state_id =  $state; 
        $sitrep_details->sitrep_id = $sitrep_id;
        $sitrep_details->incident_date = $request->incident_date;
        $sitrep_details->crime_description=$request->crime_description;
        $sitrep_details->police_action=$request->police_action;
        $sitrep_details->reporting_agency=$request->reporting_agency;
        $sitrep_details->incident_level=$request->incident_level;
        $sitrep_details->save();

       
        for ($a = 0; $a < count($request->crime_type); $a++)
        {
            if ($request->state == 28 || $request->state == 31 || $request->state == 25 || $request->state == 29 || $request->state == 13 || $request->state == 30) {  $geo_zone = 'South West';  }
            if ($request->state == 1 || $request->state == 17 || $request->state == 14 || $request->state == 4 || $request->state == 11 ) {  $geo_zone = 'South East';  }   
            if ($request->state == 12 || $request->state == 6 || $request->state == 10 || $request->state == 3 || $request->state == 9 || $request->state == 33) {  $geo_zone = 'South South';  }
            if ($request->state == 20 || $request->state == 18 || $request->state == 21 || $request->state == 22 || $request->state == 37 || $request->state == 34 || $request->state == 19) {  $geo_zone = 'North West';  }
            if ($request->state == 2 || $request->state == 35 || $request->state == 16 || $request->state == 5 || $request->state == 8 || $request->state == 36) {  $geo_zone = 'North East';  }
            if ($request->state == 26 || $request->state == 7 || $request->state == 32 || $request->state == 15 || $request->state == 27 || $request->state == 23 || $request->state == 24 ) {  $geo_zone = 'North Central';  }       
        // dd($geo_zone);
     
            $answers[] = [
                'user_id' => $user_id,
                'sitrep_id' => $sitrep_id,
                'incident_time' => $request->incident_time,               
                'incident_date' => $request->incident_date,               
                'incident_level' => $request->incident_level,
                'crime_type' => $request->crime_type[$a],
                'number_incident' => $request->number_incidents[$a],
                'number_victims' => $request->number_victims[$a], 
                'number_victims_injured' => $request->number_victims_injured[$a], 
                'number_victims_rescused' => $request->number_victims_rescused[$a], 
                'number_casualties' => $request->number_victim_casualties[$a], 
                'number_arrest' => $request->number_arrests[$a], 
                'suspect_casualties' => $request->suspect_casualties[$a], 
                'number_firearms' => $request->number_firearms[$a], 
                'number_dane_gun' => $request->number_dane_gun[$a], 
                'number_ammunition' => $request->number_ammunition[$a], 
                'number_caterages' => $request->number_caterages[$a], 
                'number_vehicle' => $request->number_vehicle[$a], 
                'number_others' => $request->number_others[$a], 
                'remarks' => $request->remarks[$a], 
                'reporting_agency' => $request->reporting_agency, 
                'police_casualties' => $request->police_casualties[$a], 
                'operative_casualties' => $request->operative_casualties[$a],
                'state_id' => $state,
                'lga' => $lga,
                'location' => $request->location,
                'geo_zone' => $geo_zone,
            ];
        }
        $sitrep_dinsert = Sitrep::insert($answers);


        $yesterday_date=Carbon::now(-24)->toDateTimeString(); // now(-6) this will subtract four hours from hours of reporting            
        $yesterday_date = date('Y-m-d', strtotime($yesterday_date));
        $police_division = $user_id; //USE police_division INSTEAD OF id
        $sitrep_details = Sitrep_Detail::where('sitrep_id','=',$sitrep_id)
                                        ->where('incident_date','=',$incident_date)
                                        ->limit(1)->get();
        // return redirect()->route('admin.add_sitrep',['id' => $sitrep_id])->with('error','Sitrep Added Successfully');
        // return redirect()->route('view.ioo.sitrep');
        return redirect()->route('view.ioo_state.sitrep');

    }// End of submit_sitrep Method

    public function ViewSitrep( Request $request) 
    {
        
        $sitreps = Sitrep::select(DB::raw(" * "))
        //->whereBetween('incident_date', '')
        ->where('remarks','=',1)
        ->limit(100)
        ->orderBy('id','DESC')
        ->get(); 
        // dd($sitreps);
        $info = 'Most Recent Sitrep'; 
        return view('sitrep.sitrep.view_100_sitreps', compact('info','sitreps'))->with('error','Sitrep Added Successfully');
    } 

    // public function ViewStateSitrep( Request $request) 
    // {
    //     $state_id = Auth::user()->state; 
    //     $state = State::find($state_id)->name;
    //     // dd($state);

    //     $sitreps = Sitrep::select(DB::raw(" * "))
    //     //->whereBetween('incident_date', '')
    //     ->where('remarks','=',1)
    //     ->where('state_id',$state)
    //     ->where('created_at',date('Y-m-d', strtotime('-1 day'))) // less than 24 hours
    //     ->limit(100)
    //     ->orderBy('id','DESC')
    //     ->get(); 
    //     // dd($sitreps);
    //     $info = 'Most Recent Sitrep'; 
    //     return view('sitrep.sitrep.view_state_100_sitreps', compact('info','sitreps'))->with('error','Sitrep Added Successfully');
    // } 

    public function ViewStateSitrep(Request $request) 
    {
        $state_id = Auth::user()->state; 
        $state = State::find($state_id)->name;
        // dd($state);

        // Get the timestamp for 24 hours ago
        $twentyFourHoursAgo = Carbon::now()->subHours(24);

        $sitreps = Sitrep::select(DB::raw(" * "))
            ->where('remarks', '=', 1)
            ->where('state_id', $state)
            ->where('created_at', '>=', $twentyFourHoursAgo) // Records created in the last 24 hours
            ->limit(100)
            ->orderBy('id', 'DESC')
            ->get(); 
        
        // dd($sitreps);
        $info = 'Most Recent Sitrep (Last 24 Hours)'; 
        return view('sitrep.sitrep.view_state_100_sitreps', compact('info','sitreps'))->with('error','Sitrep Added Successfully');
    }

    public function EditSitrep($id) {
        $sitreps = Sitrep::find($id);
        $sitrep_details = Sitrep_Detail::where('sitrep_id', '=', $sitreps->sitrep_id)->get();
        $reporting_agencies = Reporting_agency::where('id','>',0)->orderBy('agency_name')->get();
        $crime_types = Crime_type::all();
        $states = State::all();
        // $states = DB::table("state")->pluck('name','id');        
        return view('sitrep.sitrep.admin_edit_sitrep', compact('states','crime_types', 'sitreps', 'sitrep_details','reporting_agencies'));
    } //end method edit_sitrep 

    
    public function StateEditSitrep($id) {
        $sitreps = Sitrep::find($id);
        $sitrep_details = Sitrep_Detail::where('sitrep_id', '=', $sitreps->sitrep_id)->get();
        $reporting_agencies = Reporting_agency::where('id','>',0)->orderBy('agency_name')->get();
        $crime_types = Crime_type::all();
        $state_id = Auth::user()->state; 
        $states = State::find($state_id)->name;
        $lgas = DB::table("cities")->where('id','>',0)->where('state_id', $state_id)->get();       
        // dd($states);
        //$states = State::all();
        // $states = DB::table("state")->pluck('name','id');        
        // $lgas = DB::table("cities")->where('id','>',0)->where('state_id', $state_id)->get();       
        return view('sitrep.sitrep.state_edit_sitrep', compact('lgas','states','state_id','crime_types', 'sitreps', 'sitrep_details','reporting_agencies'));
    } //end method edit_sitrep 

    public function UpdateSitrep(Request $request)
    {
        // dd($request->crime_type);
        // dd($request->all());
        // dd($request->sitrep_id);
        // $sitrep_details->state_id=$request->state;
        $user_id = Auth::user()->id; 
        $sitrep_id = time();
        $sitrep_details= Sitrep_Detail::find($request->sid);
        $sitrep_details->incident_date = $request->incident_date;
        $sitrep_details->crime_description=$request->crime_description;
        $sitrep_details->police_action=$request->police_action;
        $sitrep_details->reporting_agency=$request->reporting_agency;
        $sitrep_details->sitrep_id=$sitrep_id;
        $sitrep_details->save(); 
        // dd($request->crime_type);
        // First, delete all existing crime type entries for this sitrep

        $collection = collect($request->crime_type); // Converts to collection
        $count = $collection->count();

        
        Sitrep::where('sitrep_id', $request->sitrep_id)->delete();
        

        // dd($request->sitrep_id);
        // if ($request->state == 'Ogun' || $request->state == 'Oyo' || $request->state == 'Lagos' || $request->state == 'Ondo' || $request->state == 'Ekiti' || $request->state == 'Osun') {  $geo_zone = 'South West';  }
        // if ($request->state == 'Abia' || $request->state == 'Imo' || $request->state == 'Enugu' || $request->state == 'Anambra' || $request->state == 'Ebonyi') {  $geo_zone = 'South East';  }   
        // if ($request->state == 'Edo' || $request->state == 'Bayelsa' || $request->state == 'Delta' || $request->state == 'AkwaIbom' || $request->state == 'Cross River' || $request->state == 'Rivers') {  $geo_zone = 'South South';  }
        // if ($request->state == 'Kano' || $request->state == 'Jigawa' || $request->state == 'Katsina' || $request->state == 'Kebbi' || $request->state == 'Zamfara' || $request->state == 'Sokoto' || $request->state == 'Kaduna') {  $geo_zone = 'North West';  }
        // if ($request->state == 'Adamawa' || $request->state == 'Taraba' || $request->state == 'Gombe' || $request->state == 'Bauchi' || $request->state == 'Borno' || $request->state == 'Yobe') {  $geo_zone = 'North East';  }
        // if ($request->state == 'Nasarawa' || $request->state == 'Benue' || $request->state == 'Plateau' || $request->state == 'FCT' || $request->state == 'Niger' || $request->state == 'Kogi' || $request->state == 'Kwara') {  $geo_zone = 'North Central';  }       
        
        // if ($request->state == 28 || $request->state == 31 || $request->state == 25 || $request->state == 29 || $request->state == 13 || $request->state == 30) {  $geo_zone = 'South West';  }
        // if ($request->state == 1 || $request->state == 17 || $request->state == 14 || $request->state == 4 || $request->state == 11 ) {  $geo_zone = 'South East';  }   
        // if ($request->state == 12 || $request->state == 6 || $request->state == 10 || $request->state == 3 || $request->state == 9 || $request->state == 33) {  $geo_zone = 'South South';  }
        // if ($request->state == 20 || $request->state == 18 || $request->state == 21 || $request->state == 22 || $request->state == 37 || $request->state == 34 || $request->state == 19) {  $geo_zone = 'North West';  }
        // if ($request->state == 2 || $request->state == 35 || $request->state == 16 || $request->state == 5 || $request->state == 8 || $request->state == 36) {  $geo_zone = 'North East';  }
        // if ($request->state == 26 || $request->state == 7 || $request->state == 32 || $request->state == 15 || $request->state == 27 || $request->state == 23 || $request->state == 24 ) {  $geo_zone = 'North Central';  }       
      
        //dd($geo_zone);

        for ($a = 0; $a < count($request->number_incidents); $a++)
        {
            if ($request->state == 'Ogun' || $request->state == 'Oyo' || $request->state == 'Lagos' || $request->state == 'Ondo' || $request->state == 'Ekiti' || $request->state == 'Osun') {  $geo_zone = 'South West';  }
            if ($request->state == 'Abia' || $request->state == 'Imo' || $request->state == 'Enugu' || $request->state == 'Anambra' || $request->state == 'Ebonyi') {  $geo_zone = 'South East';  }   
            if ($request->state == 'Edo' || $request->state == 'Bayelsa' || $request->state == 'Delta' || $request->state == 'AkwaIbom' || $request->state == 'Cross River' || $request->state == 'Rivers') {  $geo_zone = 'South South';  }
            if ($request->state == 'Kano' || $request->state == 'Jigawa' || $request->state == 'Katsina' || $request->state == 'Kebbi' || $request->state == 'Zamfara' || $request->state == 'Sokoto' || $request->state == 'Kaduna') {  $geo_zone = 'North West';  }
            if ($request->state == 'Adamawa' || $request->state == 'Taraba' || $request->state == 'Gombe' || $request->state == 'Bauchi' || $request->state == 'Borno' || $request->state == 'Yobe') {  $geo_zone = 'North East';  }
            if ($request->state == 'Nasarawa' || $request->state == 'Benue' || $request->state == 'Plateau' || $request->state == 'FCT' || $request->state == 'Niger' || $request->state == 'Kogi' || $request->state == 'Kwara') {  $geo_zone = 'North Central';  }       
            if ($request->state == 28 || $request->state == 31 || $request->state == 25 || $request->state == 29 || $request->state == 13 || $request->state == 30) {  $geo_zone = 'South West';  }
            if ($request->state == 1 || $request->state == 17 || $request->state == 14 || $request->state == 4 || $request->state == 11 ) {  $geo_zone = 'South East';  }   
            if ($request->state == 12 || $request->state == 6 || $request->state == 10 || $request->state == 3 || $request->state == 9 || $request->state == 33) {  $geo_zone = 'South South';  }
            if ($request->state == 20 || $request->state == 18 || $request->state == 21 || $request->state == 22 || $request->state == 37 || $request->state == 34 || $request->state == 19) {  $geo_zone = 'North West';  }
            if ($request->state == 2 || $request->state == 35 || $request->state == 16 || $request->state == 5 || $request->state == 8 || $request->state == 36) {  $geo_zone = 'North East';  }
            if ($request->state == 26 || $request->state == 7 || $request->state == 32 || $request->state == 15 || $request->state == 27 || $request->state == 23 || $request->state == 24 ) {  $geo_zone = 'North Central';  }       
          
            $answers[] = [
                'user_id' => $user_id,
                'sitrep_id' => $sitrep_id,
                'incident_time' => $request->incident_time,               
                'incident_date' => $request->incident_date,               
                'incident_level' => $request->incident_level,
                'crime_type' => $request->crime_type[$a],
                'number_incident' => $request->number_incidents[$a],
                'number_victims' => $request->number_victims[$a], 
                'number_victims_injured' => $request->number_victims_injured[$a], 
                'number_victims_rescused' => $request->number_victims_rescused[$a], 
                'number_casualties' => $request->number_victim_casualties[$a], 
                'number_arrest' => $request->number_arrests[$a], 
                'suspect_casualties' => $request->suspect_casualties[$a], 
                'number_firearms' => $request->number_firearms[$a], 
                'number_dane_gun' => $request->number_dane_gun[$a], 
                'number_ammunition' => $request->number_ammunition[$a], 
                'number_caterages' => $request->number_caterages[$a], 
                'number_vehicle' => $request->number_vehicle[$a], 
                'number_others' => $request->number_others[$a], 
                'remarks' => $request->remarks[$a], 
                'reporting_agency' => $request->reporting_agency, 
                'police_casualties' => $request->police_casualties[$a], 
                'operative_casualties' => $request->operative_casualties[$a],
                'state_id' => $request->state, 
                'lga' => $request->city, 
                'location' => $request->location,
               // 'geo_zone' => $geo_zone,
            ];
        }
        $sitrep_dinsert = Sitrep::insert($answers);


        $sitreps = Sitrep::select(DB::raw(" * "))
        //->whereBetween('incident_date', '')
        ->where('remarks','=',1)
        ->limit(100)
        ->orderBy('id','DESC')
        ->get(); 
        // dd($sitreps);
        $info = 'Most Recent Sitrep'; 
        return view('sitrep.sitrep.view_100_sitreps', compact('info','sitreps'))->with('error','Sitrep Added Successfully');


                
        // return redirect()->route('admin.edit.sitrep',['id' => $request->id])->with('error','Sitrep Updated Successfully');  
        // return redirect()->route('view.all.sitrep');
        return view('sitrep.sitrep.view_100_sitreps');
        // return redirect()->route('view.ioo_sitrep');
        // return view('sitrep2.view_100_sitreps', compact('info','sitreps'))->with('error','Sitrep Updated Successfully');
    }// End of edit_sitrep Method 

    public function StateUpdateSitrep(Request $request)
    {
        // dd($request->crime_type);
        // dd($request->all());
        // dd($request->sitrep_id);
        // $sitrep_details->state_id=$request->state;
        $user_id = Auth::user()->id; 
        $sitrep_id = time();
        $sitrep_details= Sitrep_Detail::find($request->sid);
        $sitrep_details->incident_date = $request->incident_date;
        $sitrep_details->crime_description=$request->crime_description;
        $sitrep_details->police_action=$request->police_action;
        $sitrep_details->reporting_agency=$request->reporting_agency;
        $sitrep_details->sitrep_id=$sitrep_id;
        $sitrep_details->save(); 
        // dd($request->crime_type);
        // First, delete all existing crime type entries for this sitrep

        $collection = collect($request->crime_type); // Converts to collection
        $count = $collection->count();

        
        Sitrep::where('sitrep_id', $request->sitrep_id)->delete();
        

        // dd($request->sitrep_id);
        // if ($request->state == 'Ogun' || $request->state == 'Oyo' || $request->state == 'Lagos' || $request->state == 'Ondo' || $request->state == 'Ekiti' || $request->state == 'Osun') {  $geo_zone = 'South West';  }
        // if ($request->state == 'Abia' || $request->state == 'Imo' || $request->state == 'Enugu' || $request->state == 'Anambra' || $request->state == 'Ebonyi') {  $geo_zone = 'South East';  }   
        // if ($request->state == 'Edo' || $request->state == 'Bayelsa' || $request->state == 'Delta' || $request->state == 'AkwaIbom' || $request->state == 'Cross River' || $request->state == 'Rivers') {  $geo_zone = 'South South';  }
        // if ($request->state == 'Kano' || $request->state == 'Jigawa' || $request->state == 'Katsina' || $request->state == 'Kebbi' || $request->state == 'Zamfara' || $request->state == 'Sokoto' || $request->state == 'Kaduna') {  $geo_zone = 'North West';  }
        // if ($request->state == 'Adamawa' || $request->state == 'Taraba' || $request->state == 'Gombe' || $request->state == 'Bauchi' || $request->state == 'Borno' || $request->state == 'Yobe') {  $geo_zone = 'North East';  }
        // if ($request->state == 'Nasarawa' || $request->state == 'Benue' || $request->state == 'Plateau' || $request->state == 'FCT' || $request->state == 'Niger' || $request->state == 'Kogi' || $request->state == 'Kwara') {  $geo_zone = 'North Central';  }       
        
        // if ($request->state == 28 || $request->state == 31 || $request->state == 25 || $request->state == 29 || $request->state == 13 || $request->state == 30) {  $geo_zone = 'South West';  }
        // if ($request->state == 1 || $request->state == 17 || $request->state == 14 || $request->state == 4 || $request->state == 11 ) {  $geo_zone = 'South East';  }   
        // if ($request->state == 12 || $request->state == 6 || $request->state == 10 || $request->state == 3 || $request->state == 9 || $request->state == 33) {  $geo_zone = 'South South';  }
        // if ($request->state == 20 || $request->state == 18 || $request->state == 21 || $request->state == 22 || $request->state == 37 || $request->state == 34 || $request->state == 19) {  $geo_zone = 'North West';  }
        // if ($request->state == 2 || $request->state == 35 || $request->state == 16 || $request->state == 5 || $request->state == 8 || $request->state == 36) {  $geo_zone = 'North East';  }
        // if ($request->state == 26 || $request->state == 7 || $request->state == 32 || $request->state == 15 || $request->state == 27 || $request->state == 23 || $request->state == 24 ) {  $geo_zone = 'North Central';  }       
      
        //dd($geo_zone);

        for ($a = 0; $a < count($request->number_incidents); $a++)
        {
            if ($request->state == 'Ogun' || $request->state == 'Oyo' || $request->state == 'Lagos' || $request->state == 'Ondo' || $request->state == 'Ekiti' || $request->state == 'Osun') {  $geo_zone = 'South West';  }
            if ($request->state == 'Abia' || $request->state == 'Imo' || $request->state == 'Enugu' || $request->state == 'Anambra' || $request->state == 'Ebonyi') {  $geo_zone = 'South East';  }   
            if ($request->state == 'Edo' || $request->state == 'Bayelsa' || $request->state == 'Delta' || $request->state == 'AkwaIbom' || $request->state == 'Cross River' || $request->state == 'Rivers') {  $geo_zone = 'South South';  }
            if ($request->state == 'Kano' || $request->state == 'Jigawa' || $request->state == 'Katsina' || $request->state == 'Kebbi' || $request->state == 'Zamfara' || $request->state == 'Sokoto' || $request->state == 'Kaduna') {  $geo_zone = 'North West';  }
            if ($request->state == 'Adamawa' || $request->state == 'Taraba' || $request->state == 'Gombe' || $request->state == 'Bauchi' || $request->state == 'Borno' || $request->state == 'Yobe') {  $geo_zone = 'North East';  }
            if ($request->state == 'Nasarawa' || $request->state == 'Benue' || $request->state == 'Plateau' || $request->state == 'FCT' || $request->state == 'Niger' || $request->state == 'Kogi' || $request->state == 'Kwara') {  $geo_zone = 'North Central';  }       
            if ($request->state == 28 || $request->state == 31 || $request->state == 25 || $request->state == 29 || $request->state == 13 || $request->state == 30) {  $geo_zone = 'South West';  }
            if ($request->state == 1 || $request->state == 17 || $request->state == 14 || $request->state == 4 || $request->state == 11 ) {  $geo_zone = 'South East';  }   
            if ($request->state == 12 || $request->state == 6 || $request->state == 10 || $request->state == 3 || $request->state == 9 || $request->state == 33) {  $geo_zone = 'South South';  }
            if ($request->state == 20 || $request->state == 18 || $request->state == 21 || $request->state == 22 || $request->state == 37 || $request->state == 34 || $request->state == 19) {  $geo_zone = 'North West';  }
            if ($request->state == 2 || $request->state == 35 || $request->state == 16 || $request->state == 5 || $request->state == 8 || $request->state == 36) {  $geo_zone = 'North East';  }
            if ($request->state == 26 || $request->state == 7 || $request->state == 32 || $request->state == 15 || $request->state == 27 || $request->state == 23 || $request->state == 24 ) {  $geo_zone = 'North Central';  }       
          
            $answers[] = [
                'user_id' => $user_id,
                'sitrep_id' => $sitrep_id,
                'incident_time' => $request->incident_time,               
                'incident_date' => $request->incident_date,               
                'incident_level' => $request->incident_level,
                'crime_type' => $request->crime_type[$a],
                'number_incident' => $request->number_incidents[$a],
                'number_victims' => $request->number_victims[$a], 
                'number_victims_injured' => $request->number_victims_injured[$a], 
                'number_victims_rescused' => $request->number_victims_rescused[$a], 
                'number_casualties' => $request->number_victim_casualties[$a], 
                'number_arrest' => $request->number_arrests[$a], 
                'suspect_casualties' => $request->suspect_casualties[$a], 
                'number_firearms' => $request->number_firearms[$a], 
                'number_dane_gun' => $request->number_dane_gun[$a], 
                'number_ammunition' => $request->number_ammunition[$a], 
                'number_caterages' => $request->number_caterages[$a], 
                'number_vehicle' => $request->number_vehicle[$a], 
                'number_others' => $request->number_others[$a], 
                'remarks' => $request->remarks[$a], 
                'reporting_agency' => $request->reporting_agency, 
                'police_casualties' => $request->police_casualties[$a], 
                'operative_casualties' => $request->operative_casualties[$a],
                'state_id' => $request->state2, 
                'lga' => $request->city, 
                'location' => $request->location,
               // 'geo_zone' => $geo_zone,
            ];
        }
        $sitrep_dinsert = Sitrep::insert($answers);


        $sitreps = Sitrep::select(DB::raw(" * "))
        //->whereBetween('incident_date', '')
        ->where('remarks','=',1)
        ->limit(100)
        ->orderBy('id','DESC')
        ->get(); 
        // dd($sitreps);
        $info = 'Most Recent Sitrep'; 
        return view('sitrep.sitrep.view_state_100_sitreps', compact('info','sitreps'))->with('error','Sitrep Added Successfully');


                
        // return redirect()->route('admin.edit.sitrep',['id' => $request->id])->with('error','Sitrep Updated Successfully');  
        // return redirect()->route('view.all.sitrep');
        return view('sitrep.sitrep.view_100_sitreps');
        // return redirect()->route('view.ioo_sitrep');
        // return view('sitrep2.view_100_sitreps', compact('info','sitreps'))->with('error','Sitrep Updated Successfully');
    }// End of edit_sitrep Method 


    public function DailyReport(Request $request)
      {
        // dd($request->all());
                       
        $date_from = $request->date_from;
        $date_to = $request->date_from;
        $incident_date = $date_from;
        $incident_date2 = $date_from;

        // THIS CALCULATES THE TOTAL OF EACH INCIDENT
        $sitreps_state_group = Sitrep::select(DB::raw(" state_id,
            SUM(CASE WHEN crime_type = 1 THEN `number_incident` ELSE 0 END) AS crime1
            , SUM(CASE WHEN crime_type = 2 THEN `number_incident` ELSE 0 END) AS crime2
            , SUM(CASE WHEN crime_type = 3 THEN `number_incident` ELSE 0 END) AS crime3
            , SUM(CASE WHEN crime_type = 4 THEN `number_incident` ELSE 0 END) AS crime4
            , SUM(CASE WHEN crime_type = 5 THEN `number_incident` ELSE 0 END) AS crime5
            , SUM(CASE WHEN crime_type = 6 THEN `number_incident` ELSE 0 END) AS crime6
            , SUM(CASE WHEN crime_type = 7 THEN `number_incident` ELSE 0 END) AS crime7
            , SUM(CASE WHEN crime_type = 8 THEN `number_incident` ELSE 0 END) AS crime8
            , SUM(CASE WHEN crime_type = 9 THEN `number_incident` ELSE 0 END) AS crime9
            , SUM(CASE WHEN crime_type = 10 THEN `number_incident` ELSE 0 END) AS crime10
            , SUM(CASE WHEN crime_type = 11 THEN `number_incident` ELSE 0 END) AS crime11
            , SUM(CASE WHEN crime_type = 12 THEN `number_incident` ELSE 0 END) AS crime12
            , SUM(CASE WHEN crime_type = 13 THEN `number_incident` ELSE 0 END) AS crime13
            , SUM(CASE WHEN crime_type = 14 THEN `number_incident` ELSE 0 END) AS crime14
            , SUM(CASE WHEN crime_type = 15 THEN `number_incident` ELSE 0 END) AS crime15
            , SUM(CASE WHEN crime_type = 16 THEN `number_incident` ELSE 0 END) AS crime16
            , SUM(CASE WHEN crime_type = 17 THEN `number_incident` ELSE 0 END) AS crime17
            , SUM(CASE WHEN crime_type = 18 THEN `number_incident` ELSE 0 END) AS crime18
            , SUM(CASE WHEN crime_type = 19 THEN `number_incident` ELSE 0 END) AS crime19
            , SUM(CASE WHEN crime_type = 20 THEN `number_incident` ELSE 0 END) AS crime20
            , SUM(`number_incident`) as total_fireamrs"))
                ->where(function ($query) {
                    $query
                    ->where('crime_type','=',1)
                    ->orwhere('crime_type','=',2)
                    ->orwhere('crime_type','=',3)
                    ->orwhere('crime_type','=',4)
                    ->orwhere('crime_type','=',5)
                    ->orwhere('crime_type','=',6)
                    ->orwhere('crime_type','=',7)
                    ->orwhere('crime_type','=',8)
                    ->orwhere('crime_type','=',15)
                    ->orwhere('crime_type','=',17)
                    ->orwhere('crime_type','=',21);
                })
            ->whereBetween('incident_date', [$date_from, $date_to])
            ->groupBy('state_id')
            ->orderBy('state_id')
            ->get();
        
      
        // dd($sitreps_state_group);

               
        // THIS CALCULATES THE TOTAL OF EACH INCIDENT
        $sitreps_total = Sitrep::select(DB::raw(" 
            SUM(CASE WHEN crime_type = 1 THEN `number_incident` ELSE 0 END) AS crime1
            , SUM(CASE WHEN crime_type = 2 THEN `number_incident` ELSE 0 END) AS crime2
            , SUM(CASE WHEN crime_type = 3 THEN `number_incident` ELSE 0 END) AS crime3
            , SUM(CASE WHEN crime_type = 4 THEN `number_incident` ELSE 0 END) AS crime4
            , SUM(CASE WHEN crime_type = 5 THEN `number_incident` ELSE 0 END) AS crime5
            , SUM(CASE WHEN crime_type = 6 THEN `number_incident` ELSE 0 END) AS crime6
            , SUM(CASE WHEN crime_type = 7 THEN `number_incident` ELSE 0 END) AS crime7
            , SUM(CASE WHEN crime_type = 8 THEN `number_incident` ELSE 0 END) AS crime8
            , SUM(CASE WHEN crime_type = 9 THEN `number_incident` ELSE 0 END) AS crime9
            , SUM(CASE WHEN crime_type = 10 THEN `number_incident` ELSE 0 END) AS crime10
            , SUM(CASE WHEN crime_type = 11 THEN `number_incident` ELSE 0 END) AS crime11
            , SUM(CASE WHEN crime_type = 12 THEN `number_incident` ELSE 0 END) AS crime12
            , SUM(CASE WHEN crime_type = 13 THEN `number_incident` ELSE 0 END) AS crime13
            , SUM(CASE WHEN crime_type = 14 THEN `number_incident` ELSE 0 END) AS crime14
            , SUM(CASE WHEN crime_type = 15 THEN `number_incident` ELSE 0 END) AS crime15
            , SUM(CASE WHEN crime_type = 16 THEN `number_incident` ELSE 0 END) AS crime16
            , SUM(CASE WHEN crime_type = 17 THEN `number_incident` ELSE 0 END) AS crime17
            , SUM(CASE WHEN crime_type = 18 THEN `number_incident` ELSE 0 END) AS crime18
            , SUM(CASE WHEN crime_type = 19 THEN `number_incident` ELSE 0 END) AS crime19
            , SUM(CASE WHEN crime_type = 20 THEN `number_incident` ELSE 0 END) AS crime20
            , SUM(`number_incident`) as total_fireamrs"))
                ->where(function ($query) {
                    $query
                    ->where('crime_type','=',1)
                    ->orwhere('crime_type','=',2)
                    ->orwhere('crime_type','=',3)
                    ->orwhere('crime_type','=',4)
                    ->orwhere('crime_type','=',5)
                    ->orwhere('crime_type','=',6)
                    ->orwhere('crime_type','=',7)
                    ->orwhere('crime_type','=',8)
                    ->orwhere('crime_type','=',15)
                    ->orwhere('crime_type','=',17)
                    ->orwhere('crime_type','=',21);
                })
            ->whereBetween('incident_date', [$date_from, $date_to])
            ->get();
        
        // THIS DISPLAYS THE INCIDENTS AND POLICE ACTIONS
        $sitrep_details = Sitrep_Detail::select(DB::raw(" * "))
        ->whereBetween('incident_date', [$date_from, $date_to])
        ->orderBy('state_id')
        ->get(); 
        // dd($sitreps);

        // THIS DISPLAYS THE NUMBER OF INCIDENTS CHARTS BY STATE
        $sitreps = Sitrep::select(DB::raw(" state_id,  
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereBetween('incident_date', [$date_from, $date_to])
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('state_id')
            // ->orderBy('state_id')
            ->get();

         // THIS DISPLAYS THE NUMBER OF INCIDENTS CHARTS BY CRIME TYPE
        $sitreps_crime_type = Sitrep::select(DB::raw(" crime_type,  
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereBetween('incident_date', [$date_from, $date_to])
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('crime_type')
            // ->orderBy('crime_type')
            ->get();

            // THIS DISPLAYS THE NUMBER OF INCIDENTS CHARTS BY CRIME TYPE & STATE
        $sitreps_crime_type_state = Sitrep::select(DB::raw(" crime_type, state_id, 
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereBetween('incident_date', [$date_from, $date_to])
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('crime_type')
            ->groupBy('state_id')
            // ->orderBy('')
            ->get();

        // THIS DISPLAYS THE TOTAL NUMBER OF INCIDENTS 
        $sitreps_state_total = Sitrep::select(DB::raw(" 
        SUM(number_incident) AS number_incident, 
        SUM(number_victims) AS number_victims, 
        SUM(number_victims_injured) AS number_victims_injured,
        SUM(number_casualties) AS number_casualties,
        SUM(number_victims_rescused) AS number_victims_rescused, 
        SUM(number_arrest) AS number_arrest,
        SUM(suspect_casualties) AS suspect_casualties, 
        SUM(number_firearms) AS number_firearms, 
        SUM(number_dane_gun) AS number_dane_gun,
        SUM(number_ammunition) AS number_ammunition, 
        SUM(number_caterages) AS number_caterages, 
        SUM(number_vehicle) AS number_vehicle,
        SUM(police_casualties) AS police_casualties, 
        SUM(operative_casualties) AS operative_casualties, 
        SUM(number_others) AS number_others"))
        ->whereBetween('incident_date', [$date_from, $date_to])
        // ->where('sitrep_id','=',$sitrep_id)
        // ->groupBy('state_id')
        // ->orderBy('crime_type')
        ->get();
        



        $groupby_type = 'state_id';
        $groupby_name = 'state_id';
        $incident_date1=date_create($date_from);
        $incident_date2=date_create($date_to);
        $incident_date=$date_from; 

        
        $info = 'SITREP of '.date_format($incident_date1,"jS F, Y").''; 
        // else{ $info = 'SITREP from '.date_format($incident_date1,"jS F, Y").' to '.date_format($incident_date2,"jS F, Y").'';  }
        return view('sitrep.sitrep.daily_report', compact('sitreps_state_group','sitreps','sitrep_details','info','sitreps_state_total','sitreps_total','sitreps_crime_type','sitreps_crime_type_state','incident_date','groupby_type','groupby_name'));
    } // End Mehtod 

    public function MonthlyReport(Request $request)
    {

        //dd($request->all());
        
        $date_from2 = $request->date_from2;
            
        // dd($date_from2);
        $inputDate = $date_from2;
        // Get the beginning of the month (e.g., 2025-05-01 00:00:00)
        $startOfMonth = Carbon::parse($inputDate)->startOfMonth();
        // Get the end of the month (e.g., 2025-05-31 23:59:59)
        $endOfMonth = Carbon::parse($inputDate)->endOfMonth();
        // If you only need the date part as a string (e.g., '2025-05-01')
        $startDateString = $startOfMonth->toDateString();
        $endDateString = $endOfMonth->toDateString();

        $date_from = $startDateString;
        $date_to = $endDateString;
        $incident_date = $date_from;
        $incident_date2 = $date_to;
                 
       // dd($date_to);

       // THIS CALCULATES THE TOTAL OF EACH INCIDENT
        $sitreps_state_group = Sitrep::select(DB::raw(" state_id,
            SUM(CASE WHEN crime_type = 1 THEN `number_incident` ELSE 0 END) AS crime1
            , SUM(CASE WHEN crime_type = 2 THEN `number_incident` ELSE 0 END) AS crime2
            , SUM(CASE WHEN crime_type = 3 THEN `number_incident` ELSE 0 END) AS crime3
            , SUM(CASE WHEN crime_type = 4 THEN `number_incident` ELSE 0 END) AS crime4
            , SUM(CASE WHEN crime_type = 5 THEN `number_incident` ELSE 0 END) AS crime5
            , SUM(CASE WHEN crime_type = 6 THEN `number_incident` ELSE 0 END) AS crime6
            , SUM(CASE WHEN crime_type = 7 THEN `number_incident` ELSE 0 END) AS crime7
            , SUM(CASE WHEN crime_type = 8 THEN `number_incident` ELSE 0 END) AS crime8
            , SUM(CASE WHEN crime_type = 9 THEN `number_incident` ELSE 0 END) AS crime9
            , SUM(CASE WHEN crime_type = 10 THEN `number_incident` ELSE 0 END) AS crime10
            , SUM(CASE WHEN crime_type = 11 THEN `number_incident` ELSE 0 END) AS crime11
            , SUM(CASE WHEN crime_type = 12 THEN `number_incident` ELSE 0 END) AS crime12
            , SUM(CASE WHEN crime_type = 13 THEN `number_incident` ELSE 0 END) AS crime13
            , SUM(CASE WHEN crime_type = 14 THEN `number_incident` ELSE 0 END) AS crime14
            , SUM(CASE WHEN crime_type = 15 THEN `number_incident` ELSE 0 END) AS crime15
            , SUM(CASE WHEN crime_type = 16 THEN `number_incident` ELSE 0 END) AS crime16
            , SUM(CASE WHEN crime_type = 17 THEN `number_incident` ELSE 0 END) AS crime17
            , SUM(CASE WHEN crime_type = 18 THEN `number_incident` ELSE 0 END) AS crime18
            , SUM(CASE WHEN crime_type = 19 THEN `number_incident` ELSE 0 END) AS crime19
            , SUM(CASE WHEN crime_type = 20 THEN `number_incident` ELSE 0 END) AS crime20
            , SUM(`number_incident`) as total_fireamrs"))
                ->where(function ($query) {
                    $query
                    ->where('crime_type','=',1)
                    ->orwhere('crime_type','=',2)
                    ->orwhere('crime_type','=',3)
                    ->orwhere('crime_type','=',4)
                    ->orwhere('crime_type','=',5)
                    ->orwhere('crime_type','=',6)
                    ->orwhere('crime_type','=',7)
                    ->orwhere('crime_type','=',8)
                    ->orwhere('crime_type','=',15)
                    ->orwhere('crime_type','=',17)
                    ->orwhere('crime_type','=',21);
                })
            ->whereBetween('incident_date', [$date_from, $date_to])
            ->groupBy('state_id')
            ->orderBy('state_id')
        ->get();
        
      
        // dd($sitreps_state_group);

      

        // THIS CALCULATES THE TOTAL OF EACH INCIDENT
        $sitreps_total = Sitrep::select(DB::raw(" 
            SUM(CASE WHEN crime_type = 1 THEN `number_incident` ELSE 0 END) AS crime1
            , SUM(CASE WHEN crime_type = 2 THEN `number_incident` ELSE 0 END) AS crime2
            , SUM(CASE WHEN crime_type = 3 THEN `number_incident` ELSE 0 END) AS crime3
            , SUM(CASE WHEN crime_type = 4 THEN `number_incident` ELSE 0 END) AS crime4
            , SUM(CASE WHEN crime_type = 5 THEN `number_incident` ELSE 0 END) AS crime5
            , SUM(CASE WHEN crime_type = 6 THEN `number_incident` ELSE 0 END) AS crime6
            , SUM(CASE WHEN crime_type = 7 THEN `number_incident` ELSE 0 END) AS crime7
            , SUM(CASE WHEN crime_type = 8 THEN `number_incident` ELSE 0 END) AS crime8
            , SUM(CASE WHEN crime_type = 9 THEN `number_incident` ELSE 0 END) AS crime9
            , SUM(CASE WHEN crime_type = 10 THEN `number_incident` ELSE 0 END) AS crime10
            , SUM(CASE WHEN crime_type = 11 THEN `number_incident` ELSE 0 END) AS crime11
            , SUM(CASE WHEN crime_type = 12 THEN `number_incident` ELSE 0 END) AS crime12
            , SUM(CASE WHEN crime_type = 13 THEN `number_incident` ELSE 0 END) AS crime13
            , SUM(CASE WHEN crime_type = 14 THEN `number_incident` ELSE 0 END) AS crime14
            , SUM(CASE WHEN crime_type = 15 THEN `number_incident` ELSE 0 END) AS crime15
            , SUM(CASE WHEN crime_type = 16 THEN `number_incident` ELSE 0 END) AS crime16
            , SUM(CASE WHEN crime_type = 17 THEN `number_incident` ELSE 0 END) AS crime17
            , SUM(CASE WHEN crime_type = 18 THEN `number_incident` ELSE 0 END) AS crime18
            , SUM(CASE WHEN crime_type = 19 THEN `number_incident` ELSE 0 END) AS crime19
            , SUM(CASE WHEN crime_type = 20 THEN `number_incident` ELSE 0 END) AS crime20
            , SUM(`number_incident`) as total_fireamrs"))
                ->where(function ($query) {
                    $query
                    ->where('crime_type','=',1)
                    ->orwhere('crime_type','=',2)
                    ->orwhere('crime_type','=',3)
                    ->orwhere('crime_type','=',4)
                    ->orwhere('crime_type','=',5)
                    ->orwhere('crime_type','=',6)
                    ->orwhere('crime_type','=',7)
                    ->orwhere('crime_type','=',8)
                    ->orwhere('crime_type','=',15)
                    ->orwhere('crime_type','=',17)
                    ->orwhere('crime_type','=',21);
                })
            ->whereBetween('incident_date', [$date_from, $date_to])
            ->get();
        
        // THIS DISPLAYS THE INCIDENTS AND POLICE ACTIONS
        $sitrep_details = Sitrep_Detail::select(DB::raw(" * "))
        ->whereBetween('incident_date', [$date_from, $date_to])
        ->orderBy('state_id')
        ->get(); 
        // dd($sitreps);

        // THIS DISPLAYS THE NUMBER OF INCIDENTS CHARTS BY STATE
        $sitreps = Sitrep::select(DB::raw(" state_id,  
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereBetween('incident_date', [$date_from, $date_to])
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('state_id')
            ->orderBy('state_id')
            ->get();

        // THIS DISPLAYS THE NUMBER OF INCIDENTS CHARTS BY CRIME TYPE
        $sitreps_crime_type = Sitrep::select(DB::raw(" crime_type,  
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereBetween('incident_date', [$date_from, $date_to])
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('crime_type')
            // ->orderBy('crime_type')
        ->get();



            // THIS DISPLAYS THE NUMBER OF INCIDENTS CHARTS BY CRIME TYPE & STATE
        $sitreps_crime_type_state = Sitrep::select(DB::raw(" crime_type, state_id, 
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereBetween('incident_date', [$date_from, $date_to])
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('crime_type')
            ->groupBy('state_id')
            // ->orderBy('')
            ->get();

        // THIS DISPLAYS THE TOTAL NUMBER OF INCIDENTS 
        $sitreps_state_total = Sitrep::select(DB::raw(" 
        SUM(number_incident) AS number_incident, 
        SUM(number_victims) AS number_victims, 
        SUM(number_victims_injured) AS number_victims_injured,
        SUM(number_casualties) AS number_casualties,
        SUM(number_victims_rescused) AS number_victims_rescused, 
        SUM(number_arrest) AS number_arrest,
        SUM(suspect_casualties) AS suspect_casualties, 
        SUM(number_firearms) AS number_firearms, 
        SUM(number_dane_gun) AS number_dane_gun,
        SUM(number_ammunition) AS number_ammunition, 
        SUM(number_caterages) AS number_caterages, 
        SUM(number_vehicle) AS number_vehicle,
        SUM(police_casualties) AS police_casualties, 
        SUM(operative_casualties) AS operative_casualties, 
        SUM(number_others) AS number_others"))
        ->whereBetween('incident_date', [$date_from, $date_to])
        // ->where('sitrep_id','=',$sitrep_id)
        // ->groupBy('state_id')
        // ->orderBy('crime_type')
        ->get();
        



        $groupby_type = 'state_id';
        $groupby_name = 'state_id';
        $incident_date1=date_create($date_from2);
        $incident_date2=date_create($date_to);
        $incident_date=$date_from; 

        $info = 'Date: '.date_format($incident_date1,"F, Y").''; 

        // dd($sitreps->all());
        return view('sitrep.sitrep.daily_report', compact('sitreps_state_group','sitreps','sitrep_details','info','sitreps_state_total','sitreps_total','sitreps_crime_type','sitreps_crime_type_state','incident_date','groupby_type','groupby_name'));
    } // End Mehtod 

   public function CustomReport(Request $request)
    {
        // dd($request->all());
        
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $incident_date = $date_from;
        $incident_date2 = $date_to;
               
        // THIS CALCULATES THE TOTAL OF EACH INCIDENT
        $sitreps_state_group = Sitrep::select(DB::raw(" state_id,
            SUM(CASE WHEN crime_type = 1 THEN `number_incident` ELSE 0 END) AS crime1
            , SUM(CASE WHEN crime_type = 2 THEN `number_incident` ELSE 0 END) AS crime2
            , SUM(CASE WHEN crime_type = 3 THEN `number_incident` ELSE 0 END) AS crime3
            , SUM(CASE WHEN crime_type = 4 THEN `number_incident` ELSE 0 END) AS crime4
            , SUM(CASE WHEN crime_type = 5 THEN `number_incident` ELSE 0 END) AS crime5
            , SUM(CASE WHEN crime_type = 6 THEN `number_incident` ELSE 0 END) AS crime6
            , SUM(CASE WHEN crime_type = 7 THEN `number_incident` ELSE 0 END) AS crime7
            , SUM(CASE WHEN crime_type = 8 THEN `number_incident` ELSE 0 END) AS crime8
            , SUM(CASE WHEN crime_type = 9 THEN `number_incident` ELSE 0 END) AS crime9
            , SUM(CASE WHEN crime_type = 10 THEN `number_incident` ELSE 0 END) AS crime10
            , SUM(CASE WHEN crime_type = 11 THEN `number_incident` ELSE 0 END) AS crime11
            , SUM(CASE WHEN crime_type = 12 THEN `number_incident` ELSE 0 END) AS crime12
            , SUM(CASE WHEN crime_type = 13 THEN `number_incident` ELSE 0 END) AS crime13
            , SUM(CASE WHEN crime_type = 14 THEN `number_incident` ELSE 0 END) AS crime14
            , SUM(CASE WHEN crime_type = 15 THEN `number_incident` ELSE 0 END) AS crime15
            , SUM(CASE WHEN crime_type = 16 THEN `number_incident` ELSE 0 END) AS crime16
            , SUM(CASE WHEN crime_type = 17 THEN `number_incident` ELSE 0 END) AS crime17
            , SUM(CASE WHEN crime_type = 18 THEN `number_incident` ELSE 0 END) AS crime18
            , SUM(CASE WHEN crime_type = 19 THEN `number_incident` ELSE 0 END) AS crime19
            , SUM(CASE WHEN crime_type = 20 THEN `number_incident` ELSE 0 END) AS crime20
            , SUM(`number_incident`) as total_fireamrs"))
                ->where(function ($query) {
                    $query
                    ->where('crime_type','=',1)
                    ->orwhere('crime_type','=',2)
                    ->orwhere('crime_type','=',3)
                    ->orwhere('crime_type','=',4)
                    ->orwhere('crime_type','=',5)
                    ->orwhere('crime_type','=',6)
                    ->orwhere('crime_type','=',7)
                    ->orwhere('crime_type','=',8)
                    ->orwhere('crime_type','=',15)
                    ->orwhere('crime_type','=',17)
                    ->orwhere('crime_type','=',21);
                })
            ->whereBetween('incident_date', [$date_from, $date_to])
            ->groupBy('state_id')
            ->orderBy('state_id')
            ->get();
        
      
        // dd($sitreps_state_group);

        // THIS CALCULATES THE TOTAL OF EACH INCIDENT
        $sitreps_total = Sitrep::select(DB::raw(" 
            SUM(CASE WHEN crime_type = 1 THEN `number_incident` ELSE 0 END) AS crime1
            , SUM(CASE WHEN crime_type = 2 THEN `number_incident` ELSE 0 END) AS crime2
            , SUM(CASE WHEN crime_type = 3 THEN `number_incident` ELSE 0 END) AS crime3
            , SUM(CASE WHEN crime_type = 4 THEN `number_incident` ELSE 0 END) AS crime4
            , SUM(CASE WHEN crime_type = 5 THEN `number_incident` ELSE 0 END) AS crime5
            , SUM(CASE WHEN crime_type = 6 THEN `number_incident` ELSE 0 END) AS crime6
            , SUM(CASE WHEN crime_type = 7 THEN `number_incident` ELSE 0 END) AS crime7
            , SUM(CASE WHEN crime_type = 8 THEN `number_incident` ELSE 0 END) AS crime8
            , SUM(CASE WHEN crime_type = 9 THEN `number_incident` ELSE 0 END) AS crime9
            , SUM(CASE WHEN crime_type = 10 THEN `number_incident` ELSE 0 END) AS crime10
            , SUM(CASE WHEN crime_type = 11 THEN `number_incident` ELSE 0 END) AS crime11
            , SUM(CASE WHEN crime_type = 12 THEN `number_incident` ELSE 0 END) AS crime12
            , SUM(CASE WHEN crime_type = 13 THEN `number_incident` ELSE 0 END) AS crime13
            , SUM(CASE WHEN crime_type = 14 THEN `number_incident` ELSE 0 END) AS crime14
            , SUM(CASE WHEN crime_type = 15 THEN `number_incident` ELSE 0 END) AS crime15
            , SUM(CASE WHEN crime_type = 16 THEN `number_incident` ELSE 0 END) AS crime16
            , SUM(CASE WHEN crime_type = 17 THEN `number_incident` ELSE 0 END) AS crime17
            , SUM(CASE WHEN crime_type = 18 THEN `number_incident` ELSE 0 END) AS crime18
            , SUM(CASE WHEN crime_type = 19 THEN `number_incident` ELSE 0 END) AS crime19
            , SUM(CASE WHEN crime_type = 20 THEN `number_incident` ELSE 0 END) AS crime20
            , SUM(`number_incident`) as total_fireamrs"))
                ->where(function ($query) {
                    $query
                    ->where('crime_type','=',1)
                    ->orwhere('crime_type','=',2)
                    ->orwhere('crime_type','=',3)
                    ->orwhere('crime_type','=',4)
                    ->orwhere('crime_type','=',5)
                    ->orwhere('crime_type','=',6)
                    ->orwhere('crime_type','=',7)
                    ->orwhere('crime_type','=',8)
                    ->orwhere('crime_type','=',15)
                    ->orwhere('crime_type','=',17)
                    ->orwhere('crime_type','=',21);
                })
            ->whereBetween('incident_date', [$date_from, $date_to])
            ->get();
        
        // THIS DISPLAYS THE INCIDENTS AND POLICE ACTIONS
        $sitrep_details = Sitrep_Detail::select(DB::raw(" * "))
        ->whereBetween('incident_date', [$date_from, $date_to])
        ->orderBy('state_id')
        ->get(); 
        // dd($sitreps_total);

        // THIS DISPLAYS THE NUMBER OF INCIDENTS CHARTS BY STATE
        $sitreps = Sitrep::select(DB::raw(" state_id,  
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereBetween('incident_date', [$date_from, $date_to])
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('state_id')
            ->orderBy('state_id', 'ASC')
            ->get();

         // THIS DISPLAYS THE NUMBER OF INCIDENTS CHARTS BY CRIME TYPE
        $sitreps_crime_type = Sitrep::select(DB::raw(" crime_type,  
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereBetween('incident_date', [$date_from, $date_to])
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('crime_type')
            // ->orderBy('crime_type')
        ->get();

            // THIS DISPLAYS THE NUMBER OF INCIDENTS CHARTS BY CRIME TYPE & STATE
        $sitreps_crime_type_state = Sitrep::select(DB::raw(" state_id, 
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereBetween('incident_date', [$date_from, $date_to])
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('state_id')
            // ->groupBy('crime_type')
            // ->orderBy('')
            ->get();

        // THIS DISPLAYS THE TOTAL NUMBER OF INCIDENTS 
        $sitreps_state_total = Sitrep::select(DB::raw(" 
        SUM(number_incident) AS number_incident, 
        SUM(number_victims) AS number_victims, 
        SUM(number_victims_injured) AS number_victims_injured,
        SUM(number_casualties) AS number_casualties,
        SUM(number_victims_rescused) AS number_victims_rescused, 
        SUM(number_arrest) AS number_arrest,
        SUM(suspect_casualties) AS suspect_casualties, 
        SUM(number_firearms) AS number_firearms, 
        SUM(number_dane_gun) AS number_dane_gun,
        SUM(number_ammunition) AS number_ammunition, 
        SUM(number_caterages) AS number_caterages, 
        SUM(number_vehicle) AS number_vehicle,
        SUM(police_casualties) AS police_casualties, 
        SUM(operative_casualties) AS operative_casualties, 
        SUM(number_others) AS number_others"))
        ->whereBetween('incident_date', [$date_from, $date_to])
        // ->where('sitrep_id','=',$sitrep_id)
        // ->groupBy('state_id')
        // ->orderBy('crime_type')
        ->get();
        



        $groupby_type = 'state_id';
        $groupby_name = 'state_id';
        $incident_date1=date_create($date_from);
        $incident_date2=date_create($date_to);
        $incident_date=$date_from; 

        $info = 'Date: '.date_format($incident_date1,"d/m/Y").' - '.date_format($incident_date2,"d/m/Y").'';
        return view('sitrep.sitrep.daily_report', compact('sitreps','sitreps_state_group','sitrep_details','info','sitreps_state_total','sitreps_total','sitreps_crime_type','sitreps_crime_type_state','incident_date','groupby_type','groupby_name'));
    } // End Mehtod 
   

     public function ValidateReport( Request $request) 
    {
        // dd($request->all());
        $date_from = $request->date_from;
        $date_to = $request->date_from;
        $incident_date = $date_from;
        $incident_date2 = $date_from;
        // dd($sitreps_crime_type_state);
        
        $sitreps = Sitrep::select(DB::raw(" * "))
        //->whereBetween('incident_date', '')
        //->where('remarks','=',1)
        ->whereBetween('incident_date', [$date_from, $date_to])
        ->limit(100)
        ->orderBy('id','DESC')
        ->get(); 
        // dd($sitreps);
        $info = 'Most Recent Sitrep'; 
        return view('sitrep.sitrep.view_100_sitreps', compact('info','sitreps'))->with('error','Sitrep Added Successfully');
    }

    

    public function YearlyAnalysis(Request $request) //Yearlytrends
    {
        // dd($request->all());
        
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $incident_date = $date_from;
        $incident_date2 = $date_to;




               
        // THIS CALCULATES THE TOTAL OF EACH INCIDENT
        $sitreps_total = Sitrep::select(DB::raw(" 
            SUM(CASE WHEN crime_type = 1 THEN `number_incident` ELSE 0 END) AS crime1
            , SUM(CASE WHEN crime_type = 2 THEN `number_incident` ELSE 0 END) AS crime2
            , SUM(CASE WHEN crime_type = 3 THEN `number_incident` ELSE 0 END) AS crime3
            , SUM(CASE WHEN crime_type = 4 THEN `number_incident` ELSE 0 END) AS crime4
            , SUM(CASE WHEN crime_type = 5 THEN `number_incident` ELSE 0 END) AS crime5
            , SUM(CASE WHEN crime_type = 6 THEN `number_incident` ELSE 0 END) AS crime6
            , SUM(CASE WHEN crime_type = 7 THEN `number_incident` ELSE 0 END) AS crime7
            , SUM(CASE WHEN crime_type = 8 THEN `number_incident` ELSE 0 END) AS crime8
            , SUM(CASE WHEN crime_type = 9 THEN `number_incident` ELSE 0 END) AS crime9
            , SUM(CASE WHEN crime_type = 10 THEN `number_incident` ELSE 0 END) AS crime10
            , SUM(CASE WHEN crime_type = 11 THEN `number_incident` ELSE 0 END) AS crime11
            , SUM(CASE WHEN crime_type = 12 THEN `number_incident` ELSE 0 END) AS crime12
            , SUM(CASE WHEN crime_type = 13 THEN `number_incident` ELSE 0 END) AS crime13
            , SUM(CASE WHEN crime_type = 14 THEN `number_incident` ELSE 0 END) AS crime14
            , SUM(CASE WHEN crime_type = 15 THEN `number_incident` ELSE 0 END) AS crime15
            , SUM(CASE WHEN crime_type = 16 THEN `number_incident` ELSE 0 END) AS crime16
            , SUM(CASE WHEN crime_type = 17 THEN `number_incident` ELSE 0 END) AS crime17
            , SUM(CASE WHEN crime_type = 18 THEN `number_incident` ELSE 0 END) AS crime18
            , SUM(CASE WHEN crime_type = 19 THEN `number_incident` ELSE 0 END) AS crime19
            , SUM(CASE WHEN crime_type = 20 THEN `number_incident` ELSE 0 END) AS crime20
            , SUM(`number_incident`) as total_fireamrs"))
                ->where(function ($query) {
                    $query
                    ->where('crime_type','=',1)
                    ->orwhere('crime_type','=',2)
                    ->orwhere('crime_type','=',3)
                    ->orwhere('crime_type','=',4)
                    ->orwhere('crime_type','=',5)
                    ->orwhere('crime_type','=',6)
                    ->orwhere('crime_type','=',7)
                    ->orwhere('crime_type','=',8)
                    ->orwhere('crime_type','=',15)
                    ->orwhere('crime_type','=',17)
                    ->orwhere('crime_type','=',21);
                })
            ->whereYear('incident_date', $date_from)
        ->get();

         // THIS CALCULATES THE TOTAL OF EACH INCIDENT
        $sitreps_total2 = Sitrep::select(DB::raw(" 
            SUM(CASE WHEN crime_type = 1 THEN `number_incident` ELSE 0 END) AS crime1
            , SUM(CASE WHEN crime_type = 2 THEN `number_incident` ELSE 0 END) AS crime2
            , SUM(CASE WHEN crime_type = 3 THEN `number_incident` ELSE 0 END) AS crime3
            , SUM(CASE WHEN crime_type = 4 THEN `number_incident` ELSE 0 END) AS crime4
            , SUM(CASE WHEN crime_type = 5 THEN `number_incident` ELSE 0 END) AS crime5
            , SUM(CASE WHEN crime_type = 6 THEN `number_incident` ELSE 0 END) AS crime6
            , SUM(CASE WHEN crime_type = 7 THEN `number_incident` ELSE 0 END) AS crime7
            , SUM(CASE WHEN crime_type = 8 THEN `number_incident` ELSE 0 END) AS crime8
            , SUM(CASE WHEN crime_type = 9 THEN `number_incident` ELSE 0 END) AS crime9
            , SUM(CASE WHEN crime_type = 10 THEN `number_incident` ELSE 0 END) AS crime10
            , SUM(CASE WHEN crime_type = 11 THEN `number_incident` ELSE 0 END) AS crime11
            , SUM(CASE WHEN crime_type = 12 THEN `number_incident` ELSE 0 END) AS crime12
            , SUM(CASE WHEN crime_type = 13 THEN `number_incident` ELSE 0 END) AS crime13
            , SUM(CASE WHEN crime_type = 14 THEN `number_incident` ELSE 0 END) AS crime14
            , SUM(CASE WHEN crime_type = 15 THEN `number_incident` ELSE 0 END) AS crime15
            , SUM(CASE WHEN crime_type = 16 THEN `number_incident` ELSE 0 END) AS crime16
            , SUM(CASE WHEN crime_type = 17 THEN `number_incident` ELSE 0 END) AS crime17
            , SUM(CASE WHEN crime_type = 18 THEN `number_incident` ELSE 0 END) AS crime18
            , SUM(CASE WHEN crime_type = 19 THEN `number_incident` ELSE 0 END) AS crime19
            , SUM(CASE WHEN crime_type = 20 THEN `number_incident` ELSE 0 END) AS crime20
            , SUM(`number_incident`) as total_fireamrs"))
                ->where(function ($query) {
                    $query
                    ->where('crime_type','=',1)
                    ->orwhere('crime_type','=',2)
                    ->orwhere('crime_type','=',3)
                    ->orwhere('crime_type','=',4)
                    ->orwhere('crime_type','=',5)
                    ->orwhere('crime_type','=',6)
                    ->orwhere('crime_type','=',7)
                    ->orwhere('crime_type','=',8)
                    ->orwhere('crime_type','=',15)
                    ->orwhere('crime_type','=',17)
                    ->orwhere('crime_type','=',21);
                })
            ->whereYear('incident_date', $date_to)
        ->get();
        
        // // THIS DISPLAYS THE INCIDENTS AND POLICE ACTIONS
        // $sitrep_details = Sitrep_Detail::select(DB::raw(" * "))
        // ->whereYear('incident_date', $date_from)
        // ->orderBy('state_id')
        // ->get(); 
        // // dd($sitreps);

        // THIS DISPLAYS THE NUMBER OF INCIDENTS TABLE BY STATE
        $sitreps = Sitrep::select(DB::raw(" state_id,  
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereYear('incident_date', $date_from)
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('state_id')
            // ->orderBy('crime_type')
        ->get();

        // dd($sitreps);


        // THIS DISPLAYS THE NUMBER OF INCIDENTS TABLE BY STATE
        $sitreps2 = Sitrep::select(DB::raw(" state_id,  
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereYear('incident_date', $date_to)
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('state_id')
            // ->orderBy('crime_type')
        ->get();

         // THIS DISPLAYS THE NUMBER OF INCIDENTS TABLE BY CRIME TYPE
        $sitreps_crime_type = Sitrep::select(DB::raw(" crime_type,  
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereYear('incident_date', $date_from)
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('crime_type')
            // ->orderBy('crime_type')
        ->get();

          // THIS DISPLAYS THE NUMBER OF INCIDENTS TABLE BY CRIME TYPE
        $sitreps_crime_type2 = Sitrep::select(DB::raw(" crime_type,  
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereYear('incident_date', $date_to)
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('crime_type')
            // ->orderBy('crime_type')
        ->get();


            // THIS DISPLAYS THE NUMBER OF INCIDENTS CHARTS BY CRIME TYPE & STATE
        // $sitreps_crime_type_state = Sitrep::select(DB::raw(" crime_type, state_id, 
        //         SUM(number_incident) AS number_incident, 
        //         SUM(number_victims) AS number_victims, 
        //         SUM(number_victims_injured) AS number_victims_injured,
        //         SUM(number_casualties) AS number_casualties,
        //         SUM(number_victims_rescused) AS number_victims_rescused, 
        //         SUM(number_arrest) AS number_arrest,
        //         SUM(suspect_casualties) AS suspect_casualties, 
        //         SUM(number_firearms) AS number_firearms, 
        //         SUM(number_dane_gun) AS number_dane_gun,
        //         SUM(number_ammunition) AS number_ammunition, 
        //         SUM(number_caterages) AS number_caterages, 
        //         SUM(number_vehicle) AS number_vehicle,
        //         SUM(police_casualties) AS police_casualties, 
        //         SUM(operative_casualties) AS operative_casualties, 
        //         SUM(number_others) AS number_others"))
        //     ->whereYear('incident_date', $date_from)
        //     // ->where('sitrep_id','=',$sitrep_id)
        //     ->groupBy('crime_type')
        //     ->groupBy('state_id')
        //     // ->orderBy('')
        // ->get();

        // THIS DISPLAYS THE TOTAL NUMBER OF INCIDENTS 
        $sitreps_state_total = Sitrep::select(DB::raw(" 
            SUM(number_incident) AS number_incident, 
            SUM(number_victims) AS number_victims, 
            SUM(number_victims_injured) AS number_victims_injured,
            SUM(number_casualties) AS number_casualties,
            SUM(number_victims_rescused) AS number_victims_rescused, 
            SUM(number_arrest) AS number_arrest,
            SUM(suspect_casualties) AS suspect_casualties, 
            SUM(number_firearms) AS number_firearms, 
            SUM(number_dane_gun) AS number_dane_gun,
            SUM(number_ammunition) AS number_ammunition, 
            SUM(number_caterages) AS number_caterages, 
            SUM(number_vehicle) AS number_vehicle,
            SUM(police_casualties) AS police_casualties, 
            SUM(operative_casualties) AS operative_casualties, 
            SUM(number_others) AS number_others"))
            ->whereYear('incident_date', $date_from)
            // ->where('sitrep_id','=',$sitrep_id)
            // ->groupBy('state_id')
            // ->orderBy('crime_type')
        ->get();

         // THIS DISPLAYS THE TOTAL NUMBER OF INCIDENTS 
        $sitreps_state_total2 = Sitrep::select(DB::raw(" 
            SUM(number_incident) AS number_incident, 
            SUM(number_victims) AS number_victims, 
            SUM(number_victims_injured) AS number_victims_injured,
            SUM(number_casualties) AS number_casualties,
            SUM(number_victims_rescused) AS number_victims_rescused, 
            SUM(number_arrest) AS number_arrest,
            SUM(suspect_casualties) AS suspect_casualties, 
            SUM(number_firearms) AS number_firearms, 
            SUM(number_dane_gun) AS number_dane_gun,
            SUM(number_ammunition) AS number_ammunition, 
            SUM(number_caterages) AS number_caterages, 
            SUM(number_vehicle) AS number_vehicle,
            SUM(police_casualties) AS police_casualties, 
            SUM(operative_casualties) AS operative_casualties, 
            SUM(number_others) AS number_others"))
            ->whereYear('incident_date', $date_to)
            // ->where('sitrep_id','=',$sitrep_id)
            // ->groupBy('state_id')
            // ->orderBy('crime_type')
        ->get();
        



        $groupby_type = 'state_id';
        $groupby_name = 'state_id';
        $incident_date1=date_create($date_from);
        $incident_date2=date_create($date_to);
        $incident_date=$date_from; 

        $info = 'Date: '.date_format($incident_date1,"Y").' - '.date_format($incident_date2,"Y").'';
        $info2 = 'Date: '.date_format($incident_date1,"Y").' - '.date_format($incident_date2,"Y").'';
        return view('sitrep.sitrep.analysis_report', 
        compact(
            'sitreps','info','sitreps_state_total','sitreps_total',
            'sitreps_crime_type','incident_date','groupby_type','groupby_name',
            'sitreps2','sitreps_state_total2','sitreps_total2',
            'sitreps_crime_type2','incident_date2','info2'
        ));
    } // End Mehtod 

    public function MonthlyAnalysis2(Request $request) //DELETE
    {

        // dd($request->all());
        
        $date_from = $request->date_from;
        $date_to = $request->date_to;
            
        $year_month = "2025-05"; // Your input string

        // Separate the string into year and month
        list($year_from, $month_from) = explode('-', $date_from);
        list($year_to, $month_to) = explode('-', $date_to);

        $year_from = (int)$year_from;
        $month_from = (int)$month_from;

        $year_to = (int)$year_to;
        $month_to = (int)$month_to;

        // ->whereYear('incident_date', $year_from)
        // ->whereMonth('incident_date', $month_from)
        



      

        // THIS CALCULATES THE TOTAL OF EACH INCIDENT
        $sitreps_total = Sitrep::select(DB::raw(" 
            SUM(CASE WHEN crime_type = 1 THEN `number_incident` ELSE 0 END) AS crime1
            , SUM(CASE WHEN crime_type = 2 THEN `number_incident` ELSE 0 END) AS crime2
            , SUM(CASE WHEN crime_type = 3 THEN `number_incident` ELSE 0 END) AS crime3
            , SUM(CASE WHEN crime_type = 4 THEN `number_incident` ELSE 0 END) AS crime4
            , SUM(CASE WHEN crime_type = 5 THEN `number_incident` ELSE 0 END) AS crime5
            , SUM(CASE WHEN crime_type = 6 THEN `number_incident` ELSE 0 END) AS crime6
            , SUM(CASE WHEN crime_type = 7 THEN `number_incident` ELSE 0 END) AS crime7
            , SUM(CASE WHEN crime_type = 8 THEN `number_incident` ELSE 0 END) AS crime8
            , SUM(CASE WHEN crime_type = 9 THEN `number_incident` ELSE 0 END) AS crime9
            , SUM(CASE WHEN crime_type = 10 THEN `number_incident` ELSE 0 END) AS crime10
            , SUM(CASE WHEN crime_type = 11 THEN `number_incident` ELSE 0 END) AS crime11
            , SUM(CASE WHEN crime_type = 12 THEN `number_incident` ELSE 0 END) AS crime12
            , SUM(CASE WHEN crime_type = 13 THEN `number_incident` ELSE 0 END) AS crime13
            , SUM(CASE WHEN crime_type = 14 THEN `number_incident` ELSE 0 END) AS crime14
            , SUM(CASE WHEN crime_type = 15 THEN `number_incident` ELSE 0 END) AS crime15
            , SUM(CASE WHEN crime_type = 16 THEN `number_incident` ELSE 0 END) AS crime16
            , SUM(CASE WHEN crime_type = 17 THEN `number_incident` ELSE 0 END) AS crime17
            , SUM(CASE WHEN crime_type = 18 THEN `number_incident` ELSE 0 END) AS crime18
            , SUM(CASE WHEN crime_type = 19 THEN `number_incident` ELSE 0 END) AS crime19
            , SUM(CASE WHEN crime_type = 20 THEN `number_incident` ELSE 0 END) AS crime20
            , SUM(`number_incident`) as total_fireamrs"))
                ->where(function ($query) {
                    $query
                    ->where('crime_type','=',1)
                    ->orwhere('crime_type','=',2)
                    ->orwhere('crime_type','=',3)
                    ->orwhere('crime_type','=',4)
                    ->orwhere('crime_type','=',5)
                    ->orwhere('crime_type','=',6)
                    ->orwhere('crime_type','=',7)
                    ->orwhere('crime_type','=',8)
                    ->orwhere('crime_type','=',15)
                    ->orwhere('crime_type','=',17)
                    ->orwhere('crime_type','=',21);
                })
        ->whereYear('incident_date', $year_from)
        ->whereMonth('incident_date', $month_from)
        ->get();
        
       

        // THIS DISPLAYS THE NUMBER OF INCIDENTS TABLE BY STATE
        $sitreps = Sitrep::select(DB::raw(" state_id,  
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereYear('incident_date', $year_from)
            ->whereMonth('incident_date', $month_from)
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('state_id')
            // ->orderBy('crime_type')
        ->get();

        

        // THIS DISPLAYS THE TOTAL NUMBER OF INCIDENTS 
        $sitreps_state_total = Sitrep::select(DB::raw(" 
            SUM(number_incident) AS number_incident, 
            SUM(number_victims) AS number_victims, 
            SUM(number_victims_injured) AS number_victims_injured,
            SUM(number_casualties) AS number_casualties,
            SUM(number_victims_rescused) AS number_victims_rescused, 
            SUM(number_arrest) AS number_arrest,
            SUM(suspect_casualties) AS suspect_casualties, 
            SUM(number_firearms) AS number_firearms, 
            SUM(number_dane_gun) AS number_dane_gun,
            SUM(number_ammunition) AS number_ammunition, 
            SUM(number_caterages) AS number_caterages, 
            SUM(number_vehicle) AS number_vehicle,
            SUM(police_casualties) AS police_casualties, 
            SUM(operative_casualties) AS operative_casualties, 
            SUM(number_others) AS number_others"))
            ->whereYear('incident_date', $year_from)
            ->whereMonth('incident_date', $month_from) 
            // ->groupBy('state_id')
            // ->orderBy('crime_type')
        ->get();
        
        $groupby_type = 'state_id';
        $groupby_name = 'state_id';
        $incident_date1=date_create($date_from);
        $incident_date2=date_create($date_to);
        $incident_date=$date_from; 

        $info = 'Date: '.date_format($incident_date1,"F, Y").''; 

        // dd($sitreps->all());
        return view('sitrep.sitrep.analysis_report', compact('sitreps','info','sitreps_state_total','sitreps_total','incident_date','groupby_type','groupby_name'));
    } // End Mehtod

    public function MonthlyAnalysis(Request $request)
    {

        // dd($request->all());
        $date_from = $request->date_from;
        $date_to = $request->date_to;
            
        // Separate the string into year and month
        list($year_from, $month_from) = explode('-', $date_from);
        list($year_to, $month_to) = explode('-', $date_to);

        $year_from = (int)$year_from;
        $month_from = (int)$month_from;

        $year_to = (int)$year_to;
        $month_to = (int)$month_to;

        // ->whereYear('incident_date', $year_from)
        // ->whereMonth('incident_date', $month_from)
        $incident_date = $date_from;
        $incident_date2 = $date_to;
                 
       // dd($date_to);

      

        // THIS CALCULATES THE TOTAL OF EACH INCIDENT
        $sitreps_total = Sitrep::select(DB::raw(" 
            SUM(CASE WHEN crime_type = 1 THEN `number_incident` ELSE 0 END) AS crime1
            , SUM(CASE WHEN crime_type = 2 THEN `number_incident` ELSE 0 END) AS crime2
            , SUM(CASE WHEN crime_type = 3 THEN `number_incident` ELSE 0 END) AS crime3
            , SUM(CASE WHEN crime_type = 4 THEN `number_incident` ELSE 0 END) AS crime4
            , SUM(CASE WHEN crime_type = 5 THEN `number_incident` ELSE 0 END) AS crime5
            , SUM(CASE WHEN crime_type = 6 THEN `number_incident` ELSE 0 END) AS crime6
            , SUM(CASE WHEN crime_type = 7 THEN `number_incident` ELSE 0 END) AS crime7
            , SUM(CASE WHEN crime_type = 8 THEN `number_incident` ELSE 0 END) AS crime8
            , SUM(CASE WHEN crime_type = 9 THEN `number_incident` ELSE 0 END) AS crime9
            , SUM(CASE WHEN crime_type = 10 THEN `number_incident` ELSE 0 END) AS crime10
            , SUM(CASE WHEN crime_type = 11 THEN `number_incident` ELSE 0 END) AS crime11
            , SUM(CASE WHEN crime_type = 12 THEN `number_incident` ELSE 0 END) AS crime12
            , SUM(CASE WHEN crime_type = 13 THEN `number_incident` ELSE 0 END) AS crime13
            , SUM(CASE WHEN crime_type = 14 THEN `number_incident` ELSE 0 END) AS crime14
            , SUM(CASE WHEN crime_type = 15 THEN `number_incident` ELSE 0 END) AS crime15
            , SUM(CASE WHEN crime_type = 16 THEN `number_incident` ELSE 0 END) AS crime16
            , SUM(CASE WHEN crime_type = 17 THEN `number_incident` ELSE 0 END) AS crime17
            , SUM(CASE WHEN crime_type = 18 THEN `number_incident` ELSE 0 END) AS crime18
            , SUM(CASE WHEN crime_type = 19 THEN `number_incident` ELSE 0 END) AS crime19
            , SUM(CASE WHEN crime_type = 20 THEN `number_incident` ELSE 0 END) AS crime20
            , SUM(`number_incident`) as total_fireamrs"))
                ->where(function ($query) {
                    $query
                    ->where('crime_type','=',1)
                    ->orwhere('crime_type','=',2)
                    ->orwhere('crime_type','=',3)
                    ->orwhere('crime_type','=',4)
                    ->orwhere('crime_type','=',5)
                    ->orwhere('crime_type','=',6)
                    ->orwhere('crime_type','=',7)
                    ->orwhere('crime_type','=',8)
                    ->orwhere('crime_type','=',15)
                    ->orwhere('crime_type','=',17)
                    ->orwhere('crime_type','=',21);
                })
            ->whereYear('incident_date', $year_from)
            ->whereMonth('incident_date', $month_from)
        ->get();
        
      

        
        // THIS DISPLAYS THE NUMBER OF INCIDENTS CHARTS BY STATE
        $sitreps_state = Sitrep::select(DB::raw(" state_id,  
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereYear('incident_date', $year_from)
            ->whereMonth('incident_date', $month_from)
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('state_id')
            // ->orderBy('crime_type')
        ->get();  
        
        // THIS DISPLAYS THE NUMBER OF INCIDENTS CHARTS BY STATE
        $sitreps_state2 = Sitrep::select(DB::raw(" state_id,  
                SUM(number_incident) AS number_incident, 
                SUM(number_victims) AS number_victims, 
                SUM(number_victims_injured) AS number_victims_injured,
                SUM(number_casualties) AS number_casualties,
                SUM(number_victims_rescused) AS number_victims_rescused, 
                SUM(number_arrest) AS number_arrest,
                SUM(suspect_casualties) AS suspect_casualties, 
                SUM(number_firearms) AS number_firearms, 
                SUM(number_dane_gun) AS number_dane_gun,
                SUM(number_ammunition) AS number_ammunition, 
                SUM(number_caterages) AS number_caterages, 
                SUM(number_vehicle) AS number_vehicle,
                SUM(police_casualties) AS police_casualties, 
                SUM(operative_casualties) AS operative_casualties, 
                SUM(number_others) AS number_others"))
            ->whereYear('incident_date', $year_to)
            ->whereMonth('incident_date', $month_to)
            // ->where('sitrep_id','=',$sitrep_id)
            ->groupBy('state_id')
            // ->orderBy('crime_type')
        ->get();  

        // THIS DISPLAYS THE TOTAL NUMBER OF INCIDENTS, ARREST AND OTHERS TABLE
        $sitreps_state_total = Sitrep::select(DB::raw(" 
            SUM(number_incident) AS number_incident, 
            SUM(number_victims) AS number_victims, 
            SUM(number_victims_injured) AS number_victims_injured,
            SUM(number_casualties) AS number_casualties,
            SUM(number_victims_rescused) AS number_victims_rescused, 
            SUM(number_arrest) AS number_arrest,
            SUM(suspect_casualties) AS suspect_casualties, 
            SUM(number_firearms) AS number_firearms, 
            SUM(number_dane_gun) AS number_dane_gun,
            SUM(number_ammunition) AS number_ammunition, 
            SUM(number_caterages) AS number_caterages, 
            SUM(number_vehicle) AS number_vehicle,
            SUM(police_casualties) AS police_casualties, 
            SUM(operative_casualties) AS operative_casualties, 
            SUM(number_others) AS number_others"))
            ->whereYear('incident_date', $year_from)
            ->whereMonth('incident_date', $month_from)
            // ->where('sitrep_id','=',$sitrep_id)
            // ->groupBy('state_id')
            // ->orderBy('crime_type')
        ->get();
        



        $groupby_type = 'state_id';
        $groupby_name = 'state_id';
        $incident_date1=date_create($date_from);
        $incident_date2=date_create($date_to);
        $incident_date=$date_from; 

        // $info = 'Date: '.date_format($incident_date1,"F, Y").''; 
        // $info = 'Date: '.date_format($incident_date1,"F, Y").' & '.date_format($incident_date2,"F, Y").'';
        $info = date_format($incident_date1,"F, Y");
        $info2 = date_format($incident_date2,"F, Y");


        // dd($sitreps->all());
        return view('sitrep.sitrep.analysis_report', compact('sitreps_state','sitreps_state2','info2','info','sitreps_state_total','sitreps_total','incident_date','groupby_type','groupby_name'));
    } // End Mehtod

   public function Yearlytrends(Request $request) 
    {
        $request->validate([
            'date_from' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        $date_from = $request->date_from;
        $year = $date_from;
        
        // Calculate monthly totals for each crime type
        $sitreps_total = Sitrep::select(DB::raw(" 
            MONTH(incident_date) as month,
            SUM(CASE WHEN crime_type = 1 THEN `number_incident` ELSE 0 END) AS crime1
            , SUM(CASE WHEN crime_type = 2 THEN `number_incident` ELSE 0 END) AS crime2
            , SUM(CASE WHEN crime_type = 3 THEN `number_incident` ELSE 0 END) AS crime3
            , SUM(CASE WHEN crime_type = 4 THEN `number_incident` ELSE 0 END) AS crime4
            , SUM(CASE WHEN crime_type = 5 THEN `number_incident` ELSE 0 END) AS crime5
            , SUM(CASE WHEN crime_type = 6 THEN `number_incident` ELSE 0 END) AS crime6
            , SUM(CASE WHEN crime_type = 7 THEN `number_incident` ELSE 0 END) AS crime7
            , SUM(CASE WHEN crime_type = 8 THEN `number_incident` ELSE 0 END) AS crime8
            , SUM(CASE WHEN crime_type = 9 THEN `number_incident` ELSE 0 END) AS crime9
            , SUM(CASE WHEN crime_type = 10 THEN `number_incident` ELSE 0 END) AS crime10
            , SUM(CASE WHEN crime_type = 11 THEN `number_incident` ELSE 0 END) AS crime11
            "))
            ->whereYear('incident_date', $year)
            ->groupBy(DB::raw('MONTH(incident_date)'))
            ->orderBy('month')
            ->get();

        // Calculate yearly totals for each crime type (for bar chart)
        $sitreps_total_bar = Sitrep::select(DB::raw(" 
            SUM(CASE WHEN crime_type = 1 THEN `number_incident` ELSE 0 END) AS crime1
            , SUM(CASE WHEN crime_type = 2 THEN `number_incident` ELSE 0 END) AS crime2
            , SUM(CASE WHEN crime_type = 3 THEN `number_incident` ELSE 0 END) AS crime3
            , SUM(CASE WHEN crime_type = 4 THEN `number_incident` ELSE 0 END) AS crime4
            , SUM(CASE WHEN crime_type = 5 THEN `number_incident` ELSE 0 END) AS crime5
            , SUM(CASE WHEN crime_type = 6 THEN `number_incident` ELSE 0 END) AS crime6
            , SUM(CASE WHEN crime_type = 7 THEN `number_incident` ELSE 0 END) AS crime7
            , SUM(CASE WHEN crime_type = 8 THEN `number_incident` ELSE 0 END) AS crime8
            , SUM(CASE WHEN crime_type = 9 THEN `number_incident` ELSE 0 END) AS crime9
            , SUM(CASE WHEN crime_type = 10 THEN `number_incident` ELSE 0 END) AS crime10
            , SUM(CASE WHEN crime_type = 11 THEN `number_incident` ELSE 0 END) AS crime11
            "))
            ->whereYear('incident_date', $year)
            ->first();

        // Get crime type names
        $crimeTypes = Crime_type::all()->keyBy('id');
        
        // Calculate statistics
        $monthNames = [
            '01' => 'January', '02' => 'February', '03' => 'March',
            '04' => 'April', '05' => 'May', '06' => 'June',
            '07' => 'July', '08' => 'August', '09' => 'September',
            '10' => 'October', '11' => 'November', '12' => 'December'
        ];

        // Prepare monthly totals for each crime type
        $monthlyTotals = [];
        $allMonthsData = [];
        
        // Initialize arrays for all 12 months
        for ($i = 1; $i <= 12; $i++) {
            $monthLabel = $monthNames[str_pad($i, 2, '0', STR_PAD_LEFT)];
            $allMonthsData[$monthLabel] = [
                'total' => 0,
                'crime1' => 0,
                'crime2' => 0,
                'crime3' => 0,
                'crime4' => 0,
                'crime5' => 0,
            ];
        }

        // Fill in actual data
        foreach ($sitreps_total as $data) {
            $monthLabel = $monthNames[str_pad($data->month, 2, '0', STR_PAD_LEFT)];
            $allMonthsData[$monthLabel] = [
                'total' => $data->crime1 + $data->crime2 + $data->crime3 + $data->crime4 + $data->crime5,
                'crime1' => $data->crime1,
                'crime2' => $data->crime2,
                'crime3' => $data->crime3,
                'crime4' => $data->crime4,
                'crime5' => $data->crime5,
            ];
        }

        // Calculate overall statistics
        $totalIncidents = $sitreps_total_bar ? 
            ($sitreps_total_bar->crime1 + $sitreps_total_bar->crime2 + $sitreps_total_bar->crime3 + 
            $sitreps_total_bar->crime4 + $sitreps_total_bar->crime5) : 0;
        
        $averageIncidents = count($sitreps_total) > 0 ? 
            round($totalIncidents / count($sitreps_total), 2) : 0;

        // Find peak month
        $maxIncidents = 0;
        $peakMonth = 'N/A';
        $monthlyTotalsArray = [];
        
        foreach ($allMonthsData as $month => $data) {
            $monthlyTotalsArray[$month] = $data['total'];
            if ($data['total'] > $maxIncidents) {
                $maxIncidents = $data['total'];
                $peakMonth = $month;
            }
        }

        $minIncidents = count($monthlyTotalsArray) > 0 ? min($monthlyTotalsArray) : 0;

        $incident_date1 = date_create($year . '-01-01');
        $info = ' '.date_format($incident_date1,"Y").' ';
        
        return view('sitrep.sitrep.trend_report', 
            compact('info', 'sitreps_total', 'year', 'sitreps_total_bar', 
                    'allMonthsData', 'totalIncidents', 'averageIncidents', 
                    'maxIncidents', 'minIncidents', 'peakMonth'));
    }

  public function MonthlyTrends(Request $request)
{
    $request->validate([
        'crime_type' => 'required|integer',
        'start_month' => 'required|integer|min:1|max:12',
        'end_month' => 'required|integer|min:1|max:12',
        'year' => 'required|integer',
        'state_id' => 'nullable|integer'
    ]);

    $crimeTypeId = $request->crime_type;
    $startMonth = $request->start_month;
    $endMonth = $request->end_month;
    $year = $request->year;
    $stateId = $request->state_id;
    
    // Get crime type name
    $crimeType = Crime_type::find($crimeTypeId);
    $crimeTypeName = $crimeType ? $crimeType->crime_type : 'Unknown Crime';
    
    // Get state name if selected
    $stateName = null;
    $selectedStateName = null;
    if ($stateId) {
        $state = State::find($stateId);
        $stateName = $state ? $state->name : 'Unknown State';
        $selectedStateName = $stateName; // Store for query use
    } else {
        $stateName = 'All States';
    }
    
    // Swap months if start is greater than end
    if ($startMonth > $endMonth) {
        $temp = $startMonth;
        $startMonth = $endMonth;
        $endMonth = $temp;
    }
    
    // Generate array of months in the selected range
    $monthRange = [];
    $monthLabels = [];
    $monthNames = [
        '01' => 'January', '02' => 'February', '03' => 'March',
        '04' => 'April', '05' => 'May', '06' => 'June',
        '07' => 'July', '08' => 'August', '09' => 'September',
        '10' => 'October', '11' => 'November', '12' => 'December'
    ];
    
    for ($month = $startMonth; $month <= $endMonth; $month++) {
        $monthFormatted = str_pad($month, 2, '0', STR_PAD_LEFT);
        $monthRange[] = $monthFormatted;
        $monthLabels[] = $monthNames[$monthFormatted];
    }
    
    // Build the query
    $query = Sitrep::select(
            DB::raw('MONTH(incident_date) as month'),
            DB::raw('SUM(number_incident) as total_incidents')
        )
        ->where('crime_type', $crimeTypeId)
        ->whereYear('incident_date', $year)
        ->whereIn(DB::raw('MONTH(incident_date)'), $monthRange);
    
    // MODIFIED: Use state name instead of ID
    if ($stateId && $selectedStateName) {
        $query->where('state_id', $selectedStateName);
    }
    
    // Complete the query
    $monthlyTrends = $query->groupBy(DB::raw('MONTH(incident_date)'))
        ->orderBy('month')
        ->get();
    
    // Initialize data array with zeros for all months in range
    $trendData = [];
    foreach ($monthRange as $month) {
        $monthNum = (int)$month;
        $found = false;
        
        foreach ($monthlyTrends as $trend) {
            if ($trend->month == $monthNum) {
                $trendData[] = $trend->total_incidents;
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            $trendData[] = 0;
        }
    }
    
    // Calculate statistics
    $totalIncidents = array_sum($trendData);
    $averageIncidents = count($trendData) > 0 ? round($totalIncidents / count($trendData), 2) : 0;
    $maxIncidents = max($trendData);
    $minIncidents = min($trendData);
    
    // Get peak month
    $peakIndex = array_search($maxIncidents, $trendData);
    $peakMonth = isset($monthLabels[$peakIndex]) ? $monthLabels[$peakIndex] : 'N/A';
    
    // Get comparative data (for all states vs selected state if applicable)
    $comparativeData = null;
    if ($stateId && $selectedStateName) {
        // Get data for all states for comparison
        $allStatesQuery = Sitrep::select(
                DB::raw('MONTH(incident_date) as month'),
                DB::raw('SUM(number_incident) as total_incidents')
            )
            ->where('crime_type', $crimeTypeId)
            ->whereYear('incident_date', $year)
            ->whereIn(DB::raw('MONTH(incident_date)'), $monthRange)
            ->groupBy(DB::raw('MONTH(incident_date)'))
            ->orderBy('month');
        
        $allStatesTrends = $allStatesQuery->get();
        
        // Prepare comparative data
        $allStatesData = [];
        foreach ($monthRange as $month) {
            $monthNum = (int)$month;
            $found = false;
            
            foreach ($allStatesTrends as $trend) {
                if ($trend->month == $monthNum) {
                    $allStatesData[] = $trend->total_incidents;
                    $found = true;
                    break;
                }
            }
            
            if (!$found) {
                $allStatesData[] = 0;
            }
        }
        
        $comparativeData = [
            'state_data' => $trendData,
            'all_states_data' => $allStatesData,
            'state_name' => $stateName,
            'state_total' => array_sum($trendData),
            'all_states_total' => array_sum($allStatesData)
        ];
    }
    
    return view('sitrep.sitrep.monthly_trend_report', compact(
        'crimeTypeName',
        'stateName',
        'monthLabels',
        'trendData',
        'year',
        'startMonth',
        'endMonth',
        'totalIncidents',
        'averageIncidents',
        'maxIncidents',
        'minIncidents',
        'peakMonth',
        'comparativeData'
    ));
}

    

















    
}
