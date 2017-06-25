<?php
namespace KML\Time;

class TimeSpan extends TimePrimitive
{
    /** @var  string */
    private $begin;
    /** @var  string */
    private $end;
  
    public function __toString(): string
    {
        $parent_string = parent::__toString();
    
        $output = [];
        $output[] = sprintf(
            "<TimeSpan%s>",
            isset($this->id)?sprintf(" id=\"%s\"", $this->id):""
        );
        $output[] = $parent_string;
    
        $output[] = "</TimeSpan>";
    
        return implode("\n", $output);
    }
  
    public function getBegin(): string
    {
        return $this->begin;
    }
  
    public function setBegin(string $begin)
    {
        $this->begin = $begin;
    }
  
    public function getEnd(): string
    {
        return $this->end;
    }
  
    public function setEnd(string $end)
    {
        $this->end = $end;
    }
}
