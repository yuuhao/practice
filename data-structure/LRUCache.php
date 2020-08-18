<?php


namespace practice\data;


class LRUCache {
    public int $capacity;
    public array $arr = [];

    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->capacity = $capacity;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if (!isset($this->arr[$key])) {
            return -1;
        }
        $tmp = $this->arr[$key];
        unset($this->arr[$key]);
        $this->arr[$key] = $tmp;
        return $tmp;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if (isset($this->arr[$key])) {
            unset($this->arr[$key]);
            $this->arr[$key] = $value;
        } elseif(count($this->arr) >= $this->capacity) {
            array_shift($this->arr);
            $this->arr[$key] = $value;
        } else {
            $this->arr[$key]  = $value;
        }
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache(g);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */