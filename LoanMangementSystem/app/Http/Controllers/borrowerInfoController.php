<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\borrowerinfo;

class borrowerInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowerinfo = borrowerinfo::paginate(7);
        return view('borrower.index', compact('borrowerinfo'));
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
        //
        $validatedData = $request->validate([

            'xfirstName' => ['required', 'max:20'],
            'xmiddleName' => ['max:15'],
            'xlastName' => ['required', 'max:20'],
            'xsuffix' => ['nullable', 'max:5'],
            'xcontact' => ['required', 'max:20'],
            'xemail' => ['required', 'max:100'],
            'xaddress' => ['required'],
            'xage' => ['required',],
            'xgender' => ['required']
        ]);
        $borrowerinfo = new borrowerinfo();

        $borrowerinfo->borFname = $request->xfirstName;
        $borrowerinfo->borMname = $request->xmiddleName;
        $borrowerinfo->borLname = $request->xlastName;
        $borrowerinfo->borSuffix = $request->xsuffix;
        $borrowerinfo->borContact = $request->xcontact;
        $borrowerinfo->borEmail = $request->xemail;
        $borrowerinfo->borAddress = $request->xaddress;
        $borrowerinfo->borAge = $request->xage;
        $borrowerinfo->borGender = $request->xgender;

        $borrowerinfo->save();
        return redirect()->route('borrower');
    }

    // Search function    -------- NOT DONE

    public function search(Request $request)
    {
        $output = "";
        $borrowerinfo = borrowerinfo::where('borFname', 'Like', '%' . $request->search . '%')->get();

        foreach ($borrowerinfo as $borrower) {
            $output .=
                '<tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row"class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"></td>
                                <td class="px-6 py-4">' . $borrower->borFname . ' ' . $borrower->borMname . ' ' . $borrower->borLname . ' ' . $borrower->borSuffix . '</td>
                                <td class="px-6 py-4"></td>
                                <td class="px-6 py-4"></td>
                                <td class="px-6 py-4"></td>
                                <td class="px-6 py-4"></td>
                                <td class="px-6 py-4"></td>
                                <th class="mr-2"></th>
                                <td class="px-6 py-4">
                                    </td>
                                <td class="px-6 py-4">
                                    </td>
                                <td class="px-6 py-4">
                                    
                                </td>

                            </tr>';
        }

        return response($output);
    }

    // Search function    -------- NOT DONE

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
        $borrowerinfo = borrowerinfo::where('bno', $id)->get();
        return view('borrower.edit', compact('borrowerinfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $borrowerinfo = borrowerinfo::where('bno', $id)
            ->update(
                [
                    'borFname' => $request->xfirstName,
                    'borMname' => $request->xmiddleName,
                    'borLname' => $request->xlastName,
                    'borSuffix' => $request->xsuffix,
                    'borContact' => $request->xcontact,
                    'borEmail' => $request->xemail,
                    'borAddress' => $request->xaddress,
                    'borAge' => $request->xage,
                    'borGender' => $request->xgender,
                ]
            );
        return redirect()->route('borrower');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrowerinfo = borrowerinfo::where('bno', $id);
        $borrowerinfo->delete();
        return redirect()->route('borrower');
    }
}
