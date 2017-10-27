<?php
namespace App\Libraries\Xml;

use App\Libraries\Xml\Xml;

class Content implements \Iterator
{
    protected $iterator;

    public $current;

    public $key = 0;

    public function initIterator()
    {
        $xml = new Xml();

        if($xmlData=$this->getXml($this->path.$this->xml)){
            $data = $xml->XmlToArray($xmlData);
        }
        if (!is_object($this->iterator)) {
            $this->iterator = new \ArrayIterator($data);
        }
        return $this->iterator;
    }

    public function getXml($path)
    {
        if(file_exists($path)){
            $xmlStr = file_get_contents($path);
        } else {
            return false;
        }
        return $xmlStr;

    }


    public function current()
    {
        $this->current = $this->initIterator()->current();
        $this->key ++;
        return $this;
    }

    public function next()
    {
        return $this->initIterator()->next();
    }

    public function key()
    {
        return $this->key;
    }

    public function valid()
    {
        while($this->initIterator()->valid()){
            if ($this->filter()) {
                return true;
            } else {
                $this->initIterator()->next();
            }
        }
        return false;
    }

    public function rewind()
    {
        $this->initIterator()->rewind();
    }

    public function filter()
    {
        return true;
    }
}