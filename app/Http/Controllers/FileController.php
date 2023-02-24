<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $files =  File::selectFile();
        $user = Auth::user();
        return view('file.index', ['files' => $files,'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('file.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|min:2|max:200',
            'titre_fr'=> 'required|min:2|max:200',
            'file' => 'required|mimes:pdf,zip,doc',
        ]);


        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('uploads', $fileName);

        $newFile = File::create([
            'titre' => $request->titre,
            'titre_fr'  => $request->titre_fr,
            'path'  => $path,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->withSuccess(trans('lang.msg_success'));

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
        return View('file.edit', ['file' => $file]);

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
        $request->validate([
            'titre' => 'required|min:2|max:200',
            'titre_fr'=> 'required|min:2|max:200',
            'file' => 'required|mimes:pdf,zip,doc',
        ]);

        Storage::delete($file->path);
        $updatedFile = $request->file('file');
        $updatedFileName = $updatedFile->getClientOriginalName();
        $updatedPath = $updatedFile->storeAs('uploads', $updatedFileName);

        $file->update([
            'titre' => $request->titre,
            'titre_fr'  => $request->titre_fr,
            'path'  => $updatedPath,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->withSuccess(trans('lang.msg_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {

        Storage::delete($file->path);
        $file->delete();
        return  redirect(route('file.index'));
    }
}
