<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Gate;
use Session;
use App\Role;
use App\Admin;
use App\Group;
use App\Mail\NewUserMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\MassDestroyUserRequest;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //
    public function index()
    {

        abort_if(Gate::denies('user-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Auth::user()->roles()->pluck('title');

        //creating scope of users
        foreach($roles as $key => $role){
            if($role == 'IT Admin'){
                $users = Admin::with('roles')->get();
                break;
            }
            elseif($role == 'Admin'){
                $users = Admin::whereHas('roles', function ($query) use ($role) {
                    $query->whereIn('title',['User']);
                    })->get();
            }
        }

        return view('admin.backend.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $all_roles = Role::pluck('title', 'id');
        if(Auth::user()->name!=='IT Admin'){        
            $roles = $all_roles->filter(function($role) {
                    return $role != 'IT Admin' && $role != 'Admin' ;
            });
        } else {
            $roles = $all_roles;
        }
        $groups = Group::all()->pluck('title', 'id');

        return view('admin.backend.users.create', compact('roles','groups'));
    }

    public function store(StoreUserRequest $request)
    {
        if($request->generate_password === 'on' || $request->password === ''){
            // dd('sd');
        $random_temp_password= str_random(10);
        $password = $random_temp_password;
        }else{
            // dd('sdsds');
        $password = $request->password;
        }
        
        if($request->hasFile('official_seal') && $request->file('official_seal')->isValid()){
            $file = $request->file('official_seal');
            $official_seal= uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/uploads/college/official_seal',$official_seal);
        }else{
            //if statement checks if file is a file and is valid, otherwise no file to upload
            $official_seal = null;

        }
        if($request->hasFile('authorized_signature') && $request->file('authorized_signature')->isValid()){
            $file = $request->file('authorized_signature');
            $authorized_signature= uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/uploads/college/authorized_signature',$authorized_signature);
        }else{
            //if statement checks if file is a file and is valid, otherwise no file to upload
            $authorized_signature = null;

        }
        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password),
            'default_password' => $password,
            'mobile' => $request->mobile,
            'merchant_no' => $request->merchant_no,
            'official_seal' => $official_seal,
            'authorized_signature' => $authorized_signature,
            'form_charge' => $request->form_charge,

        ];
        $user = Admin::create($data);
        $user->roles()->sync($request->input('roles', []));
        $user->groups()->sync($request->input('groups', []));
        
        if(Auth::user()->name==='IT Admin'){ 
            $mail_data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'link' => route('admin.login'),
            ];
            Mail::to($data['email'])->send(new NewUserMail($mail_data));
        }
        Session::flash('flash_success', 'User created successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.users.index');

    }

    public function edit(Admin $user)
    {
        abort_if(Gate::denies('user-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user->load(['roles','groups']);
        $all_roles = Role::all()->pluck('title', 'id');
        if(Auth::user()->name!=='IT Admin'){        
            $roles = $all_roles->filter(function($role) {
                    return $role != 'IT Admin' && $role != 'Admin' ;
            });
        } else {
            $roles = $all_roles;
        }
        $groups = Group::all()->pluck('title', 'id');
        return view('admin.backend.users.edit', compact('user','roles','groups'));
    }

    public function update(UpdateUserRequest $request, Admin $user)
    {
        if($request->hasFile('official_seal') && $request->file('official_seal')->isValid()){
            $file = $request->file('official_seal');
            $official_seal= uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/uploads/college/official_seal',$official_seal);
        // }else{
        //     //if statement checks if file is a file and is valid, otherwise no file to upload
        //     $official_seal = null;

        }
        if($request->hasFile('authorized_signature') && $request->file('authorized_signature')->isValid()){
            $file = $request->file('authorized_signature');
            $authorized_signature= uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/uploads/college/authorized_signature',$authorized_signature);
        // }else{
        //     //if statement checks if file is a file and is valid, otherwise no file to upload
        //     $authorized_signature = null;

        }
        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'merchant_no' => $request->merchant_no,
            'official_seal' => (isset($official_seal))?$official_seal:$user->official_seal,
            'authorized_signature' => (isset($authorized_signature))?$authorized_signature:$user->authorized_signature,
            'form_charge' => $request->form_charge,
        ];
        if($request->password) {
            if($request->password !== $user->password){
                $data['password'] = bcrypt($request->password);
            }
        }
        // dd($data);
        $user->update($data);
        $user->roles()->sync($request->input('roles', []));
        $user->groups()->sync($request->input('groups', []));

        Session::flash('flash_success', 'User updated successfully!.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('admin.users.index');

    }

    public function show(Admin $user)
    {
        abort_if(Gate::denies('user-show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.backend.users.show', compact('user'));
    }

    public function destroy(Admin $user)
    {
        abort_if(Gate::denies('user-delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        Session::flash('flash_danger', 'User has been deleted !.');
        Session::flash('flash_type', 'alert-danger');
        return back();

    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        // dd($request);
        Admin::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
