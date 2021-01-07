<?php 

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use App\Http\ApiResponse;
use App\Auth\Authentication;

Authentication::authenticate(
    function(ApiResponse $response) use ($user) {

        if (!$user) {
            return $response->failureResponse('User doesn\'t exists');
        }

        return $response->successResponse($user);
    },
    function(ApiResponse $response) {
        return $response->failureResponse('You are not authenticated');
    }
);
