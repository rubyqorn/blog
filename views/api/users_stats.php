<?php 

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use App\Auth\Authentication;
use App\Http\ApiResponse;

Authentication::authenticate(
    function(ApiResponse $response) use ($stats) {

        if (!$stats) {
            return $response->failureResponse('Stats not available. No users statistics');
        }

        return $response->successResponse($stats);
    },
    function(ApiResponse $response) {
        return $response->failureResponse('You are not authenticated');
    }
);
