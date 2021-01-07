<?php 

namespace App\Http;

class ApiResponse extends Response
{
    /**
     * Sends success HTTP status code and returns
     * data in JSON format
     * 
     * @param string|array $payload
     * @return void  
     */ 
    public function successResponse($payload)
    {
        $this->setCode(200);
        $this->setHeaders('Content-Type: text/plain');
        $this->setHeaders('Access-Control-Allow-Origin: *');
        $this->sendResponse();
        
        exit(json_encode([
            'success' => 'true',
            'data' => $payload,
        ]));
    }

    /**
     * Sends server error HTTP status code and returns
     * data in JSON format
     * 
     * @param string|array $payload
     * @return void  
     */
    public function failureResponse($payload)
    {
        $this->setCode(500);
        $this->setHeaders('Content-Type: text/plain');
        $this->setHeaders('Access-Control-Allow-Origin: *');
        $this->sendResponse();

        exit(json_encode([
            'success' => 'false',
            'data' => $payload
        ]));
    }
}
