<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class DangNhapController extends Controller
{
    use AuthenticatesUsers;

    // protected $redirectTo = '/create-hoa-don';

    public function index()
    {
        return view('backend.Auth.login');
    }

    public function DangNhap(Request $request)
    {
        $data = [
            'sdt' => $request->sdt,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            $user = NhanVien::where('sdt', $request->sdt)->first();
            Auth::login($user);
            return redirect()->route('hoa-don.create');
        } else {
            return redirect()->route('DangNhap.index');
        }
    }

    public function DangXuat(Request $request)
    {
        Auth::logout();
        return redirect()->route('DangNhap.index');
    }

    public function username()
    {
        return 'sdt';
    }
}
