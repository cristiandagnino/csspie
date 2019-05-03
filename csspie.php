/*******************************************************************

For an array like:

[data] => Array
    (
        [0] => Array
            (
                [title] => Minería
                [amount] => 14%
            )

        [1] => Array
            (
                [title] => Telecom. y Transp.
                [amount] => 14%
            )

        [2] => Array
            (
                [title] => Bank
                [amount] => 12%
            )

        [3] => Array
            (
                [title] => Ing. & Constr.
                [amount] => 18%
            )

        [4] => Array
            (
                [title] => Others
                [amount] => 44%
            )

    );

The % symbol is not used. You can usea any othe numbers and use insted $realprecentage.

********************************************************************?

function csspie($data, $diameter, $radius = "20px", $calculatepercentage = false; $res=2, $colors){
  if(!$colors)
    $colors = array('#d9d1c4','#778592','#1b3663','#5d6770','#5490cc','#32599a','#d9d1c4','#778592');
  //shuffle($colors);
  
  $pie = '';
  $legend = '';
  
  $total = 0;
  foreach($data as $d){
    if(trim($d['title']) == '') continue; // specify when not to use data
    $num = (int)preg_replace('/[^0-9]/', '', $d['amount']);  // just numbers
    $total = $total + $num;
  }

  $rotation = 0; 
  $res = 2;
  foreach($data as $k => $d){
    $num = (int)preg_replace('/[^0-9]/', '', $d['amount']); // just numbers
    $portion = (360 * $res * $num) / $total; // percentage of chart and resolution (size of the bar that ir going to rotate)
    $realprecentage = (100 * $num) / $total;

    if(trim($d['txt']) == '') continue; // specify when not to use data (same as last foreach)

    for( $i = $rotacion ; $i <= ($portion + round($rotacion)) ; $i++){ 
      $pie .=  '<div class="line" style="transform: rotate('.($i/$res).'deg);z-index:'.(($res*360)-$k).';width: 1px; height: calc(100% - '.$radius.'px); position: absolute;left: 50%;border-top: '.$radius.'px solid '.$colors[$k].';"></div>';
    }
    if( !$calculatepercentage )
      $legend .= '<div class="legend" title="'.$d['amount'].' '.$d['title'].'" >'.$d['amount'].' <b style="border-right:12px solid'.$colors[$k].'">&nbsp;</b> '.$d['title'].'</div>';
    else 
      $legend .= '<div class="legend" title="'.$d['amount'].' '.$d['title'].'" >'.$realprecentage.' <b style="border-right:12px solid'.$colors[$k].'">&nbsp;</b> '.$d['title'].'</div>';
    $rotation = $i;
  }
  return array('<div style="position:relative;width:'.$diameter.';height:'.$diameter.';">'.$pie.'</div>',$legend);
}
