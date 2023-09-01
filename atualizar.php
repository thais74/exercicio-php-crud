<?php

require_once "src/funcoes-alunos.php";
require_once "src/funcoes-utilitarias.php";
require_once "src/conecta.php";

$alunos = lerAlunos($conexao);

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$alunos = lerUmAluno($conexao, $id);

if (isset($_POST['atualizar-dados'])){
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    
    $primeira = filter_input(INPUT_POST, "primeira", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    $segunda = filter_input(INPUT_POST, "segunda", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    atualizarAluno(
        $conexao, $id, $nome, $primeira, $segunda);

    header("location:visualizar.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Atualizar dados do aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para atualizar os dados do aluno.</p>

    <form action="#" method="post">
        
	    <p><label for="nome">Nome:</label>
	    <input type="text" value="<?=$alunos['nome']?>" name="nome" id="nome"  required></p>
        
        <p><label for="primeira">Primeira nota:</label>
	    <input name="primeira" type="number" value="<?=$alunos['primeira']?>" id="primeira" step="0.01" min="0.00" max="10.00" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input name="segunda" type="number" value="<?=$alunos['segunda']?>" id="segunda" step="0.01" min="0.00" max="10.00" required></p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição.
        Usado apenas para exibição do valor da média -->
            <label for="media">Média:</label>
            <input name="media" type="number" value="<?=contarMedia($alunos['primeira'], $alunos['segunda'])?>" id="media" step="0.01" min="0.00" max="10.00" readonly disabled>
        </p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição 
        Usado apenas para exibição do texto da situação -->
            <label for="situacao">Situação:</label>
	        <input type="text" value="<?=verificaSituacao($alunos['primeira'], $alunos['segunda'])?>" name="situacao" id="situacao" readonly disabled>
        </p>
	    
        <button type="submit" name="atualizar-dados">Atualizar dados do aluno</button>
	</form>    
    
    <hr>
    <p><a href="visualizar.php">Voltar à lista de alunos</a></p>

</div>


</body>
</html>