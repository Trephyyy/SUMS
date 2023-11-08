<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Hash;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InviteCodeController extends Controller
{
 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("Invite");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "code" => "string|required",
            "oneTime" => "boolean|required",
            'expireAtNumber' => 'required|integer|min:1',
            'expireAtTime' => 'required|in:m,h,d',

        ]);
        $codevalue = $validatedData["code"];
        function convertToSeconds($expireAtNumber, $expireAtTime)
            {
                switch ($expireAtTime) {
                    case 'm':
                        // If minutes, multiply by 60 (as there are 60 seconds in a minute)
                        return $expireAtNumber * 60;
                    case 'h':
                        // If hours, multiply by 3600 (as there are 3600 seconds in an hour)
                        return $expireAtNumber * 3600;
                    case 'd':
                        // If days, multiply by 86400 (as there are 86400 seconds in a day)
                        return $expireAtNumber * 86400;
                    default:
                        // If the expireAtTime is not 'm', 'h', or 'd', return the original number
                        return $expireAtNumber;
                }
            }
        
           $seconds = convertToSeconds($validatedData['expireAtNumber'], $validatedData['expireAtTime']);
           $expireAt = now()->addSeconds($seconds);
            Code::create([
                "code"=> $codevalue,
                "isOneTime" => $validatedData["oneTime"],
                "expireAt" => $expireAt,
            ]);

            return redirect()->route('dashboard');

    }


    /**
     * Display the specified resource.
     */
    public function show(Code $code)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Code $code)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Code $code)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Code $code)
    {
        //
    }
}
