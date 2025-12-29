<?php

use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\CrimeHotspotController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sitrep\AdminController;
use App\Http\Controllers\Sitrep\VendorController;
use App\Http\Controllers\Sitrep\UserController;
use App\Http\Controllers\Sitrep\SitrepController;  


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/sam', function () {
    return view('welcome');
});

Route::get('/', [UserController::class, 'UserLogin']);


// Route::get('/dashboard', function () {
//     return view('sitrep.admin.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ADMIN ROUTES
Route::middleware(['auth', 'role:admin'])->group(function(){ 
    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard'); 
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard'); 
    Route::post('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard2'); 
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');

// USER REGISTRATION ROUTES
    Route::get('/register/analyst', [AdminController::class, 'RegisterAnalyst'])->name('register.analyst');
    Route::post('/store/analyst', [AdminController::class, 'StoreAnalyst'])->name('store.analyst'); 
    Route::get('/active/analyst', [AdminController::class, 'ActiveAnalyst'])->name('active.analyst'); 
    Route::get('/inactive/analyst', [AdminController::class, 'InactiveAnalyst'])->name('inactive.analyst'); 
    Route::get('/inactive/analyst/details/{id}', [AdminController::class, 'InactiveAnalystDetails'])->name('inactive.analyst.details');   

    Route::get('/inactive/analyst/details/{id}', [AdminController::class, 'InactiveAnalystDetails'])->name('inactive.analyst.details');   
    Route::get('/active/analyst/details/{id}', [AdminController::class, 'ActiveAnalystDetails'])->name('active.analyst.details'); 
    Route::post('/deactivate/analyst', [AdminController::class, 'DeactivateAnalyst'])->name('deactivate.analyst'); 
    Route::post('/activate/analyst', [AdminController::class, 'ActivateAnalyst'])->name('activate.analyst'); 







    // GENERATE REPORT
        Route::post('/daily/report', [SitrepController::class, 'DailyReport'])->name('daily.report');
        Route::post('/monthly/report', [SitrepController::class, 'MonthlyReport'])->name('monthly.report');
        Route::post('/custom/report', [SitrepController::class, 'CustomReport'])->name('custom.report');
        Route::post('/validate/report', [SitrepController::class, 'ValidateReport'])->name('validate.report');

    // SITREP ANALYSIS 
    Route::post('/yearly/analysis', [SitrepController::class, 'YearlyAnalysis'])->name('yearly.analysis');
    Route::post('/monthly/analysis', [SitrepController::class, 'MonthlyAnalysis'])->name('monthly.analysis');
    Route::post('/custom/analysis', [SitrepController::class, 'CustomanAlysis'])->name('custom.analysis');

    // SITREP TRENDS` 
    Route::post('/yearly/trends', [SitrepController::class, 'Yearlytrends'])->name('yearly.trends');
    // Route::post('/monthly/trends', [SitrepController::class, 'Monthlytrends'])->name('monthly.trends');
    Route::post('/custom/trends', [SitrepController::class, 'Customtrends'])->name('custom.trends');
    // Route::post('/monthly/trends', [SitrepController::class, 'MonthlyTrends'])->name('monthly.trends');
    Route::post('/monthly/trends', [SitrepController::class, 'MonthlyTrends'])->name('monthly.trends');


    // SITREP hotspots` 
    Route::post('/yearly/hotspots', [SitrepController::class, 'Yearlyhotspots'])->name('yearly.hotspots');
    // Route::post('/monthly/hotspots', [SitrepController::class, 'Monthlyhotspots'])->name('monthly.hotspots');
    Route::post('/custom/hotspots', [SitrepController::class, 'Customhotspots'])->name('custom.hotspots');
    // Route::post('/monthly/hotspots', [SitrepController::class, 'Monthlyhotspots'])->name('monthly.hotspots');
    Route::post('/monthly/hotspots', [SitrepController::class, 'Monthlyhotspots'])->name('monthly.hotspots');


    Route::get('/crime-hotspot', [CrimeHotspotController::class, 'index'])->name('crime.hotspot');
    Route::post('/crime-hotspot/data', [CrimeHotspotController::class, 'getHotspotData'])->name('crime.hotspot.data');
    Route::get('/crime-hotspot/state-details/{stateName}', [CrimeHotspotController::class, 'getStateDetails'])->name('crime.hotspot.state.details');

    
});
Route::get('/admin/login', [AdminController::class, 'AdminLogin']);



// VENDOR / MANAGEMENT ROUTES
Route::middleware(['auth', 'role:vendor'])->group(function(){
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard2');


    // Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard'); 
    // Route::post('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard2'); 



    Route::get('/vendor/logout', [VendorController::class, 'VendorDestroy'])->name('vendor.logout');
    Route::get('/vendor/profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');
    Route::post('/vendor/profile/store', [VendorController::class, 'VendorProfileStore'])->name('vendor.profile.store');
    Route::get('/vendor/change/password', [VendorController::class, 'VendorChangePassword'])->name('vendor.change.password');
    Route::post('/vendor/update/password', [VendorController::class, 'VendorUpdatePassword'])->name('update.password');
});
Route::get('/vendor/login', [VendorController::class, 'VendorLogin']);


// USER ROUTES
Route::middleware(['auth', 'role:user'])->group(function(){
    Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
    Route::get('/user/logout', [UserController::class, 'UserDestroy'])->name('user.logout');
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('update.password');
});
Route::get('/user/login', [UserController::class, 'UserLogin']);

// GENERAL ROUTES
Route::middleware('auth')->group(function () {
    Route::get('/admin/add/sitrep/', [SitrepController::class, 'AdminAddSitrep'])->name('admin.add.sitrep'); 
    Route::get('/state/add/sitrep/', [SitrepController::class, 'StateAddSitrep'])->name('state.add.sitrep'); 
    Route::post('/admin/submit/sitrep/', [SitrepController::class, 'AdminSubmitSitrep'])->name('admin.submit.sitrep');
    Route::post('/state/submit/sitrep/', [SitrepController::class, 'StateSubmitSitrep'])->name('state.submit.sitrep');
    Route::get('/edit/sitrep/{id}', [SitrepController::class, 'EditSitrep'])->name('admin.edit.sitrep');
    Route::get('/state/edit/sitrep/{id}', [SitrepController::class, 'StateEditSitrep'])->name('state.edit.sitrep');
    Route::post('/edit/update/', [SitrepController::class, 'UpdateSitrep'])->name('admin.update.sitrep');
    Route::post('/edit/state/', [SitrepController::class, 'StateUpdateSitrep'])->name('state.update.sitrep');
   // Route::get('/oedit/admin/{id}', 'admin_edit_sitrep')->name('admin.edit.sitrep'); 
    Route::get('/ioo/sitrep', [SitrepController::class, 'ViewSitrep'])->name('view.ioo.sitrep'); 
    Route::get('/ioo_state/sitrep', [SitrepController::class, 'ViewStateSitrep'])->name('view.ioo_state.sitrep'); 
    // Route::get('/all/sitrep', [SitrepController::class, 'ViewSitrepALL'])->name('view.all.sitrep');

    Route::get('/locations', [SitrepController::class, 'index'])->name('locations.index');
    Route::get('/get-cities', [SitrepController::class, 'getCities'])->name('locations.get_cities');

});

// TRENDS ROUTES
Route::middleware('auth')->group(function () {
    Route::get('/admin/add/trend/', [SitrepController::class, 'AdminAddtrend'])->name('admin.add.trend'); 
    Route::get('/state/add/trend/', [SitrepController::class, 'StateAddtrend'])->name('state.add.trend'); 
    Route::post('/admin/submit/trend/', [SitrepController::class, 'AdminSubmittrend'])->name('admin.submit.trend');
    Route::post('/state/submit/trend/', [SitrepController::class, 'StateSubmittrend'])->name('state.submit.trend');
    Route::get('/edit/trend/{id}', [SitrepController::class, 'Edittrend'])->name('admin.edit.trend');
    Route::get('/state/edit/trend/{id}', [SitrepController::class, 'StateEdittrend'])->name('state.edit.trend');
    Route::post('/edit/update/trend/', [SitrepController::class, 'Updatetrend'])->name('admin.update.trend');
    Route::post('/edit/state/trend/', [SitrepController::class, 'StateUpdatetrend'])->name('state.update.trend');
   // Route::get('/oedit/admin/{id}', 'admin_edit_trend')->name('admin.edit.trend'); 
    Route::get('/admin/trend', [SitrepController::class, 'Viewtrend'])->name('view.admin.trend'); 
    Route::get('/ioo_state/trend', [SitrepController::class, 'ViewStatetrend'])->name('view.ioo_state.trend'); 
    // Route::get('/all/trend', [SitrepController::class, 'ViewtrendALL'])->name('view.all.trend');

    Route::get('/locations', [SitrepController::class, 'index'])->name('locations.index');
    Route::get('/get-cities', [SitrepController::class, 'getCities'])->name('locations.get_cities');

});

// Route::middleware(['auth', 'verified'])->group(function () {
//     // Sitrep CRUD Routes
//     Route::prefix('sitrep')->group(function () {
//         Route::get('/', [SitrepController::class, 'index'])->name('sitrep.index');
//         Route::get('/create', [SitrepController::class, 'create'])->name('sitrep.create');
//         Route::post('/store', [SitrepController::class, 'store'])->name('sitrep.store');
//         Route::get('/{sitrep}', [SitrepController::class, 'show'])->name('sitrep.show');
//         Route::get('/{sitrep}/edit', [SitrepController::class, 'edit'])->name('sitrep.edit');
//         Route::put('/{sitrep}', [SitrepController::class, 'update'])->name('sitrep.update');
//         Route::delete('/{sitrep}', [SitrepController::class, 'destroy'])->name('sitrep.destroy');
        
//         // Additional custom routes if needed
//         //Route::get('/{sitrep}/print', [SitrepController::class, 'print'])->name('sitrep.print');
//     });

   
// });




