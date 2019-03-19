<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QueryBuilderController extends Controller
{
    //
    function index()
    {
        // select * from product
        //$data = DB::table('products')->get();


        // select * from products where id<10
        // $data = DB::table('products')->where('id','<',10)->get(['id', 'name', 'price']);

        // select * from products where id<10 and price>=30000000
        // $data = DB::table('products')
        // ->where([
        //     ['id','<',10],
        //     ['price','>=',30000000]
        // ])
        // ->select(['id', 'name', 'price'])->get();
        
        // select * from products where id<10 or price>=30000000
        // $data = DB::table('products')
        // ->where([
        //     ['id','<',10]
        // ])
        // ->orWhere('price','>=',30000000)
        // ->select(['id', 'name', 'price'])
        // ->get();

        // select * from products where id<10 and price>=30000000
        // $data = DB::table('products')
        // ->where([
        //     ['id','<',10]
        // ])
        // ->orWhere('price','>=',30000000)
        // ->select(['id', 'name', 'price'])
        // ->limit(20)
        // ->offset(10) // ..... limit 10, 20
        // ->take(20)
        // ->get();

        // select p.name as tenSP, p.id, c.name as tenloai
        // from products p
        // inner join categories c
        // on p.id_type = c.id
        // where c.id = 7
        // $data = DB::table('products as p')
        //     ->join('categories as c', 'p.id_type', '=', 'c.id', 'inner') // nếu không ghi thì nó sẽ hiểu mặc định là inner
        //     ->where('c.id', '=', 7)
        //     ->get(['p.name as tenSP', 'c.name as tenloai', 'c.id as maloai']);
        
        // Câu 1: Liệt kê danh sách sản phẩm
        // select * from product
        //$data = DB::table('products')->get();

        // Câu 2: Liệt kê ds sản phẩm gồm: tên sp, đơn giá, hình, sắp xếp đơn giá tăng dần
        // select p.name, p.price, p.image from products p order by p.price asc
        // $data = DB::table('products as p')
        //             ->orderBy('p.price', 'asc')
        //             ->get(['p.name', 'p.price', 'p.image']);

        // Câu 3: Liệt kê ds khách hàng gồm: tên, giới tính, địa chỉ, điện thoại, sắp xếp tên tăng dần
        // select cus.name, cus.gender, cus.address, cus.phone from customers cus order by cus.name asc
        // $data = DB::table('customers as cus')
        //             ->orderBy('cus.name', 'asc')
        //             ->get(['cus.name', 'cus.gender', 'cus.address', 'cus.phone']);

        // Câu 4: liệt kê ds sản phẩm gồm: tên sp, mô tả, đơn giá, sắp xếp giảm theo đơn giá 
        // select p.name, p.detail, p.price from products p order by p.price desc
        // $data = DB::table('products as p')
        //             ->orderBy('p.price', 'desc')
        //             ->get(['p.name', 'p.detail', 'p.price']);

        // Câu 5: liệt kê ds sản phẩm gồm: tên sp, mô tả, đơn giá, chỉ liệt kê các sp iphone
        // select p.name, p.detail, p.price from products p where p.name like '%iPhone%'
        // $data = DB::table('products as p')
        //             ->where('p.name', 'like', '%iPhone%')
        //             ->get(['p.name', 'p.detail', 'p.price']);

        // Câu 6: Liệt kê ds sản phẩm mà tên sp có từ 'macbook' và giá lớn hơn 25.000.000
        // select * fromm product where name like '%macbook%' and price > 25000000
        // $data = DB::table('products')
        //         ->where([
        //             ['name', 'like', '%macbook%'],
        //             ['price', '>', '25000000']
        //         ])
        //         ->get();
        
        // Câu 7: Liệt kê ds sản phẩm có đơn giá từ 500.000 đến 1.000.000
        // select * from products where price >= 500000 and price <= 1000000
        // select * from products where price between 500000 and 1000000
        // $data = DB::table('products')
        //             ->whereBetween('price', [500000, 1000000])
        //             ->get();

        // Câu 8: Liệt kê các sản phẩm có đơn giá lớn hơn 35.000.000
        // select * from products where price > 35000000
        // $data = DB::table('products')
        //             ->where('price', '>', 35000000)
        //             ->get();

        // Câu 9:Liệt kê thông tin các sp có tên 'iPhone X 256GB', 'iPhone 8 Plus 256GB', 'iPhone 7 Plus 32GB'
        // select * from products where name in ('iPhone X 256GB', 'iPhone 8 Plus 256GB', 'iPhone 7 Plus 32GB')
        // $data = DB::table('products')
        //         ->whereIn('name', ['iPhone X 256GB', 'iPhone 8 Plus 256GB', 'iPhone 7 Plus 32GB'])
        //         ->get();

        // Câu 10: Liệt kê ds sản phẩm gồm: tên sp, mô tả, đơn giá của 10 sản phẩm có đơn giá cao nhất
        // select p.name, p.detail, p.price from product p order by p.price desc
        // $data = DB::table('products as p')
        //             ->orderBy('p.price', 'desc')
        //             // ->offset(0) //offset lấy từ vị trí 0
        //             ->limit(10)
        //             ->get(['p.name', 'p.detail', 'p.price']);

        // Câu 11: Liệt kê ds sản phẩm gồm: tên sp, đơn giá, khuyến mãi
        // select name, price, promotion_price from products
        // $data = DB::table('products')
        //             ->get(['name', 'price', 'promotion_price']);

        // Câu 12: Liệt kê ds khách hàng gồm: tên, email, địa chỉ, điện thoại
        // select cus.name, cus.email, cus.address, cus.phone from customers cus

        // Câu 13: Liệt kê ds tên loại sp gồm tên loại, sắp xếp tăng dần theo tên loại
        // select name from categories order by name asc
        // $data = DB::table('categories')
        //             ->orderBy('name', 'asc')
        //             ->get();

        // Câu 14: Liệt kê ds sản phẩm gồm: tên sp, mô tả, đơn giá. Sắp xếp giảm theo đơn giá và tăng theo tên sp
        // select p.name, p.detail, p.price from products p order by p.price desc, p.name asc
        // $data = DB::table('products as p')
        //             ->orderBy('p.price', 'desc')
        //             ->orderBy('p.name', 'asc')
        //             ->get(['p.name', 'p.detail', 'p.price']);

        // Câu 15: Liệt kê ds sản phẩm có tên bắt đầu bằng 'iPhone'
        // select * from products where name like ('iPhone%')
        // $data = DB::table('products')
        //             ->where('name', 'like', 'iPhone%')
        //             ->get();

        // Câu 16: Liệt kê ds sản phẩm có kí tự cuối sp là '32GB'
        // select * from products where name like '%32GB'
        // $data = DB::table('products')
        //             ->where('name', 'like', '%32GB')
        //             ->get();

        // Câu 17: Liệt kê ds sản phẩm mà trong tên sp có từ 'iMac'
        // select * from products where name like '%iMac%'
        // $data = DB::table('products')
        //             ->where('name' , 'like', '%iMac%')
        //             ->get();

        // Câu 18: Liệt kê ds sản phẩm có đơn giá từ 50.000.000 đến 100.000.000
        // select * from products where price >= 50000000 and price <= 100000000
        // select * from products where price between 50000000 and 100000000
        // $data = DB::table('products')
        //             ->whereBetween('price', [50000000, 100000000])
        //             ->get();

        // Câu 19: Cho biết đơn giá trung bình của các sản phẩm có mặt trong cửa hàng
        // select name, avg(price) from products where deleted = 0 group by name       * không chắc đúng
        // $data = DB::table('products')
        //             ->selectRaw('avg(price) as dongiaTB, avg(promotion_price) as dongiaTB2')
        //             ->where('deleted', '=', '0')
        //             ->first();

        // Câu 20: Liệt kê ds sản phẩm gồm: tên loại, tên sp, mô tả, đơn giá. Sắp xếp tên loại theo chiều tăng dần
        // select c.name, p.name, p.detail, p.price from products p inner join categories c on p.id_type = c.id order by c.name asc
        // $data = DB::table('products as p')
        //             ->join('categories as c', 'p.id_type', '=', 'c.id', 'inner') // Nếu ko ghi gì thì mặc định là inner
        //             ->orderBy('c.name', 'asc')
        //             ->get(['c.name as tenLoai', 'p.name as tenSP', 'p.detail as moTa', 'p.price as donGia']);
        
        // Câu 4 liên kết bảng
        // select c.name, sum(price) as tongtien, count(p.id) as tongSP
        // from products p
        // inner join categories c
        // on p.id_type = c.id
        // where p.price between 50000000 and 100000000
        // group by c.name

        // $data = DB::table('products as p')
        //             ->join('categories as c', function($query){
        //                 $query->on('c.id', '=', 'p.id_type');
        //             })
        //             ->where([
        //                 ['price', '>=', 50000000],
        //                 ['price', '<=', 100000000]
        //             ])
        //             ->selectRaw('c.name, sum(price) as tongtien, count(p.id) as tongSP')
        //             ->groupBy('c.name')
        //             ->get();

        // $data = DB::table('products as p')
        //             ->join('categories as c', function($query){
        //                 $query->on('c.id', '=', 'p.id_type');
        //             })
        //             ->whereBetween('price', [50000000, 100000000])
        //             ->selectRaw('c.name, sum(price) as tongtien, count(p.id) as tongSP')
        //             ->groupBy('c.name')
        //             ->get();

        // $data = DB::table('products as p')
        //             ->join('categories as c', function($query){
        //                 $query->on('c.id', '=', 'p.id_type');
        //             })
        //             ->whereBetween('price', [50000000, 100000000])
        //             ->selectRaw('c.name, sum(price) as tongtien, count(p.id) as tongSP')
        //             ->groupBy('c.name')
        //             ->having('tongSP', '>', 2)
        //             ->get();

        dd($data);  // print_r() thì vẫn chạy tiếp, còn dd thì in ra xong rồi dừng lun
    }
}
