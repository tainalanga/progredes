<!doctype html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <title>CalculadoraIP</title>

    <script>
        $(document).ready(function(){
            $(".surpresa2").hide();
             $('#botao').click(function () {
                  ip1 = $('#primeiroip').val();
                  ip2 = $('#segundoip').val();
                  ip3 = $('#terceiroip').val();
                  ip4 = $('#quartoip').val();
                  mascara = $('#mascara').val();
                      $.post("ControlerIP.php?acao=resposta", {ip1 : ip1, ip2: ip2, ip3: ip3, ip4: ip4 , 'mascara': mascara}, function (result) {

                          $('#resposta').html(result);
                 })
             })
        });

    </script>

</head>
<body style="text-align: center">
            <div class="form">
                <h4>Calculadora De IP</h4>
                <input class="ip" type="number" id="primeiroip" name="ip1" placeholder="***" required>.
                <input class="ip" type="number" id="segundoip" name="ip2" placeholder="***" required>.
                <input class="ip" type="number" id="terceiroip" name="ip3" placeholder="***" required>.
                <input class="ip" type="number" id="quartoip" name="ip4" placeholder="***" required> /
                <input class="ip" type="text" id="mascara" name="mascara" placeholder="**" required>
                <input type="submit" id="botao">
            </div>
            <div id="resposta">

            </div>

<h4>Alunas: Elisa Laufer e Tainá Langa</h4>
</body>
</html>