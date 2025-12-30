<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sitrep;
use App\Models\State;
use App\Models\Crime_type;
use DB;

class CrimeHotspotController extends Controller
{
    public function index()
    {
        return view('sitrep.sitrep.crime_hotspot');
    }

    public function getHotspotData(Request $request)
    {
        $request->validate([
            'year' => 'nullable|integer|min:2000|max:' . date('Y'),
            'crime_type' => 'nullable|integer',
            'month' => 'nullable|integer|min:1|max:12',
        ]);

        $year = $request->year ?? date('Y');
        $crimeTypeId = $request->crime_type;
        $month = $request->month;

        // Get all states
        $states = State::orderBy('name')->get();
        
        // Build query
        $query = Sitrep::select(
            'state_id',
            DB::raw('SUM(number_incident) as total_incidents'),
            DB::raw('COUNT(*) as incident_count')
        )
        ->whereYear('incident_date', $year);

        if ($crimeTypeId) {
            $query->where('crime_type', $crimeTypeId);
        }

        if ($month) {
            $query->whereMonth('incident_date', $month);
        }

        $hotspotData = $query->groupBy('state_id')
            ->orderBy('total_incidents', 'DESC')
            ->get();

        // Prepare data for map
        $mapData = [];
        $totalNationalIncidents = 0;
        $stateDetails = [];

        foreach ($states as $state) {
            $stateIncidents = $hotspotData->firstWhere('state_id', $state->name);
            $incidents = $stateIncidents ? (int)$stateIncidents->total_incidents : 0;
            $incidentCount = $stateIncidents ? (int)$stateIncidents->incident_count : 0;
            
            $totalNationalIncidents += $incidents;
            
            // Determine intensity level (1-5)
            $intensity = $this->calculateIntensity($incidents);
            
            $stateDetails[] = [
                'state_id' => $state->id,
                'state_name' => $state->name,
                'incidents' => $incidents,
                'incident_count' => $incidentCount,
                'intensity' => $intensity,
                'latitude' => $state->latitude ?? $this->getStateCoordinates($state->name)['latitude'],
                'longitude' => $state->longitude ?? $this->getStateCoordinates($state->name)['longitude'],
            ];
        }

        // Sort states by incidents descending
        usort($stateDetails, function($a, $b) {
            return $b['incidents'] - $a['incidents'];
        });

        // Get top hotspots
        $topHotspots = array_slice($stateDetails, 0, 5);

        // Get crime type name if filtered
        $crimeTypeName = 'All Crimes';
        if ($crimeTypeId) {
            $crimeType = Crime_type::find($crimeTypeId);
            $crimeTypeName = $crimeType ? $crimeType->crime_type : 'Unknown Crime';
        }

        return response()->json([
            'success' => true,
            'map_data' => $stateDetails,
            'top_hotspots' => $topHotspots,
            'total_national_incidents' => $totalNationalIncidents,
            'year' => $year,
            'crime_type' => $crimeTypeName,
            'month' => $month ? date('F', mktime(0, 0, 0, $month, 1)) : 'All Months',
        ]);
    }

    private function calculateIntensity($incidents)
    {
        if ($incidents == 0) return 0;
        if ($incidents <= 10) return 1;
        if ($incidents <= 50) return 2;
        if ($incidents <= 100) return 3;
        if ($incidents <= 200) return 4;
        return 5; // Very high intensity
    }

    private function getStateCoordinates($stateName)
    {
        // Default coordinates for Nigerian states (approximate)
        $coordinates = [
            'Abia' => ['latitude' => 5.4527, 'longitude' => 7.5248],
            'Adamawa' => ['latitude' => 9.3265, 'longitude' => 12.3984],
            'Akwa Ibom' => ['latitude' => 5.0389, 'longitude' => 7.9096],
            'Anambra' => ['latitude' => 6.2209, 'longitude' => 6.9370],
            'Bauchi' => ['latitude' => 10.3010, 'longitude' => 9.8237],
            'Bayelsa' => ['latitude' => 4.7719, 'longitude' => 6.0699],
            'Benue' => ['latitude' => 7.3369, 'longitude' => 8.7404],
            'Borno' => ['latitude' => 11.8846, 'longitude' => 13.1520],
            'Cross River' => ['latitude' => 5.8702, 'longitude' => 8.5988],
            'Delta' => ['latitude' => 5.7040, 'longitude' => 5.9339],
            'Ebonyi' => ['latitude' => 6.2649, 'longitude' => 8.0137],
            'Edo' => ['latitude' => 6.6342, 'longitude' => 5.9304],
            'Ekiti' => ['latitude' => 7.7180, 'longitude' => 5.3110],
            'Enugu' => ['latitude' => 6.4584, 'longitude' => 7.5464],
            'FCT' => ['latitude' => 9.0765, 'longitude' => 7.3986],
            'Gombe' => ['latitude' => 10.2791, 'longitude' => 11.1731],
            'Imo' => ['latitude' => 5.5720, 'longitude' => 7.0588],
            'Jigawa' => ['latitude' => 12.2280, 'longitude' => 9.5616],
            'Kaduna' => ['latitude' => 10.5264, 'longitude' => 7.4388],
            'Kano' => ['latitude' => 11.9965, 'longitude' => 8.5167],
            'Katsina' => ['latitude' => 12.9855, 'longitude' => 7.6177],
            'Kebbi' => ['latitude' => 12.4500, 'longitude' => 4.1996],
            'Kogi' => ['latitude' => 7.8027, 'longitude' => 6.7333],
            'Kwara' => ['latitude' => 8.9669, 'longitude' => 4.3874],
            'Lagos' => ['latitude' => 6.5244, 'longitude' => 3.3792],
            'Nasarawa' => ['latitude' => 8.4991, 'longitude' => 8.1997],
            'Niger' => ['latitude' => 9.9300, 'longitude' => 5.5983],
            'Ogun' => ['latitude' => 6.9980, 'longitude' => 3.4737],
            'Ondo' => ['latitude' => 7.2570, 'longitude' => 5.2058],
            'Osun' => ['latitude' => 7.5629, 'longitude' => 4.5200],
            'Oyo' => ['latitude' => 7.3775, 'longitude' => 3.9470],
            'Plateau' => ['latitude' => 9.2182, 'longitude' => 9.5179],
            'Rivers' => ['latitude' => 4.8396, 'longitude' => 6.9112],
            'Sokoto' => ['latitude' => 13.0660, 'longitude' => 5.2413],
            'Taraba' => ['latitude' => 8.3803, 'longitude' => 10.7733],
            'Yobe' => ['latitude' => 12.2939, 'longitude' => 11.4390],
            'Zamfara' => ['latitude' => 12.1222, 'longitude' => 6.2236],
        ];

        return $coordinates[$stateName] ?? ['latitude' => 9.0820, 'longitude' => 8.6753]; // Default to Nigeria center
    }

    public function getStateDetails($stateName, Request $request)
    {
        $request->validate([
            'year' => 'nullable|integer',
            'crime_type' => 'nullable|integer',
        ]);

        $year = $request->year ?? date('Y');
        $crimeTypeId = $request->crime_type;

        $query = Sitrep::where('state_id', $stateName)
            ->whereYear('incident_date', $year);

        if ($crimeTypeId) {
            $query->where('crime_type', $crimeTypeId);
        }

        $totalIncidents = $query->sum('number_incident');
        $incidentCount = $query->count();
        
        // Get monthly breakdown
        $monthlyData = Sitrep::select(
                DB::raw('MONTH(incident_date) as month'),
                DB::raw('SUM(number_incident) as total')
            )
            ->where('state_id', $stateName)
            ->whereYear('incident_date', $year);

        if ($crimeTypeId) {
            $monthlyData->where('crime_type', $crimeTypeId);
        }

        $monthlyData = $monthlyData->groupBy(DB::raw('MONTH(incident_date)'))
            ->orderBy('month')
            ->get();

        // Get all crime types first
        $allCrimeTypes = Crime_type::all()->keyBy('id');
        
        // Get top crime types
        $topCrimes = Sitrep::select(
                'crime_type',
                DB::raw('SUM(number_incident) as total')
            )
            ->where('state_id', $stateName)
            ->whereYear('incident_date', $year)
            ->groupBy('crime_type')
            ->orderBy('total', 'DESC')
            ->limit(5)
            ->get()
            ->map(function ($item) use ($allCrimeTypes) {
                // Add crime type name
                $crimeType = $allCrimeTypes->get($item->crime_type);
                $item->crime_type_name = $crimeType ? $crimeType->crime_type : 'Unknown Crime Type ' . $item->crime_type;
                return $item;
            });

        return response()->json([
            'success' => true,
            'state_name' => $stateName,
            'total_incidents' => $totalIncidents,
            'incident_count' => $incidentCount,
            'monthly_data' => $monthlyData,
            'top_crimes' => $topCrimes,
        ]);
    }
}