<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;

class AuthController extends Controller
{
    public function register(Request $request){
        
            $validatedData = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);
        
            if ($validatedData->fails()) {
                return response(['errors'=>$validatedData->errors()->all()], 422);
            }
            $request['password'] = bcrypt($request['password']);

            $user = User::create($request->toArray());

            $user['access_token'] = $user->createToken('auth_token')->plainTextToken;

            return response($user, 200);
        }



    public function login(Request $request){
            if (!Auth::attempt($request->only('email', 'password'),true)) {
            return response()->json(['message' => 'Invalid login details'], 401);
            }
            $user = User::where('email', $request['email'])->firstOrFail();
            $user['access_token'] = $user->createToken('auth_token')->plainTextToken;
            $user['token_type'] = 'Bearer';
            return response()->json($user);
            }

    public function list(Request $request){
                try {
                    $users = User::with('roles')->with('profile');
                    if ($request->has('email'))$users->where('email',"LIKE", '%'.$request['email'].'%');
                    if ($request->has('name'))$users->where('name',"LIKE", '%'.$request['name'].'%');
                    $users->orderBy('created_at','DESC');
                    $users = $users->paginate(10);
                    return response()->json($users,200);
                } catch (Exception $e) {
                    return response()->json(['error' => $e->getMessage() ], 401);
                }
            }

    public function detail(Request $request, $id){
                try {
                    $user = User::with('roles')->with('profile')->findOrFail($id);
                    return response()->json($user,200);
                } catch (Exception $e) {
                    return response()->json(['error' => 'Invalid'], 401);
                }

            }
        
        
    public function update(Request $request, $id){
        try{
                $validatedData = Validator::make($request->all(), [
                    'name' => 'string|max:255',
                    'email' => 'string|email|max:255|unique:users',
                    'password' => 'string|min:6',
                ]);
            
                if ($validatedData->fails()) {
                    return response(['errors'=>$validatedData->errors()->all()], 422);
                }
                $user = User::with('profile')->findOrFail($id);
                if($request->name)$user->name = $request->name;
                if($request->password)$user->password = bcrypt( $request->password );
                if($user->profile_id){
                    $profile_id = $user->profile_id;
                }else{
                   $create_profile = Profile::create(["user_id"=>$user->id]);
                   $profile_id =  $user->profile_id = $create_profile->id;
                }
                $user->save();
                $profile = Profile::findOrFail($profile_id);
                if($request->pbs_id)$profile->pbs_id = $request->pbs_id;
                if($request->tax_id)$profile->tax_id = $request->tax_id;
                if($request->phone)$profile->phone = $request->phone;
                if($request->address)$profile->address = $request->address;
                if($request->note)$profile->note = $request->note;
                $profile = $profile->save();
                
                return response()->json(['message' => 'User updated successfully'], 200);
        } catch (Exception $e){
                return response()->json(['error' => $e->getMessage()], 401);
        }
                
            }
    
    public function create(Request $request){
            try{
                $validatedData = Validator::make($request->all(), [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6',
                ]);
            
                if ($validatedData->fails()) {
                    return response(['errors'=>$validatedData->errors()->all()], 422);
                }
                $request['password'] = bcrypt($request['password']);
    
                $user = User::create($request->toArray());
                $profile = Profile::create(["user_id"=>$user->id]);
                return response($user, 200);
            } catch (Exception $e){
                return response()->json(['error' => $e->getMessage()], 401);
                }

            }

    public function destroy($id)
            {
                try {
                    User::findOrFail($id)->delete();
                    return response()->json(['message' => 'User deleted successfully'], 200);
                } catch (Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 401);
                }
            }       
            


}
