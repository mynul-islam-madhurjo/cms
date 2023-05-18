<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:users',
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        User::create($validatedData);


        return redirect()->back()->with('success', 'User created successfully.');
    }

    public function create()
    {
        // Get the current date
        $currentDate = Carbon::now()->toDateString();

        $rows = DB::table('users')
            ->select('id')
            ->whereDate('start_date', '<=', $currentDate)
            ->where(function ($query) use ($currentDate) {
                $query->whereDate('end_date', '>=', $currentDate)
                    ->orWhereNull('end_date');
            })
            ->groupBy('name')
            ->get();

        dd($rows);

        return view('create');
    }

}
