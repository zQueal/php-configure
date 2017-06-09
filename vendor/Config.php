<?php

class Config {
  private static $config = [];
  public static $instance = "";
  private function __construct() {}
  public static function set($key, $val) {
    self::$config[$key] = $val;
  }
  public static function get($key) {
    self::$config[$key];
  }
  public static function ret($key) {
    print self::$config[$key];
  }
  public static function init($a) {
    self::$config = $a;
    self::$instance = new Config();
  }
  public static function update($a) {
    self::$config = array_merge(self::$config, $a);
  }
  public function __get($param) {
    if(isset(self::$config[$param])) {
      return self::$config[$param];
    }
  }
  public function __ret($param) {
    if(isset(self::$config[$param])) {
      return self::$config[$param];
    }
  }
  public function __isset($param) {
    if(isset(self::$config[$param])) {
      return true;
    }
    return false;
  }
}
