<?php
class factorial
{
    public int $givenNumber;
    public int $summ = 1;

    public function __construct($givenNumber){
        $this->givenNumber = $givenNumber;
    }
    public function getFactorial(){
        if ($this->givenNumber <> 0){
            $i=$this->givenNumber;
            while($i>0){
                $this->summ = $this->summ * $i;
                $i--;
            }
        }else{
            return 0;
            }
        return $this->summ;
        }

    }

$num = 5;
$givenNumber = new factorial($num);
echo 'Factorijel od broja '.$givenNumber->givenNumber.' je '.$givenNumber->getFactorial();
