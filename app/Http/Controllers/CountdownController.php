<?php

namespace App\Http\Controllers;

use App\Models\Countdown;
use Illuminate\Http\Request;
class CountdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countdown = Countdown::orderBy('id', 'desc')->first();
        // dd($countdown);
        // dd($countdown);
        return view('home', compact(['countdown']));
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
        $countdown = Countdown::orderBy('id', 'desc')->first();
        if($countdown == null){

        Countdown::create([
            'time' => $request->countdown,
        ]);
        }else{
            $countdown->time = $request->input('countdown');

            $countdown->save();
        }

        return redirect(route('home', compact(['countdown'])));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Countdown  $countdown
     * @return \Illuminate\Http\Response
     */
    public function show(Countdown $countdown)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Countdown  $countdown
     * @return \Illuminate\Http\Response
     */
    public function edit(Countdown $countdown)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Countdown  $countdown
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Countdown $countdown)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Countdown  $countdown
     * @return \Illuminate\Http\Response
     */
    public function destroy(Countdown $countdown)
    {
        //
    }

    public function loadData()
    {
        $data = Countdown::orderBy('id', 'desc')->first();
        $content = '{"data": '.$data.',"message":"success"}';
        return response($content, 200)
        ->header('Content-Type', 'application/json');
    }
}
