<?php

use App\Models\Appointment;
use App\Models\Mechanic;
use App\Models\My_admin;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\password;

// Home 
Route::get('/', function () {
    $mechanic = Mechanic::all();
    session()->forget('authentic');
    return view('home', ['mechanic' => $mechanic]);
});

// Appointment form
Route::get('/appointment/{id}', function($id) {
    if(Mechanic::find($id)['appointment_count'] == 0) {
        return redirect('/');
    }
    return view('appointment', ['id' => $id]);
});

Route::post('/submitted/{id}', function($id) {
    $mechanic = Mechanic::find($id);
    $appointment_count = $mechanic['appointment_count'];
    $exists = Appointment::where('car_license_number', request('car_license_number'))->exists();
    if($exists) {
        session()->flash('error', 'You already have an appointment.');
        return redirect('/');
    }
    Appointment::create([
        'name' => request('name'),
        'address' => request('address'),
        'phone' => request('phone'),
        'car_license_number' => request('car_license_number'),
        'car_engine_number' => request('car_engine_number'),
        'appointment_date' => request('appointment_date'),
        'mechanic_name' => $mechanic['first_name'] . ' ' . $mechanic['last_name']
    ]);
    $mechanic->update([
        'appointment_count' => $appointment_count - 1
    ]);
    return redirect('/');
});

// Admin Page
Route::get('/admin', function() {
    $authentic = session('authentic', false);  
    if(!$authentic) {
        return redirect('/login');
    }
    $user_info = Appointment::all();
    return view('admin', ['authentic' => $authentic, 'user_info' => $user_info]);  
});

// Login Page
Route::get('/login', function() {
    return view('login');
});

// Handle Login
Route::post('/login', function () {
    $my_admin = My_admin::all();
    foreach($my_admin as $m) {
        if($m['username'] == request('username') && $m['password'] == request('password')) {
            session(['authentic' => true]);
            return redirect('/admin');
        }
        else {
            return redirect('/login');
        }
    }
});

