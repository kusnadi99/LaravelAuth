<?php

namespace App\Http\Middleware;

use Closure;

class HakAksesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //mendefinisikan parameter $namaRule untuk menentukan rulenya user atau admin
    public function handle($request, Closure $next, $namaRule)
    {
        //mengecek autentikasi
        //jika hak aksesnya tidak sesuai maka akan di redirect ke halaman get out
        if (auth()->check() && !auth()->user()->hasRule($namaRule)) {
            return redirect('getout');
        }
        return $next($request);
    }
}
