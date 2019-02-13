<?php

function stdin_to_intval() {
    return intval(trim(fgets(STDIN)));
    // echo stdin_to_intval();
}

function stdin_to_intvals() {
    $split_input=explode(' ',trim(fgets(STDIN)));
    foreach ($split_input as $val) {
        $vals[]=intval($val);
        // code...
    }
    return $vals;
    // list($a, $b, $c)=stdin_to_intvals();
}
function stdin_handler()
{
  list($dice_roll_nums,$y_size,$x_size)=stdin_to_intvals();
  list($dice_y,$dice_x)=stdin_to_intvals();
  $dice_history=trim(fgets(STDIN));
  return array($dice_roll_nums,$y_size,$x_size,$dice_y,$dice_x,$dice_history);
}

class Dice
{

  function __construct($y,$x)
  {
    $this->y=$y;
    $this->x=$x;
    $this->surface_dict= array(
      1 => 'top',
      6 => 'buttom',
      5 => 'south',
      2 => 'north',
      4 => 'east',
      3 => 'west',
    );
    $this->buttom=array_flip($this->surface_dict)['buttom'];
  }
  function set_new_pos($direction){
    $position_dict = array(
      "U"=> array(1,0),
      "D"=> array(-1,0),
      "L"=> array(0,-1),
      "R"=> array(0,1)
    );
    $y_adj_x_adj=$position_dict[$direction];
    list($y_adj,$x_adj)=$position_dict[$direction];
    $this->y=$this->y+$y_adj;
    $this->x=$this->x+$x_adj;
  }

  function set_new_surface($direction) {
    $surface_dict = array(
      "U"=> array(
        'top' => 'north',
        'buttom' => 'south',
        'east' => 'east',
        'north' => 'buttom',
        'west' => 'west',
        'south' => 'top'
      ),
      "D"=> array(
        'top' => 'south',
        'buttom' => 'north',
        'east' => 'east',
        'north' => 'top',
        'west' => 'west',
        'south' => 'buttom'
      ),
      "L"=> array(
        'top' => 'west',
        'buttom' => 'east',
        'east' => 'top',
        'north' => 'north',
        'west' => 'buttom',
        'south' => 'south'
      ),
      "R"=> array(
        'top' => 'east',
        'buttom' => 'west',
        'east' => 'buttom',
        'north' => 'north',
        'west' => 'top',
        'south' => 'south'
      )
    );
    $direction_selected_surface_dict=$surface_dict[$direction];
    foreach ($this->surface_dict as $num => $facing) {
      // echo $num.$facing."\n";
      $new_facing=$direction_selected_surface_dict[$facing];

      // echo $new_facing."\n";
      $new_surface_dict[$num]=$new_facing;

    }
    $this->surface_dict=$new_surface_dict;
    $this->buttom=array_flip($this->surface_dict)['buttom'];
  }
  function roll($direction)
  {
    $this->set_new_pos($direction);
    $this->set_new_surface($direction);
  }
}


function solve($dice_roll_nums,$y_size,$x_size,$dice_y,$dice_x,$dice_history)
{
  $paper=array();
  for ($i=0; $i < $y_size; $i++) {
    $paper[]=array_fill(0,$x_size,0);
  }
  foreach ($paper as $row) {
    echo implode(" ",$row)."\n";
  }
  $dice = new Dice($dice_y,$dice_x);
  $paper[$dice_y][$dice_x]=$dice->buttom;
  foreach (str_split($dice_history) as $direction) {
    $dice->roll($direction);
    $paper[$dice->y][$dice->x]=$dice->buttom;
    // echo "pos".$dice->y.','.$dice->x."=".$paper[$dice->y][$dice->x]."\n";
  }
  echo "count".count($paper)."\n";
  foreach ($paper as $row) {
    echo implode(" ",$row)."\n";
  }
}
function main()
{
  solve(...stdin_handler());
}

main();

?>
