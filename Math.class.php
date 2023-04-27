<?php
namespace second;
define ("PREC","%01.2f");

/**
 *@package Numbers
 *@author  Serkan Ceylani serkan@turk-php.com
 *@copyright 2005 turk-php.com
 */

class Numbers {
    
    public $number  = array();
    
    function Numbers ($number) {
        $this->__construct($number);
    }
    
    function __construct ($num) {
        
        if (is_array($num)){
            
            if (empty($this->numCount)){
                
            $this->numCount = count ($num);
            
            }
            
            for ($i=0;$i<$this->numCount;$i++) {
                
               if (is_numeric ($num[$i])){
                
                $this->number[] = new Numbers($num[$i]);
                
               }
            }
        }
        
        if (is_numeric($num)){
            
            $this->number = $num;
        }
    }
    
    function getNumbersArray () {
        
        $this->numbersArray = array();
        
        for ($i=0;$i<$this->numCount;$i++){
          
            $this->numbersArray[] =  $this->number[$i]->number;
           
        }
        return $this->numbersArray;
    }
}

/**
 *@package Add
 *@author  Serkan Ceylani serkan@turk-php.com
 *@copyright 2005 turk-php.com
 */

class Add {
    
    public $result;
    
    function Add (Numbers $numbers){
        $this->__construct($numbers);
    }
    
    function __construct(Numbers $numbers){
        
        if ($numbers->numCount > 0){
            
            // Another way of doing this:
            // $this->result = array_reduce($numbers->getNumbersArray(),create_function('$v,$w','if
            // (!isset($v)){ $v=$w;return $v;}$v = $v + $w;return $v;'));
            
            for ($i=0;$i<$numbers->numCount;$i++){
                
                $this->result = $this->result + $numbers->number[$i]->number;
                
            }
            
            $this->result = sprintf(PREC,$this->result);
            return $this->result;
        }
        
        $this->result = $numbers->number;
        
        return $this->result;
    }   
}

/**
 *@package Substract
 *@author  Serkan Ceylani serkan@turk-php.com
 *@copyright 2005 turk-php.com
 */

class Substract {
    
    public $result;
    
    function Substract (Numbers $numbers){
        $this->__construct($numbers);
    }
    
    function __construct(Numbers $numbers){
        
        if ($numbers->numCount > 0){
            // Another way of doing this:
            // $this->result = array_reduce($numbers->getNumbersArray(),create_function('$v,$w','if
            // (!isset($v)){ $v=$w;return $v;}$v = $v + $w;return $v;'));
            $this->result = array_reduce($numbers->getNumbersArray(),
            function($v,$w){if (!isset($v)){ $v=$w;return $v;}$v = $v - $w;return $v;});
            
            $this->result = sprintf(PREC,$this->result);
            return $this->result;
        }
        
        $this->result = $numbers->number;
        
        return $this->result;
    }   
}

/**
 *@package Multiply
 *@author  Serkan Ceylani serkan@turk-php.com
 *@copyright 2005 turk-php.com
 */

class Multiply {
    
    public $result;
    
    function Multiply (Numbers $numbers){
        $this->__construct($numbers);
    }
    
    function __construct(Numbers $numbers){
        
        if ($numbers->numCount > 0){
            
            $this->result = array_reduce($numbers->getNumbersArray(),
            function($v,$w){if (!isset($v)){ $v=$w;return $v;}$v = $v * $w;return $v;});
            
            $this->result = sprintf(PREC,$this->result);
            return $this->result;
        }
        
        $this->result = $numbers->number;
        
        return $this->result;
    }   
}

/**
 *@package Divide
 *@author  Serkan Ceylani serkan@turk-php.com
 *@copyright 2005 turk-php.com
 */

class Divide {
    
    public $result;
    
    function Divide (Numbers $numbers){
        $this->__construct($numbers);
    }
    
    function __construct(Numbers $numbers){
        
        if ($numbers->numCount > 0){
            
            $key = array_search('0',$numbers->getNumbersArray());
            
            if ($key != 0) {
                echo ("Division by Zero...");
                return FALSE;
            } else {
            $this->result = array_reduce($numbers->getNumbersArray(),
            function($v,$w){if (!isset($v)){ $v=$w;return $v;}$v = $v / $w;return $v;}); 
            
            $this->result = sprintf(PREC,$this->result);
            return $this->result;
            }
        }
        
        $this->result = $numbers->number;
        return $this->result;
    }   
}

/**
 *@package Modul
 *@author  Serkan Ceylani serkan@turk-php.com
 *@copyright 2005 turk-php.com
 */

class Modul {
    
    public $result;
    
    function Modul (Numbers $numbers){
        $this->__construct($numbers);
    }
    
    function __construct(Numbers $numbers){
        
        if ($numbers->numCount > 0){
            $this->result = array_reduce($numbers->getNumbersArray(),
            function($v,$w){if (!isset($v)){ $v=$w;return $v;}$v = $v % $w;return $v;}); 
            
            $this->result = sprintf(PREC,$this->result);
            return $this->result;
        }
        
        $this->result = $numbers->number;
        return $this->result;
    }   
}

/**
 *@package Power
 *@author  Serkan Ceylani serkan@turk-php.com
 *@copyright 2005 turk-php.com
 */

class Power {
    
    public $result;
    
    function Power (Numbers $numbers){
        $this->__construct($numbers);
    }
    
    function __construct(Numbers $numbers){
        
        if ($numbers->numCount > 0){
            $this->result = array_reduce($numbers->getNumbersArray(),
            function($v,$w){if (!isset($v)){ $v=$w;return $v;}$v = pow($v,$w);return $v;}); 
            
            $this->result = sprintf(PREC,$this->result);
            return $this->result;
        }
        
        $this->result = $numbers->number;
        return $this->result;
    }   
}

/**
 *@package Circle
 *@author  Serkan Ceylani serkan@turk-php.com
 *@copyright 2005 turk-php.com
 */

class Circle {
    
    public $Halfdiameter;
    
    function __construct($halfdiameter) {
        
        $this->Halfdiameter = $halfdiameter;
    }
    
    function Chamfer () {
        return ( sprintf(PREC,2 * M_PI * $this->Halfdiameter) );
    }
    
    function Area () {
        return  (sprintf(PREC,M_PI * pow($this->Halfdiameter,2)));
    }
    
    function PieArea ($angle) {
        return ( sprintf(PREC,M_PI * pow($this->Halfdiameter,2) * $angle / 360 ));
    }
    
    function ArcLength ($angle) {
        return ( sprintf(PREC,2 * M_PI * $this->Halfdiameter * $angle / 360 ));
    }
}

/**
 *@package Triangle
 *@author  Serkan Ceylani serkan@turk-php.com
 *@copyright 2005 turk-php.com
 */

class Triangle {
    
    public $Side1;
    public $Side2;
    public $Side3;
    
    public $Height;
    
    function __construct () {
    }
    
    private function getS () {
        return (1 / 2 * ($this->Side1 + $this->Side2 + $this->Side3));
    }
    
    function setSides ($side1,$side2,$side3) {
        
        $this->Side1 = (float)$side1;
        $this->Side2 = (float)$side2;
        $this->Side3 = (float)$side3;
        
        if (($this->Side1 < 0) || ($this->Side2 < 0) || ($this->Side3 < 0)) {
            echo ("<b>Side length can not be negative...</b>");
            return FALSE;
        }
        
        $Svalue = (int)$this->getS();
        
        if ( $Svalue * ($Svalue - $this->Side1) * ($Svalue - $this->Side2) * ($Svalue - $this->Side3) < 0 ) {
            echo ("<b>Can't create a triangle with these side values.Change your values and try again...</b>");
            return FALSE;
        }
    }
    
    
    
    function setAngles ($angle1=null,$angle2=null,$angle3=null) {
        
        $this->Angle1 = (float)$angle1;
        $this->Angle2 = (float)$angle2;
        $this->Angle3 = (float)$angle3;
        
        if (($this->Angle1 < 0) || ($this->Angle2 < 0) || ($this->Angle3 < 0)) {
            echo ("<b>Angle can not be negative...</b>");
            return FALSE;
        }
        
        if ( ($this->Angle1 + $this->Angle2 + $this->Angle3) != 180 ) {
            echo ("<b>Inside angles of this triangle should be total 180 degrees...</b>");
            return FALSE;
        }
    }
    
    function Area () {
        
        if (isset($this->Side1) && isset($this->Side2) && isset($this->Side3)){
        
        $Svalue = (float)$this->getS();
        
        return sqrt(
            ($Svalue * ($Svalue - $this->Side1) *
            ($Svalue - $this->Side2) * ($Svalue - $this->Side3))
            );
        }
        
        if (isset($this->Height) && isset($this->Base)){
            return ( 1 / 2 * $this->Height * $this->Base );
        }
        
    echo ("<b>Can't calculate the area of this triangle.Set side values for this triangle first...</b>");
    return FALSE;
    }
    
    function findAngle1 () {
        
        if (isset($this->Side1) && isset($this->Side2) && isset($this->Side3)){
            
            $temp1 =  pow($this->Side2,2) + pow($this->Side3,2) - pow($this->Side1,2);
            $temp2 =  2 *  $this->Side2 * $this->Side3;
            $temp3 =  $temp1 / $temp2;
            
            $result = round(rad2deg(acos($temp3)));
            
            return ($result);
            
        }
        return FALSE;
    }
    
    function findAngle2 () {
        if (isset($this->Side1) && isset($this->Side2) && isset($this->Side3)){
            
            $temp1 = (int) pow($this->Side1,2) + pow($this->Side3,2) - pow($this->Side2,2);
            $temp2 = (int) 2 *  $this->Side1 * $this->Side3;
            $temp3 = (int) $temp1 / $temp2;

            $result = round(rad2deg(acos($temp3)));
            
            return ($result);
            
        }
        return FALSE;
    }
    
    function findAngle3 () {
        if (isset($this->Side1) && isset($this->Side2) && isset($this->Side3)){
            
            $temp1 = (int) pow($this->Side1,2) + pow($this->Side2,2) - pow($this->Side3,2);
            $temp2 = (int) 2 *  $this->Side1 * $this->Side2;
            $temp3 = (int) $temp1 / $temp2;
            
            
            $result = round(rad2deg(acos($temp3)));
            
            return ($result);
            
        }
        return FALSE;
    }
}

?>