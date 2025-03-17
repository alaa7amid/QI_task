<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout(); // تسجيل خروج المستخدم
        $request->session()->invalidate(); // مسح الجلسة
        $request->session()->regenerateToken(); // إنشاء توكن جديد للحماية

        return redirect('/'); // إعادة التوجيه للصفحة الرئيسية
    }
}
