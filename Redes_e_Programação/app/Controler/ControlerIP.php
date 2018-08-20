<?php


require "../Model/IPCrud.php";
if (isset($_GET['acao'])){
    $action = $_GET['acao'];
}else{
    $action = 'index';
}

    switch ($action){
        case 'index':

            include "../View/index.php";

            break;

        case 'resposta':

            $ip1 = $_POST['ip1'];
            $ip2 = $_POST['ip2'];
            $ip3 = $_POST['ip3'];
            $ip4 = $_POST['ip4'];
            $decimal = $_POST['mascara'];

            $ip = "$ip1".'.'."$ip2".'.'."$ip3".'.'."$ip4";
            $teste = new IP($ip,$decimal);
            $crud = new IPCrud();
            $numeroRedes = $crud->hostsEmCadaRede($decimal);
            $subredes = $crud->subredes($numeroRedes);
            $mascara = $crud->mascara($decimal);
            $classe = $crud->classeIP($ip1);
            $publicoOuPrivado = $crud->privadoOuPublico($ip1,$ip2);
            $primeiro = $crud->primeiroenderecoderede($numeroRedes,$ip4);
            $ultimo = $crud->ultimoenderecorede($numeroRedes,$ip4);
            $host = $crud->primeiroIpValido($numeroRedes,$ip4);
            $broadcast = $crud->ultimoIpValido($numeroRedes,$ip4);

           echo"IP: $ip/$decimal, <br>
            Mascara: $mascara, <br>
            A quantidade de sub-redes:$subredes,  <br>
            A quantidade de endereços por sub-rede; $numeroRedes, <br>
            A quantidade de endereços de hosts em cada sub-rede: , <br>
            Endereco de ip informado: $primeiro, <br>
            Host de ip informado: $ultimo, <br>
            Primeiro ip valido: $host, <br>
            Ultimo ip valido: $broadcast, <br>
            Mascara em decimal: $decimal, <br>
            Classe: $classe, <br>
            Publico ou Privado: $publicoOuPrivado. <br>;

            break;
    }
?>