let graficoAtual = null;

function buscarAluno() {
  const nome = document.getElementById('nomeAluno').value;

  fetch(`../scripts/buscarAluno.php?nome=${encodeURIComponent(nome)}`)
    .then(response => {
    if (!response.ok) throw new Error('Arquivo não encontrado ou erro no servidor');
    return response.json();
  })
  .then(json => {
    if (!json.id) {
      alert('Aluno não encontrado');
      return;
    }
    carregarGrafico(json.id);
  })
  .catch(err => {
    console.error(err);
    alert('Erro: ' + err.message);
  });
}

function carregarGrafico(idAluno) {
  fetch(`../scripts/dados.php?id=${idAluno}`)
    .then(res => res.json())
    .then(json => {
      const ctx = document.getElementById('graficoNotas').getContext('2d');

      // Destroi gráfico antigo se existir
      if (graficoAtual) graficoAtual.destroy();

      graficoAtual = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: json.labels,
          datasets: [{
            label: 'Notas do Aluno',
            data: json.data,
            backgroundColor: '#3498db',
            borderColor: '#2980b9',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true,
              max: 10
            }
          }
        }
      });
    });
}
