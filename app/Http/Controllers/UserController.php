<?php

namespace App\Http\Controllers;
use App\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;


class UserController extends Controller
{
    protected $user;

    public function __construct(Users $user){
        $this-> user = $user;

    }


    public function register(Request $req){
        $user = [
            "name"  => $req->name,
            "email"  => $req->email,
            "password"  => md5($req->password)
        ];
        try{
            $user = $this->user->create($user);
            return response('Success',201);
        }
        catch(Exception $ex){
            return response('Unsuccessful',400);
        }
    }
    public function showAll(){
        try{
            $user = $this->user->all();
            return $user;
        }catch(Exception $ex){
            return response('Unsuccessful',400);
        }
    }
    public function find($id){
        try{
            $user = $this->user->find($id);
            return $user;
        } catch(Exception $ex){
            return response('Unsuccessful',400);
        }
    }
    public function delete($id){
        try{
            $user = $this->user->find($id)->delete();
            return response('Delete',200);
        } catch(Exception $ex){
            return response('Failed',400);
        }
    }
    public function updateData(Request $request, $id){
        $user = $this->user->find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($user->password == $request->input('password')) {
        } else {
            $user->password = md5($request->input('password'));
        }
        try{
            $user->save();
            return response('Updated',200);
        }
        catch(Exception $ex){
            return response('Failed',400);
        }
    }
    public function join(){
        try{
            $user = $this->user->with('Items')->get();
            return $user;
        }
        catch(Exception $ex){
            return response('Failed',400);
        }
    }
}

?>