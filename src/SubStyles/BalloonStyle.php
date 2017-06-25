<?php
namespace KML\SubStyles;

class BalloonStyle extends SubStyle
{
    private $bgColor;
    private $textColor;
    private $text;
  
    public function __toString(): string
    {
        $output = [];
        $output[] = sprintf(
            "<BalloonStyle%s>",
            isset($this->id)?sprintf(" id=\"%s\"", $this->id):""
        );
    
        if (isset($this->bgColor)) {
            $output[] = sprintf("\t<bgColor>%s</bgColor>", $this->bgColor);
        }
    
        if (isset($this->textColor)) {
            $output[] = sprintf("\t<textColor>%s</textColor>", $this->textColor);
        }
    
        if (isset($this->text)) {
            $output[] = sprintf("\t<text><![CDATA[%s]]></text>", $this->text);
        }
    
        $output[] = "</BalloonStyle>";
    
        return implode("\n", $output);
    }
  
    public function getBgColor()
    {
        return $this->bgColor;
    }
  
    public function setBgColor($bgColor)
    {
        $this->bgColor = $bgColor;
    }
  
    public function getTextColor()
    {
        return $this->textColor;
    }
  
    public function setTextColor($textColor)
    {
        $this->textColor = $textColor;
    }
  
    public function getText()
    {
        return $this->text;
    }
  
    public function setText($text)
    {
        $this->text = $text;
    }
}
