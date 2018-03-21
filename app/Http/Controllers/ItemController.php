<?php

namespace App\Http\Controllers;
use App\Item;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemController extends Controller
{
    protected $item;
    public function __construct(Item $item){
        $this->item = $item;
    }

    public function register(Request $req){
        $item = [
            "user_id"  => $req->user_id,
            "name"  => $req->name,
            "price"  => $req->price,
            "stock" => $req->stock
        ];
        try{
            $item=$this->item->create($item);
            return response('Created',201);
        } catch(Exception $ex){
            return response('Failed',400);
        }
    }
    public function showAll(){
        try{
            $item = $this->item->all();
            return $item;
        } catch(Exception $ex){
            return response('Failed',400);
        }
    }



    public function find($id){
        try{
            $item = $this->item->find($id);
            return $item;
        } catch(Exception $ex){
            return response('Failed',400);
        }
    }
    public function delete($id){
        try{
            $item = $this->item->find($id)->delete();
            return response('Deleted',200);
        } catch(Exception $ex){
            return response('Failed',400);
        }
    }
    public function update(Request $request,$id){
        $item = $this->item->find($id);
        $item->user_id = $request->input('user_id');
        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->stock = $request->input('stock');

        try{
            $item->save();
            return response('Updated',200);
        } catch(Exception $ex){
            return response('Failed',400);
        }
    }
}

?>