<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\FAQ;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function change($lang)
    {
        // تخزين اللغة في الجلسة
        Session::put('lang', $lang);

        return redirect()->back();
    }
    public function faq(){
        $faqs = FAQ::all();

        return view('FAQ', compact('faqs'));
    }

    //location

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Location::create($request->all());

        return redirect()->back()->with('success', 'تم حفظ الموقع بنجاح');
    }

    // دالة لجلب المواقع وعرضها على الخريطة
    public function location()
    {
        $locations = Location::all();
        $cities = City::where('id', '!=', 1)->get();

        return view('admin.location.locations', compact('locations','cities'));
    }
    public function add_location(Request $request)
    {
        list($latitude, $longitude) = explode(',', $request->location);

        // إنشاء سجل جديد في جدول 'locations'
        $location = Location::create([
            'city_id' => $request->city_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);

        return redirect()->back()->with('success', 'تم حفظ الموقع بنجاح');
    }
    public function location_destroy($id)
    {
        $post = Location::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
    public function zone()
    {
        $locations = City::all();
        return view('admin.location.cities', compact('locations'));
    }

    public function add_zone(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
        ]);
        City::create($request->all());

        return redirect()->back()->with('success', 'تم حفظ الموقع بنجاح');
    }

    public function destroy($id)
{
    $post = City::findOrFail($id);
    $post->delete();

    return redirect()->back()->with('success', 'تم الحذف بنجاح');
}





}

