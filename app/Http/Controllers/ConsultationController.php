<?php

namespace App\Http\Controllers;

use App\Models\tuvan;
use App\Models\User;
use App\Notifications\TuVanReplyNotification;
use Illuminate\Http\Request;
use App\Models\Consultation;

class ConsultationController extends Controller
{
    public function create()
    {
        return view('tuvan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $consultation = new Consultation();
        $consultation->message = $request->message;

        if (auth()->check()) {
            $consultation->user_id = auth()->id();
            $consultation->is_anonymous = false;
        } else {
            $consultation->is_anonymous = true;
        }

        // ✅ Gọi save() đúng cách
        $consultation->save();

        return redirect()->back()->with('success', 'Yêu cầu tư vấn của bạn đã được gửi.');
    }

    public function reply(Request $request, $id)
    {
        $tuvan = tuvan::findOrFail($id);

        $tuvan->reply = $request->input('reply');
        $tuvan->save();

        // ✅ Dùng đúng biến $tuvan (chữ thường)
        if ($tuvan->user_id) {
            $user = User::find($tuvan->user_id);
            if ($user) {
                $user->notify(new TuVanReplyNotification($tuvan->reply));
            }
        }

        return redirect()->back()->with('success', 'Phản hồi đã được gửi.');
    }
}
