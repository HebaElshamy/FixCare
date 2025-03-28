<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Consultation;
use App\Models\ConsultationResponse;
use App\Models\HomeService;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    //
    public function index(){
        return view('client.index');
    }

    public function client_consultations(){

        $client = auth()->user();
        $consultations = $client->clientConsultations()->with('team')->get();
        return view('client.client_consultations', compact('consultations'));
    }
    public function new_consultation(){
        $Consultants = User::whereIn('role', ['expert', 'professional', 'trainee'])
        ->where('is_approved', true)
        ->get();

        return view('client.new_consultation', compact('Consultants'));

    }

    public function show_consultation($id){

        $consultation = Consultation::findOrFail($id);
        $consultation_responses = ConsultationResponse::where('consultation_id', $id)->get();
        return view('client.show_consultation' , compact('consultation','consultation_responses'));
    }
    public function save_consultation(Request $request){

        $imagePath = null;
        if ($request->hasFile('image')) {
            $folderPath = public_path('assets/image_consultation');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move($folderPath, $imageName);
            $imagePath = 'assets/image_consultation/' . $imageName;
        }
        Consultation::create([
            'consultation_topic' => $request->consultation_topic,
            'client_id' => Auth::user()->id,
            'team_id' => $request->team_id,
            'team_id' => $request->team_id,
            'original_consultation' => $request->original_consultation,
            'image' =>$imagePath,
        ]);

        return redirect()->route('client.client_consultations');

    }

    public function client_home_service(){

        $client = auth()->user();
        $home_services = $client->clientHomeService()->get();

        return view('client.client_home_service', compact('home_services'));
    }
    public function show_home_service($id){

        $home_service = HomeService::findOrFail($id);

        return view('client.show_home_service' , compact('home_service'));
    }
    public function home_service(){
        return view('client.home_service');
    }
    public function save_home_service(Request $request){

        $imagePath = null;
        if ($request->hasFile('image')) {
            $folderPath = public_path('assets/image_consultation');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move($folderPath, $imageName);
            $imagePath = 'assets/image_consultation/' . $imageName;
        }
        HomeService::create([
            'consultation_topic' => $request->consultation_topic,
            'client_id' => Auth::user()->id,
            'phone' => $request->phone,
            'location' => $request->location,
            'original_consultation' => $request->original_consultation,
            'image' =>$imagePath,
        ]);

        return redirect()->route('client.client_home_service');

    }

    public function change_status_closed($id)
{

    $consultation = Consultation::findOrFail($id);
    $consultation->status = 'closed';
    $consultation->save();


    if (auth()->user()->role == 'client') {
        return redirect()->route('client.client_consultations');
    }

}
    public function change_status($id, $status, Request $request)
{

    $consultation = Consultation::findOrFail($id);
    $consultation->status = $status;
    $consultation->save();

    // إذا كان الطلب من AJAX، أعد استجابة JSON بدلًا من إعادة التوجيه
    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'message' => 'تم تحديث الحالة بنجاح!'
        ]);
    }

    // إعادة التوجيه في حالة الطلب العادي (ليس AJAX)
    if (auth()->user()->role == 'client') {
        return redirect()->route('client.client_consultations');
    }

    if (in_array(auth()->user()->role, ['expert', 'professional', 'trainee'])) {
        return redirect()->route('team.new.consultations');
    }
}


    public function response(Request $request)
    {

        $request->validate([
            'response' => 'required|string',
        ]);
        $user = Auth::user();
        ConsultationResponse::create([

            'consultation_id' => $request->consultation_id,
            'user_id' => $user->id,
            'response' => $request->response,
            'role' => $user->role,

        ]);

        $consultation = Consultation::findOrFail($request->consultation_id);
        if( $consultation->status != 'pending'){
        $consultation->update([
            'status' => 'waiting_team'
        ]);
        }

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

    public function location(){
        $cities = City::where('id', '!=', 1)->get();
        return view('client.location', compact('cities'));
    }
    public function getCityData(Request $request)
    {
        $locations = Location::where('city_id',$request->city_id)->get();
        return response()->json($locations);


    }

}

