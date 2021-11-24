<h2>A lekérdezések a következő napra vonatkoznak: <b><?php echo $viewData['nap']?></b></h2>
<div class="container">
    <canvas id="myChart"></canvas>
</div>


<script>
    let myChart = document.getElementById('myChart').getContext('2d');

    let massPopChart = new Chart(myChart, {
        type: 'bar',
        data: {
            labels: [<?= $viewData['penznemek'] ?>],
            datasets: [{
                label: 'Árfolyam (Ft)',
                data: [<?= $viewData['osszegek']?>],
                backgroundColor: '#96b0bc'
            }]
        },
        options:  {
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 18
                        }
                    }
                }
            }
        }

    });
</script>