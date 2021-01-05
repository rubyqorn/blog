<?php 

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use App\Http\ApiResponse;
use App\Auth\Authentication;

Authentication::authenticate(
    function(ApiResponse $response) use ($users) {
        if (!$users) {
            return $response->failureResponse('Failed to load users list');
        }

        return $response->successResponse($users);
    },
    function(ApiResponse $response) {
        return $response->failureResponse('You are not authenticated');
    }
);
