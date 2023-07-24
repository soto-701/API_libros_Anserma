<?php

namespace App\Http\Controllers\Api;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function checkModelExists(Closure $callback, $model)
    { 
      If (empty($model)) {
            return response( )-> json( [ 'success' => false, 'message' => trans ( 'messages.book.not_found ' ) ], Response :: HTTP_NOT_FOUND);
} else {
return $callback ( );
}
}
}
