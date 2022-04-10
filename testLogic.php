<?php

use function GuzzleHttp\Psr7\str;
 
//soal no 1
  $nilai=[72, 65, 73, 78, 75, 74, 90, 81, 87, 65, 55, 69, 72, 78, 79, 91, 100, 40, 67, 77, 86 ];
            
  function nilaiRata2($angka)
  { 

     $total=count($angka);
     $nilai=0;
     foreach ($angka as $value) {
        $nilai+=$value;
     }

     $nilairata2=$nilai/$total;
     echo $nilairata2;
  }

//soal no 1
  function nilaiTertinggi($angka)
  {
      echo max($angka);
  }

  //soal no 1
  function nilai7Terendah($angka){
     sort($angka);

    for ($i=0; $i < 7 ; $i++) { 
        echo $angka[$i];
        echo "<br/>";
    }
  }


  //soal no 2
  function checkHurufKecil($huruf)
  { 
   $totalHurufKecil= 0;
   $slot=str_split($huruf);
  foreach ($slot as  $value) {
       $checkLower=ctype_lower($value);
       if($checkLower == true)
       {
          $totalHurufKecil+=1;
       }
  }

    echo $totalHurufKecil;
  }
  
  // soal no 3 
  function UnigramBiagramTrigram($input)
  {
     $arr_input = explode(' ', $input);

 
     $unigram = '';
     foreach ($arr_input as $item) {
        $unigram .= $item.', ';
     }
     $unigram = substr($unigram, 0, -2);


     $x = 0;
     $bigram = '';
     foreach ($arr_input as $item) {
        if ($x < 1) {
           $bigram .= $item.' ';
           $x++;
        } else {
           $bigram .= $item.', ';
           $x = 0;
        }
     }
     $bigram = substr($bigram, 0, -2);

     $y = 0;
     $trigram = '';
     foreach ($arr_input as $item) {
        if ($y < 2) {
           $trigram .= $item.' ';
           $y++;
        } else {
           $trigram .= $item.', ';
           $y = 0;
        }
     }
     $trigram = substr($trigram, 0, -2);


     $result = 'Unigram : '. $unigram . '<br>';
     $result .= 'Bigram : '. $bigram . '<br>';
     $result .= 'Trigram : '. $trigram;

     return $result;
  }



echo nilaiRata2($nilai).'<br/>';
echo nilaiTertinggi($nilai).'<br/>';
echo nilai7Terendah($nilai).'<br/>';
echo checkHurufKecil('TranSISI').'<br/>';
echo UnigramBiagramTrigram('Jakarta adalah ibukota negara Republik Indonesia');


 



