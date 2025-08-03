use App\Models\TuVan;
use Illuminate\Http\Request;

class tuvanController extends Controller
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

        tuvan::create([
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Yêu cầu của bạn đã được gửi thành công!');
    }
}
