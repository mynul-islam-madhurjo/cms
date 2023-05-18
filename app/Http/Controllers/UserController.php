<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $users = DB::table('users')->get();
        return response()->json($users);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required',
            'email'=> 'required'
        ]);

        User::create($validatedData);

        return response('Inserted Successfully');
    }

    public function create()
    {
        // Get the current date
//        $currentDate = Carbon::now()->toDateString();
//
//        $rows = DB::table('users')
//            ->select('id')
//            ->whereDate('start_date', '<=', $currentDate)
//            ->where(function ($query) use ($currentDate) {
//                $query->whereDate('end_date', '>=', $currentDate)
//                    ->orWhereNull('end_date');
//            })
//            ->groupBy('name')
//            ->get();
//
//        dd($rows);

        return view('create');
    }

    public function destroy($id){

        DB::table('users')
            ->where('id',$id)
            ->delete();
        return response('Deleted');
    }

}
