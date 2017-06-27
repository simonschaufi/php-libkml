<?php
namespace KML\Time;

class TimeStamp extends TimePrimitive
{
    /** @var  string */
    private $when;
  
    public function __toString(): string
    {
        $parent_string = parent::__toString();
    
        $output = [];
        if (isset($this->when)) {
            $output[] = sprintf(
                "<TimeStamp%s>",
                isset($this->id)?sprintf(" id=\"%s\"", $this->id):""
            );
            $output[] = $parent_string;
      
            $output[] = $this->when;
      
            $output[] = "</TimeStamp>";
        }
    
        return implode("\n", $output);
    }
  
    public function getWhen(): string
    {
        return $this->when;
    }
  
    public function setWhen(string $when)
    {
        $this->when = $when;
    }
}
