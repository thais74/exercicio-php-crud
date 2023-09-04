// media.js

function calculateMedia(primeira,segunda) {

    return (primeira + segunda) / 2;
};

function determineSituacao(media){
  
    let situacao = "";
    if (media >= 7) {
        situacao = 'Aprovado';
    } else if (media >= 5) {
        situacao = 'Recuperação';
    } else {
        situacao = 'Reprovado';
    }
    return situacao;
};
function AtualizarMediaSituacao(){

    const primeira = parseFloat(document.getElementById('primeira').value ) || 0;
    const segunda = parseFloat(document.getElementById('segunda').value ) || 0;
    const media = calculateMedia(primeira, segunda);
    const situacao = determineSituacao(media);

    document.getElementById('media').value = media.toFixed(2);
    document.getElementById('situacao').value = situacao;
};
    
document.getElementById('primeira').addEventListener('input', AtualizarMediaSituacao);
document.getElementById('segunda').addEventListener('input', AtualizarMediaSituacao );

AtualizarMediaSituacao();