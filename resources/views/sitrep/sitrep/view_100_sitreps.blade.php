@extends('sitrep.admin.admin_dashboard')
@section('admin')


<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Sitrep</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Sitrep</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto"></div>
    </div>

	<div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">

				  
				<table  class="table table-bordered table-striped">
                                   
                                  
                                
								   @php
								   $i=0;
								   $j=0;
								   @endphp
									 @foreach($sitreps as $sitrep)
									 <thead class="text-dark">
									 <tr>
									   <th>S/N</th>
									   <th colspan="3">Crime / Incident Type</th>
									   <th style="background-color: lightblue;" class="vertical-text-table">Victims Abducted</th>
									   <th style="background-color: lightblue;" class="vertical-text-table">Victims Injured</th>
									   <th style="background-color: pink;" class="vertical-text-table">Victims Killed</th>
									   <th style="background-color: lightblue;" class="vertical-text-table">Victims Rescused</th>
									   <th style="background-color: lightyellow;" class="vertical-text-table">Suspects Arrested</th>
									   <th style="background-color: lightyellow;" class="vertical-text-table">Suspects Neutralised</th>
									   <th style="background-color: lightgreen;" class="vertical-text-table">Firearms Recovered</th>
									   <th style="background-color: lightgreen;"  class="vertical-text-table">Dane Guns /Fabricated Guns Recovered</th>
									   <th style="background-color: lightgreen;"  class="vertical-text-table">Ammunitions Recovered</th>
									   <th style="background-color: lightgreen;"  class="vertical-text-table">Caterages Recovered</th>
									   <th style="background-color: lightgreen;"   class="vertical-text-table">Vehicles Recovered</th>
									   <th style="background-color: lightgreen;"  class="vertical-text-table">Other Items Recovered</th>
									   <th style="background-color: pink;" class="vertical-text-table">Polices KIA</th>
									   <th style="background-color: pink;" class="vertical-text-table">Other Personnel KIA</th> 
									 </tr>
								   </thead>
									 <tbody>
									 <tr>                    
									   <td>{{$i=$i+1}}</td> 
									   <td colspan="3"> <b>  {{ $sitrep['crime_type_details']['crime_type']}} </b></td>
										 <td align="center">{{$sitrep->number_victims}}</td>
										 <td align="center">{{$sitrep->number_victims_injured}}</td>
										 <td align="center">{{$sitrep->number_casualties}}</td>
										  <td align="center">{{$sitrep->number_victims_rescused}}</td>
										  <td align="center">{{$sitrep->number_arrest}}</td>
										  <td align="center">{{$sitrep->suspect_casualties}}</td>
										 <td align="center">{{$sitrep->number_firearms}}</td>
										 <td align="center">{{$sitrep->number_dane_gun}}</td>
										 <td align="center">{{$sitrep->number_ammunition}}</td>
										 <td align="center">{{$sitrep->number_caterages}}</td>
										 <td align="center">{{$sitrep->number_vehicle}}</td>
										 <td align="center">{{$sitrep->number_others}}</td>
										 <td align="center">{{$sitrep->police_casualties}}</td>
										 <td align="center">{{$sitrep->operative_casualties}}</td>
 
								   </tr>  
 
 
											 @php
												 $sitrep_details = App\Models\Sitrep_Detail::select(DB::raw(" * "))
												 ->where('sitrep_id','=',$sitrep->sitrep_id)
												 ->get();
 
												 $predicate_crimes = App\Models\Sitrep::select(DB::raw(" * "))
												 ->where('sitrep_id','=',$sitrep->sitrep_id)
												 ->where('remarks','=',0)
												 ->get();
											 @endphp
 
											 @foreach ($sitrep_details as $sitrep_detail)
											
 
											 <tr>
											 <td> </td>
											 <td colspan="3">
											   @foreach ($predicate_crimes as $item)
												 {{ $item['crime_type_details']['crime_type']}}</br> 
											   @endforeach
											   </br> {{$sitrep_detail->incident_date}}
											 </td>
											 <td class="vertical-text-table"><b>Incident Narration:</b></td>
											 <td colspan="12">{{$sitrep_detail->crime_description}}</td>
											 <!-- <td class="vertical-text-table"><b>Police Action :</b></td>
											 <td colspan="5">{{$sitrep_detail->police_action}}</td> -->
											 <td><a class="btn btn-success" href="{{route('admin.edit.sitrep', $sitrep->id)}}">Edit  </a></td>
											 </tr>
											 @endforeach
 
								   @endforeach                           
								   </tfoot>
							   </table>
 

</div>
</div>
</div>
</div>

@endsection