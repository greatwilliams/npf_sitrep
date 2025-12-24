<?php

namespace App\Http\Controllers\Sitrep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


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
use Carbon\Carbon; 
// use Illuminate\Support\Facades\Auth as FacadesAuth;
use DB;
// use App\Http\Controllers\CAL_MONTH_GREGORIAN_SHORT;

class VendorController extends Controller
{
    public function VendorDashboard(Request $request)
      {

        // dd($request->all());
        
        $date_from = $request->date_from;
        $date_to = $request->date_to;

        if ($request->date_from == '') 
        { 
            $date_from = now(-24); 
            $date_to = now();
            $incident_date = $date_from;
            $incident_date2 = $date_to;
        }
         else {
            $date_from = $request->date_from;
            $date_to = $request->date_to;
            $incident_date = $date_from;
            $incident_date2 = $date_to;
        }
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
            // ->orderBy('crime_type')
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

        if ($request->date_from == '') 
            { $info = 'Sitreps in the Last 24 Hours';  }
        else{ $info = 'Sitrep from '.date_format($incident_date1,"jS F, Y").' to '.date_format($incident_date2,"jS F, Y").'';  }

        // dd($sitreps->all());
        return view('sitrep.admin.index', compact('sitreps','sitrep_details','info','sitreps_state_total','sitreps_total','sitreps_crime_type','sitreps_crime_type_state','incident_date','groupby_type','groupby_name'));
    } // End Mehtod 

    public function AdminLogin(){
        return view('sitrep.admin.admin_login');
    } // End Mehtod 


    public function AdminDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect('/admin/login');
    } // End Mehtod 

    public function AdminProfile(){
        $id = Auth::user()->id;

        $adminData = User::find($id);

        return view('sitrep.admin.admin_profile_view',compact('adminData'));

    } // End Mehtod 

    public function AdminProfileStore(Request $request){
 
         $id = Auth::user()->id;
         $data = User::find($id);
         $data->rank = $request->rank;
         $data->full_name = $request->full_name;
         $data->email = $request->email;
         $data->phone = $request->phone;
         $data->ap_number = $request->ap_number;

       
         if ($request->file('photo')) {
             $file = $request->file('photo');
             @unlink(public_path('sitrep/upload/admin_images/'.$data->photo));
             $filename = date('YmdHi').$file->getClientOriginalName();
             $file->move(public_path('sitrep/upload/admin_images'),$filename);
             $data['photo'] = $filename;
         }
 
         $data->save();
 
         return redirect()->back();
         $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
 
     } // End Mehtod 


     public function AdminChangePassword(){
        return view('sitrep.admin.admin_change_password');
     } // End Mehtod 


     public function AdminUpdatePassword(Request $request){
        // Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed', 
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password 
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("status", " Password Changed Successfully");

    } // End Mehtod 

    public function RegisterAnalyst(){
        return view('sitrep.admin.register_analyst'); 
    } // End Mehtod 

     public function StoreAnalyst(Request $request)
    {
        // dd($request->all());
         $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'ap_number' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //    'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::insert([
            'rank' => $request->rank,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'ap_number' => $request->ap_number,
            'state' => $request->state,
            'role' =>  $request->role, 
            'password' => Hash::make('password'),
        ]);
       // Alert::success('Analyst / Admin Registration','State Analyst / Federal Admin Registered Successfully');
        return redirect()->back();
    }

     public function Inactiveanalyst(){
        $inActiveAnalyst = User::where('status','inactive')->where('role','vendor')->latest()->get();
        return view('sitrep.admin.inactive_analyst',compact('inActiveAnalyst'));
    }// End Mehtod 

    // public function Activeanalyst(){
    //     $ActiveAnalyst = User::where('status','active')->where('role','vendor')->latest()->get();
    //     return view('admin.active_analyst',compact('ActiveAnalyst'));
    // }// End Mehtod 

    public function Activeanalyst(){
        $inActiveAnalyst = User::where('status','active')->where('role','vendor')->latest()->get();
        $active_status = "Active";
        return view('sitrep.admin.active_analyst',compact('inActiveAnalyst','active_status'));
    }// End Mehtod 

    public function ActiveAnalystDetails($id){
        $active_status = "Active";
        $ActiveAnalystDetails = User::findOrFail($id);
        return view('sitrep.admin.active_analyst_details',compact('ActiveAnalystDetails', 'active_status'));
    }// End Mehtod 

    
     public function inActiveAnalystDetails($id){
        $active_status = "In-Active";
        $inActiveAnalystDetails = User::findOrFail($id);
        return view('sitrep.admin.inactive_analyst_details',compact('inActiveAnalystDetails', 'active_status'));
    }// End Mehtod 

    
    public function DeactivateAnalyst(Request $request){
        //dd($id);
        $id =$request->user_id;
        $UserData = User::findOrFail($id);
        $UserData->status = 'inactive';
        $UserData->save();
        //Alert::success('Analyst Deactivation','Analyst Deactivated Successfully');
        return redirect()->route('inactive.analyst');
    }
    public function ActivateAnalyst(Request $request){
        //dd($id);
        $id =$request->user_id;
        $UserData = User::findOrFail($id);
        $UserData->status = 'active';
        $UserData->save();
        //Alert::success('Analyst Activation','Analyst Activated Successfully');
        return redirect()->route('active.analyst');
    }

}
