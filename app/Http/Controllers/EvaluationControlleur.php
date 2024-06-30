<?php

namespace App\Http\Controllers;
use App\Models\Departement;
use App\Models\Membre;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
class EvaluationControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$id)
    {
        $usecaseDep=Departement::all();
        $iduser =$request->route('id');
        return view('Evaluation.AfficherEvalution',compact('usecaseDep','iduser'));
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
        // Validation des données
        $request->validate([
            'critere' => 'required|array|min:1',
            'critere.*' => 'required|string|max:255',
            'score' => 'required|array|min:1',
            'score.*' => 'required|integer|min:0|max:100',
        ], [
            'critere.required' => 'Au moins un critère est requis.',
            'critere.*.required' => 'Chaque critère doit être fourni.',
            'score.required' => 'Au moins un score est requis.',
            'score.*.required' => 'Chaque score doit être fourni.'
        ]);
        $iduser =$request->route('id');
        $userId = Auth::user()->email;
        $commissionId = Membre::where('email', $userId)->value('commission_id');
        $criteres = $request->input('critere');
        $scores = $request->input('score');
        if (count($criteres) !== count($scores)) {
            return redirect()->back()->withErrors('Le nombre de critères doit correspondre au nombre de scores.');
        }
        foreach ($criteres as $index => $critere) {
            Evaluation::create([
                'critere' => $critere,
                'score' => $scores[$index],
                'id_user' => $iduser,
                'commission_id' => $commissionId,
            ]);
        }

       return redirect()->back()->with('success', 'Evaluations créées avec succès.');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
