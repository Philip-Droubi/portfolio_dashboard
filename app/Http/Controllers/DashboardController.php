<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Project;
use App\Models\Sub;
use App\Models\User;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'visits' => Visitor::count(),
            'admins' => User::count(),
            'projects' => Project::count(),
            'emails' => Message::count(),
            'subs' => Sub::count(),
        ];
        return view('dashboard/dashboard', ['data' => $data]);
    }

    public function getAdmins()
    {
        $data = [];
        $users = User::all(['id', 'name', 'email', 'last_seen']);
        $i = 0;
        foreach ($users as $user) {
            $data[] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'last_seen' => $user->last_seen ? Carbon::parse($user->last_seen)->format('Y-m-d | g:i A') : 'None',
            ];
        }
        return view('dashboard/dashboard', ['users' => $data]);
    }

    public function getVisits()
    {
        $visits = DB::table('visitors')->select(['code'])
            ->selectRaw('country, COUNT(*) as count')
            ->groupBy('country', 'code')
            ->orderBy('count', 'desc')
            ->paginate(50);
        return view('dashboard/dashboard', ['visits' => $visits]);
    }

    public function getVisitsDetails()
    {
        $visits = Visitor::orderBy('created_at', 'Desc')
            ->paginate(35);
        return view('dashboard/dashboard', ['visits' => $visits]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
