<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\ConsultationResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    //
    public function index(){
        $team = auth()->user();
        $count_managed = $team->teamConsultations()
        ->where('status', '!=', 'pending') // استبعاد الاستشارات ذات الحالة "pending"
        ->count();
        $count_rejected = $team->teamConsultations()
        ->where('status', 'rejected') // استبعاد الاستشارات ذات الحالة "pending"
        ->count();
        $count_completed = $team->teamConsultations()
        ->where('status', 'completed') // استبعاد الاستشارات ذات الحالة "pending"
        ->count();

    $count_new = $team->teamConsultations()
        ->where('status', 'pending') // جلب الاستشارات ذات الحالة "pending"
        ->count();

        return view('team.index', compact('count_managed', 'count_new','count_rejected','count_completed'));
    }
    public function managed_consultations(){
        $team = auth()->user();
        $consultations = $team->teamConsultations()
        ->where('status', '!=', 'pending')
        ->with('client')
        ->get();

        return view('team.managed_consultations', compact('consultations'));

    }
    public function new_consultations(){
        $team = auth()->user();
        $consultations = $team->teamConsultations()
        ->where('status','pending')
        ->with('client')
        ->get();

        return view('team.new_consultations', compact('consultations'));

    }
    public function show_consultation($id){

        $consultation = Consultation::findOrFail($id);
        // $consultation = Consultation::with(['responses.user'])->get();

        $consultation_responses = ConsultationResponse::where('consultation_id', $id)->get();
        return view('team.show_consultation' , compact('consultation','consultation_responses'));
    }
    public function response(Request $request)
    {


        $request->validate([
            'response' => 'required|string',
        ]);
        $user = Auth::user();
        $role ='client';
        if($user->role != 'client'){
            $role = 'team';
        }

        ConsultationResponse::create([

            'consultation_id' => $request->consultation_id,
            'user_id' => $user->id,
            'response' => $request->response,
            'role' => $role,

        ]);
        $consultation = Consultation::findOrFail($request->consultation_id);

        $consultation->update([
            'status' => 'waiting_client'
        ]);


        return redirect()->back()->with('success', 'Question added successfully!');
    }

    public function image_upload(Request $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $folderPath = public_path('assets/image_consultation');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move($folderPath, $imageName);
            $imagePath = 'image_consultation/' . $imageName;
            return asset('assets/' . $imagePath); // يُعيد رابط الصورة
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

}
