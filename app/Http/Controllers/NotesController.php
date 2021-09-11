<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;

class NotesController extends Controller
{   //CRUD : Create Read Update Delete
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.notes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function allQueries(){

        User::all();

        $flights = Flight::where('active', 1)
               ->orderBy('name')
               ->take(10)
               ->get();

        $user = User::find(1);

        $user = User::findOrFail(1);

        $user = User::where('active', 1)->first();

        $user = User::firstWhere('active', 1);

        $model = User::where('id', '>', 3)->firstOr(function () {
            // ...
        });

        $count = User::where('active', 1)->count();

        $max = User::where('active', 1)->max('price');

        //-----------------------------------------------------------------------
        //use Illuminate\Support\Facades\DB;

        $email = DB::table('users')->where('name', 'John')->value('email');

        $users = DB::table('users')
            ->select('name', 'email as user_email')
            ->get();

        $users = DB::table('users')->distinct()->get();

        $users = DB::table('users')
                ->orderBy('name', 'desc') //asc
                ->get();

        $users = DB::table('users')
                ->groupBy('account_id')
                ->having('account_id', '>', 100)
                ->get();

        $orders = DB::table('orders')
                ->select('department', DB::raw('SUM(price) as total_sales'))
                ->groupBy('department')
                ->havingRaw('SUM(price) > ?', [2500])
                ->get();
                
        // Insert

        $shipping = Address::create([
            'type' => 'shipping',
            'line_1' => '123 Example Street',
            'city' => 'Victorville',
            'state' => 'CA',
            'postcode' => '90001',
        ]);

        $user = new User;

        $user->name = $request->name;

        $user->save();

        // Update

        $user = User::find(1);

        $user->name = 'Karim';

        $user->save();

        User::where('active', 1)
                ->where('destination', 'San Diego')
                ->update(['delayed' => 1]);

        // Delete 

        $user = User::find(1);

        $user->delete();

        User::truncate();

        User::destroy(1);

        User::destroy(1, 2, 3);

        $deletedRows = User::where('active', 0)->delete();
    }
}
