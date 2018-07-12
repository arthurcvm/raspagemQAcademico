<?php
    include 'raspaKeys.php';
    $keys = getKeys();
    echo $keys[0];
//    $login = $_POST['form_params'];
//    echo $login;
?>

<html>
    <head>
        <script src="https://qacademico.ifce.edu.br/qacademico/lib/rsa/RSA.js"></script>
        <script src="https://qacademico.ifce.edu.br/qacademico/lib/rsa/BigInt.js"></script>
        <script src="https://qacademico.ifce.edu.br/qacademico/lib/rsa/Barrett.js"></script>
        <script>
            function Encriptar_Campo(objCampo_Origem,objForm_Destino) {
                window.alert(objCampo_Origem);
                var novo_campo = parent.document.createElement('input');
                novo_campo.type='hidden';
                novo_campo.name=objCampo_Origem.name;
                novo_campo.value = encryptedString(key, objCampo_Origem.value);
                objForm_Destino.appendChild(novo_campo);
            }
        </script>
        <script>
            function Encriptar_Enviar2() {
                var novo_form = parent.document.createElement('form');
                novo_form.method = 'POST';
                novo_form.action = 'https://qacademico.ifce.edu.br/qacademico/lib/validalogin.asp';
                
                var submit_campo = parent.document.createElement('input');
                submit_campo.type='hidden';
                submit_campo.name='Submit';
                submit_campo.value = encryptedString(key, 'OK');
                novo_form.appendChild(submit_campo);
                
                var login_campo = parent.document.createElement('input');
                login_campo.type='hidden';
                login_campo.name='LOGIN';
                login_campo.value = encryptedString(key, 'loginHere');
                novo_form.appendChild(login_campo);
                
                var senha_campo = parent.document.createElement('input');
                senha_campo.type='hidden';
                senha_campo.name='SENHA';
                senha_campo.value = encryptedString(key, 'senhaHere');
                novo_form.appendChild(senha_campo);
                
                var tipo_campo = parent.document.createElement('input');
                tipo_campo.type='hidden';
                tipo_campo.name='TIPO_USU';
                tipo_campo.value = encryptedString(key, '1');
                novo_form.appendChild(tipo_campo);
                
                
//                for (var i=0; i!=parent.frmLogin.length;i++) { 
//                    Encriptar_Campo(parent.frmLogin[i],novo_form);
//                }
                
                window.alert(novo_form);
                parent.document.body.appendChild(novo_form);
                novo_form.submit();
            }
            setMaxDigits(19);
            var key = new RSAKeyPair(
                "<?= $keys[0]; ?>",
                "",
                "<?= $keys[1]; ?>"
          );
            Encriptar_Enviar2();
                </script>
    </head>
    <body></body>
</html>