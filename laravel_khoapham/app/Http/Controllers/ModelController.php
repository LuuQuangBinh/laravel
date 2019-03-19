<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Product;
use App\Customer;
use App\PageUrl;
use App\Category;
use App\User;
use DB;
use App\Bill_detail;

class ModelController extends Controller
{
    //
    function index()
    {
        //$data = Bill::whereMonth('date_order', 7)->get();

        // $data = Product::join('categories as c', function($query){
        //                     $query->on('c.id', '=', 'products.id_type');
        //                 })
        //                 //->selectRaw('count(products.id) as tongSP, c.name as tenLoai') // Cách 1
        //                 ->select(DB::raw('count(products.id) as tongSP'), 'c.name as tenLoai') // Cách 2
        //                 ->where('c.name', '=', 'Phụ kiện')
        //                 ->orWhere('c.name', '=', 'iMac')
        //                 ->orderBy('tongSP', 'asc')
        //                 ->groupBy('c.name')
        //                 ->having('tongSP', '>=', 10)
        //                 ->get();


        // dd($data);


        // Insert
        // $customer = new Customer();
        // $customer->name = 'Nguyen Van Ti';
        // $customer->gender = 'male';
        // $customer->email = 'ti@gmail.com';
        // $customer->address = 'Cao Thang Quan 10';
        // $customer->phone = 1213;
        // $customer->save();
        // dd($customer);

        // Insert cách 2
        // $customer = Customer::create([
        //     'name' => 'Nguyen Van Teo',
        //     'gender' => 'nam',
        //     'email' => 'teo@gmail.com',
        //     'address' => 'Cao Thang Quan 10',
        //     'phone' => '098875453'
        // ]);
        // dd($customer);

        // Insert dùng cho query builder
        // DB::table('customers')->insert([
        //     'email' => 'john@example.com',
        //     'vote' => 0
        // ]);


        // Update cach 1
        // $customer = Customer::where('email', 'teo@gmail.com')->first();
        // if($customer)
        // {
        //     $customer->address = '181 Cao Thang';
        //     $customer->save();
        // }
        // else
        // {
        //     echo 'Khong tim thay';
        // }

        // Update cach 2
        // $customer = Customer::where('email', 'teo@gmail.com')
        //         ->update([
        //             'address' => 'Chung cu Charminton',
        //             'phone' => '464546546546'
        //         ]);
        

        // Xóa
        // $customer = Customer::where('email', 'teo@gmail.com')->first();
        // if($customer)
        // {
        //     $customer->delete();
        // }
        // else
        // {
        //     echo 'Khong tim thay';
        // }

        // Xóa cách 2
        // $customer = Customer::where('email', 'teo@gmail.com')->delete();
    }

    function relationship()
    {
        // $data = PageUrl::with('product')->limit(10)->get();
        // //dd($data);
        // foreach($data as $dt)
        // {
        //     echo $dt->product->name."<br>";
        //     echo $dt->url;
        //     echo "<hr>";
        // }

        // $data = Product::with('pageUrl')->limit(10)->get();
        // //dd($data);
        // foreach($data as $dt)
        // {
        //     echo $dt->pageUrl->url."<br>";
        //     echo $dt->name;
        //     echo "<hr>";
        // }

        // $data = Category::with('products')->whereIn('id', [7, 11])->get();
        // //dd($data);
        // foreach($data as $type)
        // {
        //     echo "<h3>$type->name</h3>";
        //     foreach($type->products as $p)
        //     {
        //         echo "<p>$p->name</p>";

        //     }
        //     echo "<hr>";
        // }

        // $user = User::where('id', 2)->with('roles')->first();
        // //dd($user);
        // echo "<h4>$user->email</h4>";
        // foreach($user->roles as $role)
        // {
        //     echo $role->role;
        // }

        //$role = Role::where('role', 'staff')->with('users')->get();

        // get all products by id_bill
        // $data = Bill::where('id', 8)->with('products')->first();
        
        // dd($data);


        // get all products of customer id=10 and email = huongnguyen08.cv@gmail.com
        // buy at 2018-05-25
        // Truy vấn từ Customer
        // $data = Customer::where([
        //     ['id', '=', 10],
        //     ['email', '=', 'huongnguyen08.cv@gmail.com']
        // ])->with(['bills'=>function($p){
        //     $p->where('date_order', '=', '2018-05-25');
        // }, 'bills.products'])->first();

        // Truy vấn từ Bill
        // $data = Bill::where('date_order', '=', '2018-05-25')
        //                 ->with(['customer'=>function($info){
        //                     $info->where([
        //                         ['id', '=', 10],
        //                         ['date_order', '=', '2018-05-25']
        //                     ]);
        //                 }, 'products'])->first();

        //$data = $this->customer->getQueryCustomer()->get();
        

        // liệt kê ds categories, ds tất cả sản phẩm theo loại, cho bít số lượng
        $data = Category::with('billDetail','billDetail.product')->get();
        //dd($data);
        foreach($data as $type)
        {
            echo $type->name."<br>";
            foreach($type->billDetail as $item)
            {
                echo "<br>";
                echo $item->product->name;
                echo " - ";
                echo "Số lượng: ".$item->quantity;
            }
            echo "<hr>";
        }
        
    }

}
