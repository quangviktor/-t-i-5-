<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class AdminAppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::orderBy('created_at', 'desc')->get();
        return view('admin.appointments.index', compact('appointments'));
    }
}
