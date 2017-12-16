<?php
 
namespace Taller\Http\Controllers;

use Illuminate\Http\Request;
use Taller\Http\Requests;
use Taller\User;
use Taller\Role;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name','id')->toArray();
        //$userRole = Role::pluck('id','id')->toArray();

       // dd($userRole);


        return view('users.create', compact('roles','userRole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
        ]);
        
        $input = $request->all();
        
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->last_name = $request->input('last_name');
        $user->phone = $request->input('phone');
        $user->birth_date = $request->input('birth_date');
        $user->gender = $request->input('gender');
        $user->password = Hash::make($input['password']);        
        $user->status_id = $request->input('status_id');
        $user->remember_token = $request->input('remember_token');
        $user->save();

        
        $notification = array(             
            'message' => ('Usuario creado satisfactoriamente'),             
            'alert-type' => 'success'         
        );
        
        return redirect()->route('users.index')
            ->with($notification);

        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
                    

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
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('display_name','id');
        $userRole = $user->roles->pluck('id','id')->toArray();

        //dd($userRole);

        return view('users.edit',compact('user','roles','userRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->last_name = $request->input('last_name');
        $user->phone = $request->input('phone');
        $user->birth_date = $request->input('birth_date');
        $user->gender = $request->input('gender');
        $user->password = $request->input('password');
        
        $user->remember_token = $request->input('remember_token');
        
        $user->save();
        $user->update($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        $notification = array(
            'message' => (
                'Usuario actualizado satisfactoriamente'),
                'alert-type' => 'success'
            );

        return redirect()->route('users.index')
               ->with($notification);









        

     
        //DB::table('role_user')->where('user_id',$id)->delete();


        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        $notification = array(
            'message' => (
                'Usuario eliminado satisfactoriamente'),
                'alert-type' => 'success'
            );

        return redirect()->route('users.index')
               ->with($notification);
    }
}
