<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\App;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        date_default_timezone_set('Africa/Cairo');

        // الحصول على اللغة الحالية من الجلسة
        $locale = $request->session()->get('Lang');

        // التحقق من أن اللغة موجودة في قائمة اللغات المدعومة
        if ($locale !== null && in_array($locale, config('app.locales', ['ar','en']))) {
            App::setLocale($locale);
        } else {
            // إذا لم تكن اللغة موجودة، تعيين اللغة الافتراضية
            $defaultLocale = config('app.locale');
            $request->session()->put('Lang', $defaultLocale);
            App::setLocale($defaultLocale);
        }

        return $next($request);
    }
}
