<?php
namespace TreinaWeb\Util\Iterator;

class Collection implements \Iterator
{
    
    protected $elements = array();
    protected $key = 0;
    
    public function __construct(array $elements)
    {
        $this->elements = $elements;
    }

     public function getElements()
     {
         return $this->elements;
     }
    
    public function valid()
    {
        return ($this->key < count($this->elements));
    }

    public function next()
    {
        $this->key++;
    }

    public function current()
    {
        return $this->elements[$this->key];
    }

    public function rewind()
    {
        $this->key = 0;
    }

    public function key()
    {
        return $this->key;
    }
}