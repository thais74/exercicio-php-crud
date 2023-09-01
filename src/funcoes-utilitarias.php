<?php
function contarMedia(int $nota1, $nota2){
    $media = ($nota1 + $nota2) /2;
    return $media;
}

function formatarNota(float $valor):string {
    $valorFormatado = number_format($valor, 2, ',', '.');
    return $valorFormatado;
}

function verificaSituacao($nota1, $nota2){
    $situacao = ($nota1 + $nota2) / 2;
    if ($situacao >= 7){
        return "Aprovado!";
    } elseif($situacao >= 5){
        return "Em recuperação!";
    } else {
        return "Reprovado!";
    }
}

?>
