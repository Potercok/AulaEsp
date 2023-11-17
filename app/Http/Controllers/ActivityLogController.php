<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;
use App\Http\Controllers\Controller;
use PDF;




class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     // No olvides importar el facade al inicio de tu controlador

   /* public function downloadPdf() {
        $logs = ActivityLog::with('user')->get();

        $pdf = PDF::loadView('activity_logs.index', compact('logs'));
        return $pdf->download('bitacora.pdf');
    }*/
    public function downloadPdf()
{
    $logs = ActivityLog::with('user')->get();
    info('Logs recuperados:', $logs);
    var_dump($logs);
    $pdf = PDF::loadView('activity_logs.pdf', compact('logs'));
    return $pdf->download('bitacora.pdf');
    
}

    public function index()
    {
        //
        $logs = ActivityLog::with('user')->paginate(10);
        return view('activity_logs.index', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activity_logs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $activityLog = new ActivityLog();
        $activityLog->user_id = auth()->id();
        $activityLog->description = "El usuario " . auth()->user()->name . " creó una nueva reserva.";
        $activityLog->date = now();
        $activityLog->save();
        return redirect('/activity_logs');
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
        //  return view('activity_logs/create');
            return view('activity_logs/create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $activityLog = new ActivityLog();
        $activityLog->user_id = auth()->id();
        $activityLog->description = "El usuario " . auth()->user()->name . " edito una reserva.";
        $activityLog->date = now();
        $activityLog->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
       
    }
}
