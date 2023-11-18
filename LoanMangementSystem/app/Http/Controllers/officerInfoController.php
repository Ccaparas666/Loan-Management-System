<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\officerInfo;
use App\Helpers\Helper;
class officerInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $OfficerInfo = officerInfo::all();
        return view('Officer.index', compact('OfficerInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $genId = Helper::OfficerIDgenerator(new officerinfo, 'offId', 5, 'OFL');
        $OfficerInfo = new officerInfo();
       
        $OfficerInfo->offId = $genId;
        $OfficerInfo->offFname = $request->xfirstName;
        $OfficerInfo->offMname = $request->xmiddleName;
        $OfficerInfo->offLname = $request->xlastName;
        $OfficerInfo->offSuffix = $request->xsuffix;
        $OfficerInfo->offContact = $request->xcontact;
        $OfficerInfo->offAddress = $request->xaddress;
        $OfficerInfo->offDob = $request->xbirthDate;
        $OfficerInfo->offGender = $request->xgender;
        $OfficerInfo->offEmail = $request->xemail;
        $OfficerInfo->offpassword = $request->xpassword;
        
        
        $OfficerInfo->save();
        return redirect()->route('officer');
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
        //
        $OfficerInfo = officerInfo::where('ono', $id)->get();
        return view('officer.edit', compact('OfficerInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $OfficerInfo = officerInfo::where('ono', $id)
        ->update(
            [
                'offFname' => $request->xfirstName,
                'offMname' => $request->xmiddleName,
                'offLname' => $request->xlastName,
                'offSuffix' => $request->xsuffix,
                'offContact' => $request->xcontact,
                'offEmail' => $request->xemail,
                'offAddress' => $request->xaddress,
                'offDob' => $request->xbirthDate,
                'offGender' => $request->xgender,
                'offpassword' => $request->xpassword,
            ]
        );
    return redirect()->route('officer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $OfficerInfo = officerInfo::where('ono', $id);
        $OfficerInfo->delete();
        return redirect()->route('officer');
    }
}
