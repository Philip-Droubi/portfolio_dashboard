<?php

namespace App\Http\Controllers;

use App\Models\Sub;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriperController extends Controller
{
    public function index()
    {
        $subs = DB::table('subs')->select(['code'])
            ->selectRaw('country, COUNT(*) as count')
            ->groupBy('country', 'code')
            ->orderBy('count', 'desc')
            ->paginate(50);
        return view('dashboard/dashboard', ['subs' => $subs]);
    }

    public function getDetails()
    {
        $subs = Sub::orderBy('created_at', 'Desc')
            ->paginate(35);
        return view('dashboard/dashboard', ['subs' => $subs]);
    }

    public function destroy(Request $request)
    {
        if (!$sub = Sub::find($request->id)) return redirect()->back()->with(['success' => false, 'message' => "Not found"]);
        $sub->deactive_at = Carbon::now()->format('Y-m-d H:i:s');
        $sub->save();
        return redirect()->back()->with(['success' => true, 'message' => "Subscriber with email " . $sub->email . "  has been deactivated"]);
    }
}
