<?php
namespace first;
class Multiply
{
protected $ans1=1, $n1=1, $fn;
function __construct($in){
    $this->fn=$in   ;
}
function setdata($in){
    $this->fn=$in;
}
   function fibionaci ()
   {
        $a=0;
        $b=1;
        $ans=0;
        $n=2;
            while ($ans<$this->fn)
            {
            $n++;
           // print ($ans."<br>");
                $ans=$a+$b;
            
                $a=$b;
                $b=$ans;
            }
            $this->ans1=$b;
            $this->n1=$n;
    }
    function arithmetic_progression ()
   {
        $a=$this->fn; //pradinis skaicius (per metoda keiciasi)
        $b=2; //aritmetine progresija (+2 siuo atveju)
        $ans=0;
        $n=5; //rasti nari
        $x=1; //nario nr
            while ($x<$n)
            {
            $x++;
            //print ($ans."<br>");
                $ans=$a+$b;
                $a=$ans;
            }
            $this->ans1=$a;
            $this->n1=$n;
    }
    function add(){
        $this->ans1= $this->ans1+$this->n1;
        
    }
    function show(){
        print ($this->ans1."<br>");
        print ($this->n1);
    }
    function get_answer(){
        return $this->ans1;
        
    }
    function get_n(){
        return $this->n1;
        
    }
}
?> 