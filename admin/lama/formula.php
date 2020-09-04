Baju Kurung
<?php 
//Bahagian baju
$B_baju = 2*(($bahu+2)*($l_baju+2));

//Bahagian Tangan
$B_tgn = 2*(2*(0.5*((($bahu/2)+1)+(($lengan/8)+1))*($p_tgn+2)));

//Bahagian Kekek
$B_kekek = ($kekek+1)*($kekek+1);

//Bahagian Pesak
$B_pesak = 4*(0.5*(($pesak_atas+1)+($pesak_bawah+1))*($l_baju-($bahu/2)+1));

//Bahagian Kain
if ($punggung > $pinggang) {
	$B_kain = ($l_kain+2)*($punggung+2);
} else {
	$B_kain = ($l_kain+2)*($pinggang+2);
}

//Total
$T_inci2 = $B_baju+$B_tgn+$B_kekek+$B_pesak+$B_kain;

//Bahagi 45 inci untuk buang inci square
$T_inci = $T_inci2/45;

//Tukar kepada meter
$T_meter = $T_inci * 0.0254;



//kiraan baru
    //xs
    if
    (($bahu >=12 && $bahu <=14)&&
     ($dada >=32 && $dada <=37)&&
     ($pinggang >=25 && $pinggang >=30)&&
     ($punggung >=36 && $punggung <=40)) 
     $T_meter=4;
    
    //s
    else if
    (($bahu >=13 && $bahu <=15)&&
     ($dada >=34 && $dada <=40)&&
     ($pinggang >=26 && $pinggang >=32)&&
     ($punggung >=37 && $punggung <=42)) 
    $T_meter=4;
    
    //m
    else if
    (($bahu >=14 && $bahu <=15.5)&&
     ($dada >=36 && $dada <=43)&&
     ($pinggang >=28 && $pinggang >=34)&&
     ($punggung >=40 && $punggung <=44)) 
     $T_meter=4;
    
    //L
	else if
    (($bahu >=14.5 && $bahu <=16)&&
     ($dada >=40 && $dada <=43)&&
     ($pinggang >=31 && $pinggang >=38)&&
     ($punggung >=42 && $punggung <=46)) 
     $T_meter=4.25;
    
    //xl
    else if
    (($bahu >=15 && $bahu <=16.5)&&
     ($dada >=42 && $dada <=44)&&
     ($pinggang >=34 && $pinggang >=42)&&
     ($punggung >=45 && $punggung <=50)) 
     $T_meter=4.5;
    else{
        echo "Ukuran tersebut tiada dalam jadual ukuran.";
    }
    



?>