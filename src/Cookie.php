<?php

declare(strict_types=1);

namespace Marussia\Response;

class Cookie
{
    private $name;
    private $value;
    private $expire = 0;
    private $path = '';
    private $domain = '';
    private $secure = false;
    private $httponly = true;
    
    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
    
    public static function create(string $name, string $value) : self
    {
        return new static($name, $value);
    }
    
    public function expire(int $expire) : self
    {
        $this->expire = $expire;
        return $this;
    }
    
    public function path(string $path) : self
    {
        $this->path = $path;
        return $this;
    }
    
    public function domain(string $domain) : self
    {
        $this->domain = $domain;
        return $this;
    }
    
    public function secure(bool $secure) : self
    {
        $this->secure = $secure;
        return $this;
    }
    
    public function httponly(bool $httponly) : self
    {
        $this->httponly = $httponly;
        return $this;
    }
    
    public function set() : void
    {
        setcookie($this->name, $this->value, $this->expire, $this->path, $this->domain, $this->secure, $this->httponly);
    }
}
