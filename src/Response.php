<?php

declare(strict_types=1);

namespace Marussia\Response;

class Response
{
    protected $content;

    public function content(string $content)
    {
        return $this->content = $content;
    }
    
    public function json(array $data) : self
    {
        return $this;
    }
    
    public function header()
    {
        return $this;
    }
    
    public function code(int $code)
    {
        return $this;
    }
    
    public function sendHeaders()
    {
        return $this;
    }
    
    public function send()
    {
        echo $this->content;
    }
}
