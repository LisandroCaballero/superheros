<?php

namespace App\Http\Controllers;

use App\Http\Resources\SuperHerosResource;
use App\SuperHeros;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class SuperHerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $res = [
            "status" => "ok",
            "message" => "La API funciona",
            "code" => 200
        ];
        return response()->json($res,200);
    }

    public function getAllSuperHeros()
    {
        $superHeros = SuperHeros::all();

        $res = [
            "status" => "ok",
            "message" => "List of Superheros",
            "data" => $superHeros
        ];

        return response()->json($res, 200);
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
     * @param  \App\SuperHeros  $superHeros
     * @return SuperHerosResource
     */
    public function show(SuperHeros $superHeros): SuperHerosResource
    {
        return SuperHerosResource::make($superHeros);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuperHeros  $superHeros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuperHeros $superHeros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuperHeros  $superHeros
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuperHeros $superHeros)
    {
        //
    }
}
