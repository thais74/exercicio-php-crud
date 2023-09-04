<!-- funcoes-utilitarias.php -->
<?php
function contarMedia(int $nota1, $nota2){
    $media = ($nota1 + $nota2) /2;
    return $media;
}

function formatarNota(float $valor):string {
    $valorFormatado = number_format($valor, 2, ',', '.');
    return $valorFormatado;
}

function verificaSituacao(float $media):string{
    if($media <= 5){
        $situacao = "Reprovado";
    } elseif($media <= 7){
        $situacao = "Recuperação";
    } else{
       $situacao = "Aprovado";
    }
    return $situacao;
}

?>