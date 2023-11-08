<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\GeneralTrait;

class CheckBots
{
    use GeneralTrait;
    public function handle(Request $request, Closure $next)
    {
        $validator = Validator::make($request->only('desc'), [
            'desc' => ['present'],
        ]);
        if ($validator->fails())
            return $this->success("", [], 206);
        if (is_null($request->desc)) {
            return $next($request);
        }
        return $this->success("", [], 206);
    }
}
