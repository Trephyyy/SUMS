<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CodeVerificationController extends Controller
{
    public function verify(Request $request)
    {
        $code = $request->input("code");
    
        // Check if the code exists in the database
        $codeExists = Code::where('code', $code)->exists();
    
        if ($codeExists)
        {
            
            $code = Code::where('code', $code)->first();
            if($code->expireAt < time()){
                $code->delete();    
                return redirect()->back()->withErrors(['code' => 'Code expired']);
            }
            if ($code->isOneTime){
                $code->delete();
            }
            if($code->expireAt > time()){
                return redirect()->back()->with('message', 'Code verification successful');
            }
            
        } else {
            return redirect()->back()->withErrors(['code' => 'Incorrect Code']);
        }
    }
}
