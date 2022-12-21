public function moneyFormatIndia($number) 
{
    if($number<0)
        {
        $sign='-';
         $number=$this->checkmin($number);
        }
        else{
        $sign='';
        $number=$number;
        }
        $decimal = (string)($number - floor($number));
        $money = floor($number);
        $length = strlen($money);
        $delimiter = '';
        $money = strrev($money);

        for($i=0;$i<$length;$i++){
            if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$length){
                $delimiter .=',';
            }
            $delimiter .=$money[$i];
        }

        $result = strrev($delimiter);
        $decimal = preg_replace("/0\./i", ".", $decimal);
        $decimal = substr($decimal, 0, 3);

        if( $decimal != '0'){
            $result = $result.$decimal;
        }

        return $sign.$result;
}
function checkmin($str)
   {
    //$str='-540,00089';
     $res = str_replace( array( '\'', '"',
      ',' , ';', '<', '>' ,'-'), '', $str);
      return $res;
      }
