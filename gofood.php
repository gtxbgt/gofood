<?php

error_reporting(0);
if (!file_exists('token')) {
    mkdir('token', 0777, true);
}

include ("curl.php");
echo "\n";
echo "\e[94m  =================================================\n";
echo "\e[92m         ========RePUBLIK GEDEL========            \n";
echo "\e[93m    TOOL AUTO REGIATRASI DAN AUTO REDEM VOUCER     \n";
echo "\e[93m   GOFOOD GOPULSA GORIDE TAPI ORA ISO GOPESEN LC   \n";
echo "\e[93m  DINGGO SAK MADYO WAE OJO SAK GELEME UDELMU DEWE  \n";
echo "\e[94m  =================================================\n";
echo "\n";
echo "\e[96m[?]DIISI NOMER HENGPUNE: ";
$nope = trim(fgets(STDIN));
$register = register($nope);
if ($register == false)
    {
    echo "\e[91m[x] NOMER ORA ISO DIENGGO \n";
    }
  else
    {
    otp:
    echo "\e[96m[!] DIISI KODE OTP: ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[97m[x] OTP MU SALAH  \n";
        goto otp;
        }
      else
        {
        file_put_contents("token/".$verif['data']['customer']['name'].".txt", $verif['data']['access_token']);
        echo "\e[93m[!] SOLALLAHU ALLA MUHAMMAD : GOFOODSANTAI19 !\n";
        sleep(3);
        $claim = claim($verif);
        if ($claim == false)
            {
            echo "\e[92m[!]".$voucher."\n";
            sleep(3);
            echo "\e[93m[!]SOLALLAHU ALLA MUHAMMAD: GOFOODSANTAI11 !\n";
            sleep(3);
            goto next;
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                sleep(3);
                echo "\e[93m[!] SOLALLAHU ALLA MUHAMMAD : COBAINGOJEK !\n";
                sleep(3);
                goto ride;
            }
            next:
            $claim = claim1($verif);
            if ($claim == false) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[93m[!] SOLALLAHU ALLA MUHAMMAD : GOFOODPASTA19 !\n";
                sleep(3);
                goto next2;
            }
            next2:
            $claim = claim1($verif);
            if ($claim == false) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[93m[!] SOLALLAHU ALLA MUHAMMAD : GOFOODSENANG19 !\n";
                sleep(3);
                goto next1;
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                sleep(3);
                echo "\e[93m[!] SOLALLAHU ALLA MUHAMMAD : COBAINGOJEK !\n";
                sleep(3);
                goto ride;
            }
            next1:
            $claim = claim2($verif);
            if ($claim == false) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[93m[!] SOLALLAHU ALLA MUHAMMAD : COBAINGOJEK !\n";
                sleep(3);
                goto ride;
            }
          else
            {
            echo "\e[92m[+] ".$claim . "\n";
            sleep(3);
            echo "\e[93m[!] SOLALLAHU ALLA MUHAMMAD : COBAINGOJEK !\n";
            sleep(3);
            goto ride;
            }
            ride:
            $claim = ride($verif);
            if ($claim == false ) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[93m[!]  SOLALLAHU ALLA MUHAMMAD : AYOCOBAGOJEK !\n";
                sleep(3);

            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                sleep(3);
                echo "\e[93m[!] SOLALLAHU ALLA MUHAMMAD : AYOCOBAGOJEK !\n";
                sleep(3);
                goto pengen;
            }
            pengen:
            $claim = cekvocer($verif);
            if ($claim == false ) {
                echo "\033ASTAUGFIRULLAH HAK ADZIIIIIIM.... SABAR GAGAL IKU AMERGO DURUNG REJEKINE BALENI MENEH YO SEMANGAT\n";
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                
        }
    }
    }


?>
