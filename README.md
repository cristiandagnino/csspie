# csspie
CSS pie chart for all mayor browsers.

Its a small div bar rotation with ```transform: rotate(XXdeg) ```

```
function csspie($data, $diameter, $radius = "20px", $calculatepercentage = false; $res=2, $colors){}
```
Just include the file or copy the function.

Retuns: ``` array( $htmlCSSpie, $legend ); ``` 

For a $data array like:
```
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
          .......
```
