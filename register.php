<?php
if(!$_POST['phone']){
    ?>
    <script>
        alert('Por favor, insira os dados');
        window.location.replace('index.php');
    </script>
    <?php
}else{
    $nome = $_POST['first_name'];
    $sobrenome = $_POST['last_name'];
    $telefone = $_POST['phone'];

    $banco = new banco();
    $banco->escreve($nome, $sobrenome, $telefone);
}

class banco {
    public function escreve($nome, $sobrenome, $telefone){
        $query = "INSERT INTO registros (nome, sobrenome, telefone, confirmado) VALUES ('$nome', '$sobrenome', '$telefone')";
        require_once ('db.php');
        $db = new db();
        $result = mysqli_query($db, $query);
        if($result){
            header('Location: thanks.php');
        }
}
}