<?php
//26 646 604
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ActivationCode;

class UserController extends Controller
{


    public function desactivate_accoutn($id)
    {
        User::find($id)->update(['isActive' => false]);
    }

    public function retablir_account($id)
    {
        User::find($id)->update(['isActive' => true]);
    }

    public function get_by_id($id)
    {
        return User::find($id)->with('medias')->with('events');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Mail::to($user->email)->send(new ActivationCode($user));

    }

    public function admins()
    {
        $user = User::where('role', "Admin User")->with('medias')->with('events')->get();
        return $user;
    }

    public function simple_users()
    {
        return User::where('role', "Simple User")->with('medias')->with('events')->get();
    }

    public function super_admin()
    {
        return User::where('role', "Super Admin User")->with('medias')->with('events')->get();
    }

    public function update_role($id, $role)
    {
        User::find($id)->update(['role' => $role]);
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

    public function activate_account($id, $activation_code)
    {
        User::where('id', $id)->where('activation_code', $activation_code)
            ->update(['isActive' => true]);
        $user = User::find($id);
        return json_encode($user);
    }

    public function resend_activation_code($id)
    {
        $user = User::find($id);
        Mail::to($user->email)->send(new ActivationCode($user));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $user = new User;
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->phone = $data['phone'];
        $user->email = $data['email'];
        $user->role = $data['role'];
        $user->password = $data['password'];
        $user->isActive = $data['isActive'];
        $user->birth_date = $data['birth_date'];
        $user->activation_code = $data['activation_code'];
        $user->save();
        Mail::to($user->email)->send(new ActivationCode($user));
        return json_encode($user);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return json_encode($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function login($email, $password)
    {
        $user = User::where('isActive', true)->where('email', $email)->where('password', $password)->get();
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {           //        'first_name', 'last_name','phone','role', 'email', 'password','birth_date','isActive'

        $data = json_decode($request->getContent(), true);
        User::where('id', $id)
            ->update(['first_name' => $data['first_name'], 'last_name' => $data['last_name'], 'phone' => $data['phone'], 'role' => $data['role'], 'email' => $data['email'],
                'password' => $data['password'], 'birth_date' => $data['birth_date'], 'isActive' => $data['isActive']]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

    }
}
