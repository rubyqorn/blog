<?php 

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use App\Http\ApiResponse;
use App\Auth\Authentication;

Authentication::authenticate(
    function(ApiResponse $response) use ($post) {

        if (!$post) {
            return $response->failureResponse('Post doesn\'t exists');
        }

        return $response->successResponse($post);
    },
    function(ApiResponse $response) {
        return $response->failureResponse('You are not authenticated');
    }
);
