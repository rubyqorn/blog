<?php 

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use App\Http\ApiResponse;
use App\Auth\Authentication;

Authentication::authenticate(
    function(ApiResponse $response) use ($posts) {
        if (!$posts) {
            return $response->failureResponse('Failed to load posts list');
        }

        return $response->successResponse($posts);
    },
    function(ApiResponse $response) {
        return $response->failureResponse('You are not authenticated');
    }
);
