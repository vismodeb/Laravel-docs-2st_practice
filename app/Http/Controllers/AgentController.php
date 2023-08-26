<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AgentController extends Controller
{
    public function AgentDashboard(){
        return view('agent.index');
    }

    public function AgentLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/agent/login');
    }

    public function AgentLogin(){
        return view('agent.agent_login');
    }

    public function AgentProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('agent.agent_profile_view',compact('profileData'));
    }

    public function AgentProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            // @unlink(public_path('agent/agent_images'.$data->photo));
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('agent/agent_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Agent Profile Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    
    public function AgentChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('agent.agent_change_password',compact('profileData'));
    }
}
