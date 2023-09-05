<!-- visualizar.php -->

<?php

require_once "src/funcoes-alunos.php";
require_once "src/funcoes-utilitarias.php";

$listaDeAlunos = lerAlunos($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-...">

<style>
    * { box-sizing: border-box; }

    table {
  border: 1px solid;
  width: 60%;
  text-align: center;
}   

td, th{
    border-bottom: 1px solid ;
}
th {
  height: 70px;
}


</style>

</head>
<body>
<div class="container">
    <br>
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->

<table>
    <thead>
        <tr>
            <th>Nome do Aluno:  </th>
            <th>1º Nota:  </th>
            <th>2º Nota:  </th>
            <th>Média:  </th>
            <th>Situação: </th>
            <th>Opções </th>
        </tr>
    </thead>
    <?php foreach ($listaDeAlunos as $aluno) { ?>
    <?php $media = contarMedia($aluno["primeira"],$aluno["segunda"]); ?>
<tr >

    <td><b><?= $aluno["nome"] ?></b></td>
    <td><?= formatarNota($aluno['primeira']) ?></td>
    <td><?= formatarNota($aluno['segunda']) ?></td>
    <td><?= formatarNota(contarMedia($aluno['primeira'], $aluno['segunda'])) ?></td>
    <td 
    
    <?php if(verificaSituacao($media) == "Aprovado"){
            echo " class='aprovado'";
            } elseif(verificaSituacao($media) == "Reprovado"){
            echo "class='reprovado'";
            } else{
            echo "class='recuperacao'";
        }
    ?>> 
    
    <?= verificaSituacao($media)?> </td>
    <td>
        <a href="atualizar.php?id=<?= $aluno["id"] ?>">Editar</a>
        <a class="excluir" href="excluir.php?id=<?= $aluno["id"] ?>">Excluir</a>
    </td>
</tr>

<?php } ?>

 
</table>

    <p><a href="index.php">Voltar ao início</a></p>
</div>

<script src="js/exclusao.js"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>


</body>
</html>