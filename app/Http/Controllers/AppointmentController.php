<?php

namespace App\Http\Controllers;

use App\Notifications\AppointmentReminder;
use Illuminate\Support\Facades\Notification;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'scheduled_at' => 'required|date',
            'method' => 'required|string',
            'name' => 'nullable|string|max:255',
        ]);

        $appointment = Appointment::create([
            'name' => $request->has('is_anonymous') ? null : $request->input('name'),
            'method' => $request->input('method'),
            'scheduled_at' => $request->input('scheduled_at'),
            'is_anonymous' => $request->has('is_anonymous'),
        ]);

        // Gửi thông báo nếu có người dùng đăng nhập
        if (auth()->check()) {
            auth()->user()->notify(new AppointmentReminder($appointment));
        }

        return redirect()->back()->with('success', 'Đặt lịch thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}

