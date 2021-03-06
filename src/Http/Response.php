<?php 

namespace App\Http;

class Response
{
    /**
     * HTTP status code 
     * 
     * @var int $code  
     */ 
    private int $code;

    /**
     * Data which will be sent with response
     * 
     * @var array 
     */ 
    private array $data;

    /**
     * HTTP headers
     * 
     * @var array 
     */ 
    private array $headers = [];

    /**
     * Initiate Response constructor method 
     *
     * @param int $code 
     * @param array $data 
     * @return void
     */ 
    public function __construct(int $code = 200, array $data = [])
    {
        $this->code = $code;
        $this->data = $data;
    }

    /**
     * Sets response data which will be sent with 
     * response 
     * 
     * @param string|array $data 
     * @return void 
     */ 
    public function setData($data)
    {
        $this->data[] = $data; 
    }

    /**
     * Sets HTTP status code 
     * 
     * @param int $code 
     * @return void 
     */ 
    public function setCode(int $code)
    {
        $this->code = $code;
    }

    /**
     * Sets HTTP headers which will be sent by using 
     * header() function
     * 
     * @param string $header
     * @return void 
     */ 
    public function setHeaders(string $header)
    {
        $this->headers[] = $header;
    }

    /**
     * Returns setted headers
     * 
     * @return array 
     */ 
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Sends HTTP headers
     * 
     * @param string $header
     * @return void 
     */ 
    public function sendHeader(string $header)
    {
        return header($header);
    }

    /**
     * Encode data in array format to JSON.
     *
     * @return string 
     */ 
    public function json()
    {
        return json_encode($this->data);
    }

    /**
     * Displays data in JSON format when 
     * call Response object like string 
     * 
     * @return string 
     */ 
    public function __toString()
    {
        return $this->json();
    }

    /**
     * Loop setted headers and send like HTTP response
     * 
     * @return void 
     */ 
    public function sendResponse()
    {
        $this->setHeaders("HTTP/1.1 {$this->code}");

        foreach($this->headers as $header) {
            $this->sendHeader($header);
        }

        return $this->data;
    }
}
