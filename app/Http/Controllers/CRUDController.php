<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUDController extends Controller
{
    public function index()
    {
        $datas = DB::select("SELECT * FROM sanpham");
        return view("welcome")->with("datas", $datas);
    }

    public function create(Request $request)
    {
        try {
            $sql = DB::select("INSERT INTO sanpham(MaSanPham, TenSanPham, SoLuong, GiaBan) VALUES (?,?,?,?)", [
                $request->txtMaSanPhams,
                $request->txtTenSanPhams,
                $request->txtSoLuongs,
                $request->txtGiaBans
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == 0) {
            return back()->with("Error", "Thêm Sản Phẩm Không Thành Công");
        } else {
            return back()->with("Pass", "Thêm Sản Phẩm Thành Công");
        }
    }

    public function update(Request $request)
    {
        try {
            $sql = DB::update('UPDATE sanpham SET MaSanPham=? , TenSanPham=? , SoLuong=? , GiaBan=? WHERE Id=?', [
                $request->txtMaSanPhams,
                $request->txtTenSanPhams,
                $request->txtSoLuongs,
                $request->txtGiaBans,
                $request->txtIds
            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == 0) {
            return back()->with("Error", "Sửa Sản Phẩm Không Thành Công");
        } else {
            return back()->with("Pass", "Sửa Sản Phẩm Thành Công");
        }
    }

    public function delete($Id){
        try {
            $sql = DB::delete("DELETE FROM sanpham WHERE Id=$Id");
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == 0) {
            return back()->with("Error", "Xóa Sản Phẩm Không Thành Công");
        } else {
            return back()->with("Pass", "Xóa Sản Phẩm Thành Công");
        }
    }
}
