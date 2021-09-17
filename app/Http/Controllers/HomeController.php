<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function upload($r, $request)
    {

        if ($request->hasFile($r)) {
            if ($_FILES[$r]['error']) {
                # code...
                return false;
            } else {
                $extension = $request->file($r)->getClientOriginalExtension();

                $fileNameToStore = Str::random(10) . '_' . time() . '.' . $extension;

                // $path = $request->file($r)->storeAs('storage', $fileNameToStore);
                
                $path = $request->file($r)->storeAs('public', $fileNameToStore);
                return $fileNameToStore;
            }
        } else {
            return false;
        }
    }
    public function add(Request $request)
    {
        // return $_POST['date'];
        Entry::create([
            'firstEntry' => $request->input('previous'),
            'firstEntryimg' => $this->upload('previousim', $request),
            'secEntry' => $request->input('current'),
            'sectEntryimg' => $this->upload('currentFile', $request),
            'total' => (intval($request->input('current')) - intval($request->input('previous'))),
            'cpu' => $request->input('cpu'),
            'received' => $request->input('received'),
            'expected' => intval($request->input('cpu')) * (intval($request->input('current')) - intval($request->input('previous'))),
            'dateref' => $request->input('date')
        ]);
        return  redirect('/entry');
    }
    public function show()
    {
        $e = Entry::all();
        return view('show')->with('data', $e);
    }
}
