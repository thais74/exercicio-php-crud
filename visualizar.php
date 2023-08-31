<?php

require_once "src/funcoes-alunos.php";
$listaDeAlunos = lerAlunos($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
<style>
    * { box-sizing: border-box; }
    .alunos {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        width: 80%;
        margin: auto;

    }
    .aluno {
            font-family: 'SEGOE UI';
            background-color: pink;
            padding: 1rem;
            width: 49%;
            box-shadow: black 3px 3px;
        }

    

</style>
</head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->
    <div class = "alunos" >
        <?php foreach($listaDeAlunos as $aluno) { ?>
            <article class="aluno">
               <tr>
                 <h3><b>Nome do Aluno: </b> <?=$aluno["nome"]?> </h3> 
                 <p><b>Id: </b> <?=$aluno["id"]?>  </p>
                 <p><b>Primeira Nota: </b> <?=$aluno['primeira']?></p>
                 <p><b>Segunda Nota: </b> <?=$aluno['segunda']?></p>
                 <p><b>Média: <?=$aluno['primeira'] + $aluno['segunda'] / 2?></b></p>
                 <p><b>Situação: </b></p>
                 <h4></h4>
                 <td>
                    
        <a href="atualizar.php?id=<?=$aluno["id"]?>">Editar</a>

                 <a class="excluir" href="excluir.php?id=<?=$aluno["id"]?>">Excluir</a>
                    </td>
                </tr> 
            </article>
                    
        <?php } ?>
    </div>
    

    <p><a href="index.php">Voltar ao início</a></p>
</div>

<script src="js/exclusao.js"></script>

</body>
</html>