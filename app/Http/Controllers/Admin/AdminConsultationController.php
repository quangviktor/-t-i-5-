<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\User;
use App\Notifications\TuvanReplyNotification;
use Illuminate\Http\Request;

class AdminConsultationController extends Controller
{
    // Hiển thị danh sách các tư vấn
    public function index()
    {
        $consultations = Consultation::latest()->get();
        return view('admin.consultations.index', compact('consultations'));
    }

    // Hiển thị form trả lời tư vấn
    public function show($id)
    {
        $consultation = Consultation::findOrFail($id);
        return view('admin.consultations.show', compact('consultation'));
    }

    // Xử lý phản hồi tư vấn
    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $consultation = Consultation::findOrFail($id);
        $consultation->reply = $request->reply;
        $consultation->save();

        if (!$consultation->is_anonymous && $consultation->user_id) {
            $user = User::find($consultation->user_id);
            $user?->notify(new TuvanReplyNotification($consultation));
        }

        return redirect()->route('admin.consultations.index')->with('success', 'Đã phản hồi tư vấn.');
    }
}
