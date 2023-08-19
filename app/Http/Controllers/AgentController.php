<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function AgentDashboard(){
        return view('agent.index');
    }

    public function AgentLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
