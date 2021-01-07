<?php 

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use App\Http\ApiResponse;
use App\Auth\Authentication;

Authentication::authenticate(
    function(ApiResponse $response) use ($status) {

        if (!$status) {
            return $response->failureResponse('Failed to edit post');
        }

        return $response->successResponse($status);
    },
    function(ApiResponse $response) {
        return $response->failureResponse('You are not authenticated');
    }
);
