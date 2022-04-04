<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function list(){
        $data=Customer::paginate(2);
        // dd($data->toArray());
        $currentPage = $data->toArray()['current_page'];
        // dd($currentPage);
        $count = 1;
        return view('list')->with(['data'=>$data,'count'=>$count,'currentPage'=>$currentPage]);
    }

    public function insert(Request $request){
        $data = [
            'name'=>$request->name,
            'age'=>$request->age,
            'gender'=>$request->gender,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ];

        Customer::create($data);
        return back()->with('insertSuccess','Data Insert Success...'); // return with session message
    }

    public function deleteCustomer($id){
        // dd($id);
        // Customer::findOrFail($id)->delete();
        Customer::where('id',$id)->delete();
        return back()->with('deleteSuccess','Deleting Success...');
    }

    public function updateCustomer($id){
        $data = Customer::where('id',$id)->first();
        // dd($data->toArray());
        return view('updateCustomer')->with('data',$data);
    }

    public function update(Request $request)
    {
        $id = $request->customer_id;

        $data = [
            'name'=>$request->name,
            'age'=>$request->age,
            'gender'=>$request->gender,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'updated_at'=>Carbon::now()
        ];

        Customer::where('id',$id)->update($data);
        // return redirect('list')->with('updateSuccess','Updated Success...');
        return redirect()->route('listPage')->with('updateSuccess','Updated Success...');
    }
}
