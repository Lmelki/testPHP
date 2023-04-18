<?php
namespace Myclass;
use IntlDateFormatter;
use Mtownsend\ReadTime\ReadTime;


class Expe{
    public $id;
    public $name;
    public $content;
    public $date;
    
    
    
   public function getResume() {
        return substr($this->content, 0,50);

    }

    public function getDate() {
        $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::SHORT);
        return $formatter->format($this->date);
    }

    public function getReadTime() {
        return (new ReadTime($this->content))->get();
    }
}

?>