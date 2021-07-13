<?php

namespace App\Http\Controllers\Admin;

use App\Mail\requestApprovedMail;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

use App\Models\Country;

use App\Models\UserInfo;

use App\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
//    use FileUpload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = User::with('UserInfo.role')->get();

        // foreach ($users as $key => $value) {
        //      dd($value->UserInfo->role->label);
        // }
      



        return view('admin.users.index',
            ['users'=>$users,
            ])
           ;
    }
    public function changeStatus(Request $request)
    {
        {
            $user = User::find($request->id);
            $user->active = $request->active;
            $user->save();

        // $mail = Mail::to($user)->send(new requestApprovedMail());


            return response()->json(['success'=>'Status change successfully.','user'=>$user]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',
            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        $country = Country::where('country_code', $input['country'])->first();

        $userInfo = new UserInfo();
        $userInfo->UserID = $user->UserID;
        $userInfo->status = '0';
        $userInfo->country_id = $country->id;
        $userInfo->address = $request->input('address');
        $userInfo->city = $request->input('city');
        $userInfo->mobile = $request->input('mobile');
        $userInfo->gender = $request->input('gender');
        $userInfo->save();

//        $user->notify(new UserRegisteredNotification($user));

        return redirect()->route('manage.users.index')
            ->with('success', 'User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();


        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$request->has('password')) {
            $this->handleData($id);
        }

        if (isset($request->reject)) {

            $user = UserInfo::where('UserID', $id)->first();
            $user->notes = $request->notes;
            $user->status = '2';
            $user->save();
//            $_user = User::where('id', $user->user_id)->firstOrFail();
//            Mail::to($_user->email)->send(new Reject($_user));
            return redirect()->route('manage.users.index')
                ->with('success', 'تم رفض العضوية');
        }
        if (isset($request->approve)) {

            $user = UserInfo::where('UserID', $id)->first();
            $user->notes = $request->notes;
            $user->status = '1';
            $user->save();


//            $_user = User::where('id', $user->user_id)->firstOrFail();
//            Mail::to($_user->email)->send(new Approve($_user));
            return redirect()->route('manage.users.index')
                ->with('success', 'تم اعتماد العضو بنجاح');
        }
        if (isset($request->saveWithoutApprove)) {
            return redirect()->route('manage.users.index')
                ->with('success', 'تم حفظ البيانات بنجاح');
        }
        if (isset($request->forceApprove)) {
            $user = UserInfo::where('UserID', $id)->first();
            $user->notes = $request->notes;
            $user->status = '1';
            $user->save();
//            $_user = User::where('id', $user->user_id)->firstOrFail();
//            Mail::to($_user->email)->send(new Approve($_user));
            return redirect()->route('manage.users.index')
                ->with('success', 'تم اعتماد العضو بنجاح');
        }
        if (isset($request->forceSaveWithoutApprove)) {
            $user = UserInfo::where('UserID', $id)->first();
            $user->notes = $request->notes;
            $user->status = '0';
            $user->save();
            return redirect()->route('manage.users.index')
                ->with('success', 'تم حفظ بيانات العضو بنجاح');
        }
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:password_confirmation',
            'roles' => 'required'
        ]);


        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }


        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();


        $user->assignRole($request->input('roles'));

        $country = Country::where('country_code', $input['country'])->first();
        $userInfo = UserInfo::where('UserID', $id)->first();
        $userInfo->country_id = $country->id;

        $userInfo->save();


        return redirect()->route('manage.users.index')
            ->with('success', 'User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        return 11;
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

}
