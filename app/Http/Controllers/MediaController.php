<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media; 
use App\User;
use App\Event;
class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function event_store(Request $r){
              $media = new Media ; 
       if ($r->hasFile('n')){
            // $request->image->store();
            $fileName = $r->file('n');
            $path = $r->file('n')->store("public/images");
            $media->file ="storage".substr($path,6);
            $media->type = $r->type;
          //  $media->filable_id = $request->event_id;
            $event = Event::where("id","=",$r->event_id)->first();
            $event->medias()->save($media);
           // $media->filable()->associate($event) ;
            return $media->file;
       }else {
            return "not";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $media = new Media ; 
            if ($request->hasFile('n')){
            // $request->image->store();
            $fileName = $request->file('n');
            $path = $request->file('n')->store("public/images");
            $media->file ="storage".substr($path,6);
            $media->type = $request->type;
            $user = User::find($request->owner_id);
            $user->medias()->save($media);
            //$media->filable()->associate($user) ;
            return $media->file;
        }else {
            return "not";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $user = User::find($id); 
     return $user->medias()->latest('created_at')->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
//Etudiant fiche PFE / Convention de stage 
// Consultation et ajout et modification 
// Ajout modification et consultation de convention 
// Demande D'annulation de stage 
// Agent admin validation et affectation d'encadreur - rejetée la fiche 
// Consulter les fiches pfe , consultation convention des stages 
// Enseignant Consultat des fiches PFE acceptation ou rejet 
// modification des conventions dans les dates de début de stage pour ralonger les dates avec confirmation des admins 



