<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use PDF;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function show(){

        $user = Auth::user();

        return view('student.profile')->with('user', $user);
    }

    public function update(Request $request){
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'digits:10'],
            'dateNaissance' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profil_img' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

        $imageName = time() . '.' . $request->profil_img->extension();

        $request->profil_img->storeAs('profil_images', $imageName, 'public');

        $user = Auth::user();

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->dateNaissance = $request->dateNaissance;
        $user->telephone = $request->telephone;
        $user->filiere = $request->filiere;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profil_img = $imageName;

        $user->save();

        return redirect()->back()->with('success', 'L\'étudiant a été bien modifié !!');
    }

    public function pdf(){

        $user = Auth::user();

        view()->share('user', $user);
        
        $pdf = PDF::loadView('student.pdf', $user);   
        
        return $pdf->download($user->nom . '_' . $user->prenom . '.pdf');
    }
}
