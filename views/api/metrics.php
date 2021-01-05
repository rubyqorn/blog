<?php 

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use App\Auth\Authentication;
use App\Http\ApiResponse;

Authentication::authenticate(
    function(ApiResponse $response) use ($metrics) {

        if (!$metrics) {
            return $response->failureResponse('Stats not available. No posts statistics');
        }

        return $response->successResponse($metrics);
    },
    function(ApiResponse $response) {
        return $response->failureResponse('You are not authenticated');
    }
);
