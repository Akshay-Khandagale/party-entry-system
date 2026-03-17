<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Gate;
use App\Models\EntryLog;

class GateController extends Controller
{

    public function index()
    {
        return view('employee');
    }


    // public function checkEmployee(Request $request)
    // {

    //     $request->validate([
    //         'employee_id'=>'required',
    //         'face_image'=>'required|image'
    //     ]);

    //     $emp = Employee::where('employee_id',$request->employee_id)->first();

    //     if(!$emp)
    //     {
    //         return back()->with('error','Employee Not Found');
    //     }

    //     $image = $request->file('face_image');

    //     $filename = time().'.jpg';

    //     $image->move(public_path('faces'),$filename);

    //     session([
    //         'employee_id'=>$emp->id,
    //         'face_image'=>$filename
    //     ]);

    //     return redirect('/gate-verification');
    // }

    // new
    public function checkEmployee(Request $request)
    {

        $request->validate([
            'employee_id'=>'required',
            'face_image'=>'required'
        ]);

        $emp = Employee::where('employee_id',$request->employee_id)->first();

        if(!$emp){
            return back()->with('error','Employee Not Found');
        }

        // Get Base64 Image
        $image = $request->face_image;

        // Split the base64 string
        $image_parts = explode(";base64,", $image);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1]; // png or jpeg

        $image_base64 = base64_decode($image_parts[1]);

        $filename = time().'.'.$image_type;

        $path = public_path('faces/'.$filename);

        file_put_contents($path, $image_base64);

        session([
            'employee_id'=>$emp->id,
            'face_image'=>$filename
        ]);

        return redirect('/gate-verification');
    }
    // new

    public function gatePage()
    {
        return view('gate');
    }



    // public function verifyGate(Request $request)
    // {

    //     $request->validate([
    //         'gate_id'=>'required'
    //     ]);

    //     $gate = Gate::where('gate_code',$request->gate_id)
    //             ->where('expires_at','>=',now())
    //             ->first();

    //     if(!$gate)
    //     {
    //         return back()->with('error','Invalid Gate ID');
    //     }

    //     EntryLog::create([
    //         'employee_id'=>session('employee_id'),
    //         'gate_id'=>$gate->id,
    //         'face_image'=>session('face_image')
    //     ]);

    //     return redirect('/welcome');
    // }

    // New
    public function verifyGate(Request $request)
    {
        
        $request->validate([
        'gate_id'=>'required'
        ]);
        
        $gate = Gate::where('gate_code',$request->gate_id)
                    ->where('expires_at','>=',now())
                    ->where('used',0)
                    ->first();
        
        if(!$gate){
            return back()->with('error','Invalid or Expired Code');
        }
        
        /* prevent duplicate employee entry */
        
        $already = EntryLog::where('employee_id',session('employee_id'))->exists();
        
        if($already){
            return back()->with('error','Employee already entered');
        }
        
        /* save entry */
        
        EntryLog::create([
        'employee_id'=>session('employee_id'),
        'gate_id'=>$gate->id,
        'face_image'=>session('face_image')
        ]);
        
        /* mark gate code used */
        
        $gate->update([
        'used'=>1
        ]);
        
        return redirect('/welcome');
        
    }
    // New


    public function welcome()
    {
        return view('welcome');
    }

    // public function generateGate($gate)
    // {
    
    //     $code = rand(10000,99999);
    
    //     Gate::create([
    //         'gate_name' => 'Gate '.$gate,
    //         'gate_code' => $code,
    //         'expires_at' => now()->addSeconds(20)
    //     ]);
    
    //     return "Gate ".$gate." Code : ".$code;
    // }
    // New
    public function generateGate($gate_id)
    {
    
        do {
    
            $code = rand(10000,99999);
    
        } while(Gate::where('gate_code',$code)->exists());
    
        Gate::where('id',$gate_id)->update([
            'gate_code'=>$code,
            'expires_at'=>now()->addSeconds(20),
            'used'=>0
        ]);
    
        return response()->json([
            'gate'=>$gate_id,
            'code'=>$code
        ]);
    
    }

    public function gateAdmin($gate)
    {
        return view('gate_admin',compact('gate'));
    }
    // New

    // new
    public function getGateCodes()
    {
        $gates = Gate::all();
        return response()->json($gates);
    }

    public function dashboard(Request $request)
    {
        $filter = $request->gate;
        $search = $request->search;

        $query = EntryLog::with('employee','gate');

        if($filter){
            $query->where('gate_id',$filter);
        }

        if($search){
            $query->whereHas('employee', function($q) use ($search){
                $q->where('employee_id','like','%'.$search.'%');
            });
        }

        $entries = $query->latest()->get();

        $total = $entries->count();

        $gate1 = EntryLog::where('gate_id',1)->count();
        $gate2 = EntryLog::where('gate_id',2)->count();
        $gate3 = EntryLog::where('gate_id',3)->count();
        $gate4 = EntryLog::where('gate_id',4)->count();

        return view('dashboard',compact(
            'total','gate1','gate2','gate3','gate4','entries','filter','search'
        ));
    }
    // new
    public function volunteerDashboard($gate_id)
    {
        $entries = EntryLog::with('employee')
                    ->where('gate_id',$gate_id)
                    ->latest()
                    ->get();

        $total = $entries->count();

        return view('volunteer_dashboard',compact('entries','total','gate_id'));
    }
}
