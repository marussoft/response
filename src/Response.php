<?php

declare(strict_types=1);

namespace Marussia\Response;

class Response
{
    protected $content = '';

    protected $code = 200;
    
    protected $headers = [];
    
    protected $version = 'HTTP/1.0';
    
    protected $cookies = [];
    
    protected  $statusTexts = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        103 => 'Early Hints',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',
        208 => 'Already Reported',
        226 => 'IM Used',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Payload Too Large',
        414 => 'URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        421 => 'Misdirected Request',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        425 => 'Too Early',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        451 => 'Unavailable For Legal Reasons',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        510 => 'Not Extended',
        511 => 'Network Authentication Required',
    ];
    
    public function content(string $content)
    {
        $this->content = $content;
    }
    
    public function header(string $header)
    {
        $this->headers[] = $header;
        return $this;
    }
    
    public function code(int $code)
    {
        $this->code = $code;
    }
    
    public function setCookie(string $name , string $value) : Cookie
    {
        $this->cookies[$name] = Cookie::create($name, $value);
        
        return $this->cookies[$name];
    }
    
    public function sendCookies() : void
    {
        if (!empty($this->cookies)) {
            foreach($this->cookies as $cookie) {
                $cookie->set();
            }
        }
    }
    
    public function sendHeaders()
    {
        if (!empty($this->headers)) {
            foreach ($this->headers as $header) {
                header(header);
            }
        }
        
        header($this->version . ' ' . $this->code . ' ' . $this->statusTexts[$this->code], true, $this->code);
        
        return $this;
    }
    
    public function send()
    {
        $this->sendCookies();
        $this->sendHeaders();
        $this->sendContent();
    }
    
    protected  function sendContent()
    {
        echo $this->content;
    }
}
