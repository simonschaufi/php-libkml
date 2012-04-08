<?php
namespace libKML;

/**
 *   NetworkLinkControl class
 */

class NetworkLinkControl {
  public $minRefreshPeriod;
  public $maxSessionLength;
  private $cookie;
  private $message;
  private $linkName;
  private $linkDescription;
  public $linkSnippet;
  public $expires;
  public $update;
  public $abstractView;
  
  public function setCookie($cookie) {
    $this->cookie = $cookie;
  }
  
  public function getCookie() {
    return $this->cookie;
  }
  
  public function setMessage($message) {
    $this->message = $message;
  }
  
  public function getMessage() {
    return $this->message;
  }
  
  public function setLinkName($linkName) {
    $this->linkName = $linkName;
  }
  
  public function getLinkName() {
    return $this->linkName;
  }
  
  public function setLinkDescription($linkDescription) {
    $this->linkDescription = $linkDescription;
  }
  
  public function getLinkDescription() {
    return $this->linkDescription;
  }

  public function __toString() {
    $output = array();
    
    if (isset($this->cookie)) {
      $output[] = sprintf("\t<cookie>%s</cookie>", $this->cookie);
    }
    
    if (isset($this->message)) {
      $output[] = sprintf("\t<message>%s</message>", $this->message);
    }
    
    if (isset($this->linkName)) {
      $output[] = sprintf("\t<linkName>%s</linkName>", $this->linkName);
    }
    
    if (isset($this->linkDescription)) {
      $output[] = sprintf("\t<linkDescription><![CDATA[%s]]></linkDescription>", $this->linkDescription);
    }
    
    $output[] = '<NetworkLinkControl>';
    $output[] = '</NetworkLinkControl>';
    
    return implode("\n", $output);
  }
}