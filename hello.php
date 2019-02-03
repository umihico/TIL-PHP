<?php
  echo "Hello\n";
  print("print\n");
  $var=3*5;
  print($var);
  $a=10;
  $b=4;
  echo $a+$b;
  echo "\n";
  echo $a-$b;
  echo "\n";
  echo $a*$b;
  echo "\n";
  echo $a/$b;
  echo "\n";
  echo $a%$b;
  echo "$a\n";
  echo $a++;
  echo ++$a;
  echo "\n";
  echo $a;
  echo "\n";
  $l=["a","b","c"];
  echo $l[2];
  echo "\n";
  var_dump($l);
  $human = array("hei" => 180, "wei"=>80,"name"=>"umihico");
  echo $human["hei"];
  echo "\n";
  for ($i=0; $i <10 ; $i++) {
    echo $i."for";
    // if ($i % 2 == 0) {
    //   echo "even";
    // }
  }
  echo $a."\n";
  echo $a."\n";
  /**
   *
   */
  class Dog
  {

    public $name="Pochi";
    public function bark()
    {
      echo 'barkbark';
    }
  }
  $dog=new Dog();
  $dog->bark();
?>
