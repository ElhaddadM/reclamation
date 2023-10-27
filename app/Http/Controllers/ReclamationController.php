<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $Reclamations =  DB::table('reclamations')->where('user_id', Auth::user()->id)
        ->paginate(4);
        $user = User::find(Auth::user()->id);
        return  \view('dashboard')->with(['Reclamations' =>$Reclamations,'User' => $user]);
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

        $validate = $request->validate(['Name' => 'required','Departement'=>'required']);
        $reclamation = new Reclamation();
        $reclamation ->Name = $request->Name;
        $reclamation ->Departement = $request->Departement;
        $reclamation ->user_id = Auth::user()->id;
        $reclamation->Date = date('Y-m-d H:i:s');
        $reclamation ->save();
        return redirect()->route('dashboard');
        // $Reclamations =  Reclamation::all();
        // return  \view('dashboard')->with('Reclamations' ,$Reclamations);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reclamation $reclamation)
    {
        return  \view('dashboardUpdate')->with('Reclamation' ,$reclamation);;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reclamation $reclamation)
    {
        //
    }
    public function updateReclamation()
    {
        return  \view('dashboardUpdate');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reclamation $reclamation)
    {
        $validate = $request->validate(['Name'=> 'required','Departement'=> 'required']);
        $reclamation->update([
            'Name' => $request->Name,
            'Departement' => $request->Departement
        ]);
        return redirect()->route('dashboard');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reclamation $reclamation)
    {
        $reclamation->delete();
        return redirect()->route('dashboard');


    }

    public function valider(Request $request){
        $reclamation = Reclamation::find($request->reclamation_id);
        $reclamation->IsValidate = true;$reclamation->IsValidate = true;
        $reclamation ->save();
        return redirect()->route('dashboard');

    }

    public function getReclamation(){
        return  DB::table('reclamations')->join('users','reclamations.user_id','=','users.id')
        ->get();
    }
}





