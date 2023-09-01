<?php 
require_once "conecta.php";

function lerAlunos( PDO $conexao):array {
    $sql = "SELECT * FROM alunos ORDER BY nome";
    
    try {
        /* Método prepare(): 
        Faz uma preparação/pré-config do comando SQL e
        guarda em memória (variável consulta). */
        $consulta = $conexao->prepare($sql);

        /* Método execute():
        Executa o comando SQL no banco de dados */
        $consulta->execute();

        /* Método fetchAll()
        Busca todos os dados da consulta como um array
        associativo. */
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }    

    return $resultado;

}

function inserirAluno(PDO $conexao, string $nome,  string $primeira, string $segunda):void{
    $sql = "INSERT INTO alunos (
        nome, primeira, segunda
    ) VALUES (
        :nome, :primeira, :segunda
    ) ";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nome, PDO:: PARAM_STR);

        /* no PDO, ao trabalhar com valores "quebrados" para os parâmetros nomeados, você deve
        usar a forma constante PARAM_STR. No momento, não há outra forma do PDO de lidar com valores deste 
        tipo devido aos diferentes tipos de dados que cada banco de dados suporta.  */
        $consulta->bindValue(":primeira", $primeira, PDO::PARAM_STR);

        $consulta->bindValue(":segunda", $segunda, PDO::PARAM_STR);
        $consulta->execute();

    }catch(Exception $erro){
        die("Erro ao inserir: ".$erro->getMessage());
    }
}

function excluirAluno(PDO $conexao, int $id):void{
    $sql = "DELETE FROM alunos WHERE id = :id";

    try{
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch(Exception $erro){
        die("Erro ao excluir: ".$erro->getMessage());
    }
}


function lerUmAluno(PDO $conexao, int $idAluno):array{
    $sql = "SELECT * FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $idAluno, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar: ".$erro->getMessage());
    }

    return $resultado;
}

function atualizarAluno(PDO $conexao, int $idAlunos, string $nome, string $primeira, string $segunda):void{
    $sql = "UPDATE alunos 
    SET nome = :nome, 
        primeira = :primeira, 
        segunda = :segunda
    WHERE id= :id";
    
    try{
        $consulta = $conexao->prepare($sql);
        
        $consulta->bindValue(":id", $idAlunos, PDO::PARAM_INT); 
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);   
        $consulta->bindValue(":primeira", $primeira, PDO::PARAM_STR);   
        $consulta->bindValue(":segunda", $segunda, PDO::PARAM_STR); 

        $consulta->execute();
    }catch (Exception $erro) {
        die("Erro ao atualizar: ".$erro->getMessage());
    }
}

?>
