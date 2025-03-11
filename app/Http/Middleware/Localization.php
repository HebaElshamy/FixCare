<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    public function handle(Request $request, Closure $next): Response
    {
        // التحقق من أن اللغة مخزنة في الجلسة
        if (session()->has('lang')) {
            App::setLocale(session()->get('lang'));
        } elseif ($request->hasHeader('Accept-Language')) {
            $locale = explode(',', $request->header('Accept-Language'))[0]; // أخذ أول لغة فقط
            $locale = substr($locale, 0, 2); // استخراج أول حرفين فقط (مثلاً en_US → en)
            $validLocales = ['en', 'ar']; // أضف أي لغات أخرى يدعمها التطبيق
            if (in_array($locale, $validLocales)) {
                App::setLocale($locale);
            }
        }

        return $next($request);
    }

}

