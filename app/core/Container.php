<?php
namespace App\core;
class Container {
    private $services = [];

    public function set($name, $factory) {
        $this->services[$name] = $factory;
    }

    public function get($name) {
        if (!isset($this->services[$name])) {
            handleException("Service not found: $name");
        }
        return call_user_func($this->services[$name], $this);
    }
}