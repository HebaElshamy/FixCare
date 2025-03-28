<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\ConsultationResponse;
use App\Models\FAQ;
use App\Models\HomeService;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $team = auth()->user();
        $count_managed = Consultation::where('status', '!=', 'pending') // استبعاد الاستشارات ذات الحالة "pending"
        ->count();
        $count_rejected = Consultation::where('status', 'rejected') // استبعاد الاستشارات ذات الحالة "pending"
        ->count();
        $count_completed = Consultation::where('status', 'completed') // استبعاد الاستشارات ذات الحالة "pending"
        ->count();

        $count_new = Consultation::where('status', 'pending') // جلب الاستشارات ذات الحالة "pending"
        ->count();

        return view('admin.index', compact('count_managed', 'count_new','count_rejected','count_completed'));
    }
    public function all_team(){
        $users = User::whereIn('role', ['expert', 'professional', 'trainee'])
        ->where('is_approved', true)
        ->get();

        return view('admin.all_team', compact('users'));
    }


    public function joining_requests(){
        $users = User::whereIn('role', ['expert', 'professional', 'trainee'])
        ->where('is_approved', false)
        ->get();

        return view('admin.joining_requests', compact('users'));
    }

    public function approval($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->is_approved = true;
            $user->save();

            return redirect()->back()->with('success', 'User approved successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }

    public function team_delete($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();

            return redirect()->back()->with('success', 'User approved successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }

    public function all_client(){
        $users = User::where('role','client')
        ->get();

        return view('admin.client', compact('users'));
    }
    public function all_consultations(){
        $consultations = Consultation::all();

        return view('admin.all_consultations', compact('consultations'));
    }

    public function client_delete($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();

            return redirect()->back()->with('success', 'User approved successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }

    public function faq(){
        $faqs = FAQ::all();

        return view('admin.faq', compact('faqs'));
    }
    public function add_faq(){


        return view('admin.add_faq');
    }
    public function sort_faq(Request $request)
    {
        $request->validate([
            'question_en' => 'required|string',
            'answer_en' => 'required|string',
            'question_ar' => 'required|string',
            'answer_ar' => 'required|string',
        ]);

        FAQ::create([
            'question_en' => $request->question_en,
            'answer_en' => $request->answer_en,
            'question_ar' => $request->question_ar,
            'answer_ar' => $request->answer_ar,
        ]);

        return redirect()->back()->with('success', 'Question added successfully!');
    }

    public function faq_destroy($id)
    {
        $faq = FAQ::find($id);

        if ($faq) {
            $faq->delete();
        return redirect()->back()->with('success', 'Question Deleted successfully!');
        }
    }

    public function show_consultation($id){

        $consultation = Consultation::findOrFail($id);
        // $consultation = Consultation::with(['responses.user'])->get();

        $consultation_responses = ConsultationResponse::where('consultation_id', $id)->get();
        return view('admin.show_consultation' , compact('consultation','consultation_responses'));
    }

    public function client_home_service(){
        $home_services = HomeService::all();

        return view('admin.client_home_service', compact('home_services'));
    }
    public function show_home_service($id){

        $home_service = HomeService::findOrFail($id);

        return view('admin.show_home_service' , compact('home_service'));
    }

    public function change_status($id, $status, Request $request)
{

    $home_service = HomeService::findOrFail($id);
    $home_service->status = $status;
    $home_service->save();

    // إذا كان الطلب من AJAX، أعد استجابة JSON بدلًا من إعادة التوجيه
    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'message' => 'تم تحديث الحالة بنجاح!'
        ]);
    }

        return redirect()->route('admin.client_home_service');



}

}
