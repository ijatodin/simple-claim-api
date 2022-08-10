<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\File;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $claims = Claim::all()  ;
        return response()->json(['message' => 'SUCCESS', 'data' => $claims], 200);
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
        try {
            $res = Claim::create([
                'employee' => $request->input('name'),
                'department' => $request->input('department'),
                'category' => $request->input('category'),
                'value' => $request->input('value'),
                'description' => $request->input('description'),
                'filepath' => $request->input('filepath'),
                'status' => 0,
            ]);

            if ($res) {
                $file = File::where('id', $request->input('file_id'))->first();
                $file->claim_id = $res->id;
                $file->save();
            }

            return response()->json(['message' => 'SUCCESS', 'data' => $res], 200);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function show(Claim $claim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function edit(Claim $claim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $res = Claim::where('id', $request->id)->first();

            if ($res) {
                $res->status = $request->action;
                $res->save();
            }

            return response()->json(['message' => 'SUCCESS', 'data' => $res], 200);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Claim $claim)
    {
        //
    }
}
