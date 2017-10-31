<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserLevel;
use App\UserAccess;
use DB;
use Response;
class UserLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('userlevel', ['only' => ['index']]);
    }
    public function index()
    {
        //
       return view('layouts.account.index');
   }
   public function readByAjax()
   {
       $user=DB::table('users')
       ->select('users.*')
       ->get();
       return view('layouts.account.table', ['user'=>$user]);

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $var = new User();
        $var->fname=$request->fname;
        $var->mname=$request->mname;
        $var->lname=$request->lname;
        $var->username=$request->val_username;
        $var->password=bcrypt($request->val_password);
        $var->email=$request->val_email;
        $var->remember_token= str_random(10);
        $var->role_id=1;
        $var->active=1;
        $var->save();

        $routes = ['utilities','specialization','worker','groupuomeasure','detailuomeasure','materialtype','materialclass','material','equiptype','equipment','serviceOff','deliverytruck','client','newcompclient','newindclient','quote','quotelist','contractadd','contractlist','billing','stockadjustment','progressmonitoring','delivery','userlevel','clientqueries','stockqueries','clientqueries','clientqueries','clientqueries','clientqueries','clientqueries','clientqueries','clientqueries'];
        $key="";
        $access ="";

        for ($i=1; $i <=count($routes); $i++) { 
            $key = Userlevel::find($i);
            $access = new UserAccess();
            $access->users_id=$var->id;
            $access->userlevel_id=$key->id;
            $access->is_active=0;
            $access->save();

        }
        return response::json($var);

        
            
        }

    public function checkbox($id)
    {
        $result = User::find($id);
        if ($result->active) {
            $result->active=0;
        }
        else{
            $result->active=1;
        }
        $result->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $var=DB::table('tblUserAccess')
        ->join('tblUserLevel','tblUserAccess.userlevel_id','tblUserLevel.id')
        ->join('users','users.id','tblUserAccess.users_id')
        ->select('tblUserLevel.strUserLDesc','tblUserAccess.*')
        ->where('tblUserAccess.users_id',$id)
        ->get();
        return response::json($var);


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

     $var=DB::table('tblUserAccess')
     ->select('tblUserAccess.id')
     ->where('tblUserAccess.users_id',$request->myId)
     ->get();
     foreach ($var as $var ) {
         $userlevel= UserAccess::find($var->id);
         // dd($userlevel);
        if(in_array($var->id, $request->myCheckbox))
        {
            $userlevel->is_active=1;
             $userlevel->save();

        }
        else
        {
            $userlevel->is_active=0;
            $userlevel->save();

        }
     }
    return response::json(count($request->myCheckbox));
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
