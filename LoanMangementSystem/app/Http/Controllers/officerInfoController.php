<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\officerInfo;
use App\Helpers\Helper;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;

use App\Http\Requests\ProfileUpdateRequest;

use Illuminate\Support\Facades\Redirect;


class officerInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $OfficerInfo = OfficerInfo::join('users', 'officerinfo.offEmail', '=', 'users.email')
            ->select('officerinfo.*', 'users.is_admin')
            ->get();

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


        $name = $request->xfirstName . ' ' . $request->xmiddleName . ' ' . $request->xlastName;
        // dd( $name );

        $request->validate([

            'xfirstName' => ['required', 'string', 'max:255'],
            'xmiddleName' => ['nullable', 'string', 'max:1', 'regex:/^[a-zA-Z]+$/'],
            'xlastName' => ['required', 'string', 'max:255'],
            'xsuffix' => ['nullable', 'string', 'max:5'],
            'xcontact' => ['required', 'string', 'starts_with:09', 'unique:officerinfo,offContact','regex:/^[0-9]{11}$/'],
            'xaddress' => ['required', 'string', 'max:255'],
            'xbirthDate' => ['required', 'date'],
            'xgender' => ['required'],
            'xemail' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'Role' => ['required'],
            'xpassword' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
        ]);


        $user = User::create([
            'name' => $name,
            'email' => $request->xemail,
            'password' => Hash::make($request->xpassword),
            'is_admin' => $request->Role,
        ]);



        $OfficerInfo->save();
        event(new Registered($user));
// activity log
activity()
    ->causedBy($user)
    ->performedOn($OfficerInfo)
    ->withProperties([
        'officer_id' => $OfficerInfo->offId,
        'officer_name' => $name,
        'officer_email' => $request->xemail,
        'role' => $request->Role,
        // Add more relevant properties
    ])
    ->log('created account by )' . auth()->user()->name);



        return redirect()->route('officer')->with('success', 'Account Successfully Created');
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
        $OfficerInfo = OfficerInfo::join('users', 'officerinfo.offEmail', '=', 'users.email')
            ->where('officerinfo.ono', $id)
            ->select('officerinfo.*', 'users.is_admin')
            ->get();
        return view('officer.edit', compact('OfficerInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([

            'xfirstName' => ['required', 'string', 'max:255'],
            'xmiddleName' => ['nullable', 'string', 'max:1', 'regex:/^[a-zA-Z]+$/'],
            'xlastName' => ['required', 'string', 'max:255'],
            'xsuffix' => ['nullable', 'string', 'max:5'],
            'xcontact' => ['required', 'string', 'starts_with:09','regex:/^[0-9]{11}$/', Rule::unique('officerInfo', 'offContact')->ignore($id, 'ono')],
            'xaddress' => ['required', 'string', 'max:255'],
            'xbirthDate' => ['required', 'date'],
            'xgender' => ['required'],
            'xemail' => [Rule::unique('officerInfo', 'offEmail')->ignore($id, 'ono')],
            'Role' => ['required'],
            'xpassword' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
        ]);

        $officerInfo = officerInfo::findOrFail($id);

        $fieldsToFormat = ['offFname', 'offMname', 'offLname', 'offSuffix'];

        foreach ($fieldsToFormat as $field) {
            $officerInfo->$field = ucfirst(strtolower($request->{"x" . $field}));
        }

        $officerInfo->update([
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
        ]);


        $name = $officerInfo->offFname . ' ' . $officerInfo->offMname . ' ' . $officerInfo->offLname;
        $user = User::where('email', $officerInfo->offEmail)->first();

        if ($user) {
            $user->update([
                'name' => $name,
                'email' => $request->xemail,
                'password' => bcrypt($request->xpassword),
                'is_admin' => $request->Role == '1' ? 1 : 0,
            ]);
        }

        activity()
        ->performedOn($officerInfo)
        ->causedBy(auth()->user())
        ->log('Updated officer information by '  . auth()->user()->name);
        return redirect()->route('officer')->with('success', 'Account Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $datafinder = OfficerInfo::where('ono', $id)->first();
        $email = $datafinder->offEmail ?? null;
        $user = User::where('email', 'LIKE', $email)->first();

        $OfficerInfo = officerInfo::where('ono', $id)->first();


        $user->delete();




        $OfficerInfo->delete();

         // Log the delete activity
    activity()
    ->performedOn($OfficerInfo)
    ->causedBy(auth()->user())
    ->log('Deleted officer account by ' . auth()->user()->name);
        return redirect()->route('officer')->with('success', 'Account Deleted');
    }
}
