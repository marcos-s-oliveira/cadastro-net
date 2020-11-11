
<?php

if(isset($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $cpf = addslashes($_POST['cpf']);
    $rua = addslashes($_POST['rua']);
    $numero = addslashes($_POST['numero']);
    $referencia = addslashes($_POST['referencia']);
    $bairro = addslashes($_POST['bairro']);
    $phone = addslashes($_POST['phone']);
    $plan = addslashes($_POST['plan']);
    $pay = addslashes($_POST['pay']);
    $vencimento = addslashes($_POST['vencimento']);
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    
    $query = "  INSERT INTO pre_cadastro(plano, nome, cpf, telefone, rua, numero, bairro, referencia, email, secret, vencimento, pay)
    VALUES ('$plan', '$nome', '$cpf', '$phone', '$rua', '$numero', '$bairro', '$referencia', '$email', '$senha', '$vencimento', '$pay')";
    require_once ('db.php');
    $db = new db();
    $result = mysqli_query($db->link, $query);
    if(!$result){
        die($query);
    }
}
$query = "SELECT id FROM pre_cadastro ORDER BY id DESC LIMIT 1";
require_once ('db.php');
$db = new db();
$result = mysqli_query($db->link, $query);
$oid = mysqli_fetch_assoc($result);

$num = $oid['id']+1;
if($num >= 100){
    $cond = "Não entrou";
}else{
    $cond = "Entrou";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Pré cadastro Cliente - Prisma Net</title>
    <link rel="icon" href="img/icone.png">
    <!-- Icons font CSS-->

    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>

    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <img src="img/bg-site.png" width="100%" style="position: fixed; opacity: 5%">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <center>
                        <img src="img/logo-inv.png" width="50%">

                        <h4 class="title">Pré Cadstro de Cliente</h4>
                    </center>
                    <form action="" method="POST">

                            <div class="input-group">
                                <label class="label">Nome</label>
                                <input class="input--style-4" type="text" name="nome" placeholder="Seu Nome Completo">
                            </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">CPF</label>
                                    <input class="input--style-4" type="number" name="cpf" placeholder="Apenas Números">
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Endereço</label>
                            <input class="input--style-4" type="text" name="rua" placeholder="Nome da Rua ou Avenida">
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Número</label>
                                    <input class="input--style-4" type="number" name="numero" placeholder="Número">
                                </div>
                            </div></div>
                        <div class="input-group">
                            <label class="label">Ponto de Referência</label>
                            <input class="input--style-4" type="text" name="referencia" placeholder="Nos Ajuda a Encontrar Você">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Bairro</label>
                                    <input class="input--style-4" type="text" name="bairro" placeholder="Ex.: Centro">
                                </div>
                                <div class="input-group">
                                    <label class="label">Cidade</label>
                                    <input class="input--style-4" type="text" name="cidade" value="Costa Rica-MS" disabled>
                                </div>
                                <div class="input-group">
                                    <label class="label">Telefone</label>
                                    <input class="input--style-4" type="number" name="phone" placeholder="998765432">
                                </div>
                                <label class="label">Plano</label>
                                <select class="input--style-4" type="select" name="plan">
                                    <option value="1">2Mb/s R$ 99,90 Mensal</option>
                                    <option value="2">5Mb/s R$ 130,00 Mensal</option>
                                    <option value="3">10Mb/s R$ 180,00 Mensal</option>
                                </select>
                                    <label class="label">Forma de Pagamento</label>
                                    <select class="input--style-4" type="select" name="pay">
                                        <option value="1">Boleto</option>
                                        <option value="2">Cartão de Crédito</option>
                                        <option value="3">Depósito</option>
                                    </select>
                                <div class="input-group">
                                    <label class="label">Data de Vencimento</label>
                                    <select class="input--style-4" name="vencimento">
                                        <option value="1">1 de cada mês</option>
                                        <option value="5">5 de cada mês</option>
                                        <option value="10">10 de cada mês</option>
                                    </select>
                                </div>
                            </div>
                            <p class="title" style="font-size: 12px !important;">Você é o cliente de Número <b><?php echo $num; ?></b>. Você <b><?php echo $cond?></b> Na promoção de Inauguração.</p>

                        </div>
                        <hr>
                        <h2 class="title"> Dados de Acesso - Área do Cliente </h2>
                        <div class="row row-space">

                            <div class="col-4">

                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" placeholder="Seu e-Mail será Seu login">
                                </div>
                                <div class="input-group">
                                    <label class="label">Senha</label>
                                    <input class="input--style-4" type="password" name="senha">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->