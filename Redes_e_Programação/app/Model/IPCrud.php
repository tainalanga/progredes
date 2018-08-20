<?php

    require "IP.php";

class IPCrud
{

    public function subredes($numerodeRedes){
        $resultado = 256/$numerodeRedes;
        return $resultado;
    }

    public function hostsEmCadaRede($mascara){
        $bits = 32 - $mascara;
        $resultado = pow(2,$bits);
        return $resultado;
    }

    public function mascara($decimal){
        if ($decimal <= 8){
            $bits = 8 - $decimal;
            $numero = pow(2,$bits);
            $primeiro = 256 - $numero;
            $mascara = "$primeiro.0.0.0";

            return $mascara;
        }elseif ($decimal > 8 AND $decimal <= 16){
            $bits = 16 - $decimal;
            $numero = pow(2,$bits);
            $segundo = 256 - $numero;
            $mascara = "255.$segundo.0.0";

            return $mascara;
        }elseif ($decimal > 16 AND $decimal <= 24){
            $bits = 24 - $decimal;
            $numero = pow(2,$bits);
            $terceiro = 256 - $numero;
            $mascara = "255.255.$terceiro.0";

            return $mascara;
        }else{
            $bits = 32 - $decimal;
            $numero = pow(2,$bits);
            $quarta = 256 - $numero;
            $mascara = "255.255.255.$quarta";

            return $mascara;
        }
    }

    public function classeIP($ip1){
        if ($ip1 < 128){
            $classe = "Classe A";
            return $classe;
        }elseif ($ip1 >= 128 AND $ip1 < 192){
            $classe = "Classe B";
            return $classe;
        }elseif ($ip1 >= 192 AND $ip1 < 224){
            $classe = "Classe C";
            return $classe;
        }elseif ($ip1 >= 224 AND $ip1 < 240){
            $classe = "Classe D";
            return $classe;
        }else{
            $classe = "Classe E";
            return $classe;
        }
    }

    public function privadoOuPublico($ip1,$ip2)
    {
        $exemplo1 = $ip1 . '.' . $ip2;
        $exemplo2 = $ip1 . '.' . $ip2;
        if ($ip1 == 10) {
            $resultado = "Privado";
            return $resultado;
        } elseif ($ip1 == 127) {
            $resultado = "Reservado/Privado";
            return $resultado;
        } elseif ($exemplo1 == 172.16) {
            $resultado = "Privado";
            return $resultado;
        } elseif ($exemplo2 == 192.168) {
            $resultado = "Privado";
            return $resultado;
        } elseif ($exemplo2 == 169.254) {
            $resultado = "ZeroConf/Privado";
            return $resultado;
        }else{
            $resultado = "Público";
            return $resultado;
        }
    }
    public function primeiroenderecoderede($numerodeRedes,$ip4){
        $ondeta = (int)($ip4 / $numerodeRedes);
        $primeiro = $ondeta * $numerodeRedes;

        return $primeiro;
    }
    public function ultimoenderecorede($numerodeRedes,$ip4){
        $ondeta = (int)($ip4 / $numerodeRedes);
        $ultimo = ($ondeta * $numerodeRedes) + $numerodeRedes;
        return $ultimo;
    }
    public function primeiroIpValido($numerodeRedes,$ip4){
        $ondeta = (int)($ip4 / $numerodeRedes);
        $primeiro = ($ondeta * $numerodeRedes) + 1;

        return $primeiro;
    }
    public function ultimoIpValido($numerodeRedes,$ip4){
        $ondeta = (int)($ip4 / $numerodeRedes);
        $calculo = ($ondeta * $numerodeRedes) + $numerodeRedes;
        $ultimo = $calculo - 1;
        return $ultimo;
    }

}