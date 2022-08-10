<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        DB::beginTransaction();
        try {
            $file = new File;

            if ($request->hasFile('file')) {
                $fileName = $request->file('file')->getClientOriginalName();
                $fileNameOnly = pathinfo($fileName, PATHINFO_FILENAME);
                $fileExtension = $request->file('file')->getClientOriginalExtension();
                $completeName = str_replace(' ', '_', $fileNameOnly).'_'.rand().'.'.$fileExtension;
                // $completeName = $fileNameOnly . '_' . $date .  '.' . $fileExtension;
                $path = $request->file('file')->storeAs('public', $completeName);

                $url = Storage::url($completeName);

                $file->filename = $completeName;
                $file->path = $url;
            }
            if ($file->save()) {
                DB::commit();
                return response()->json(['message' => 'SUCCESS', 'data' => $file], 200);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
