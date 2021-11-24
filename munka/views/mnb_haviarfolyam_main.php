<h2>Kérem válasszon egy hónapot és egy devizát.</h2>
<form action="" method="POST">
    <div class="row">
        <div class="column">
            <label for="deviza">Válasszon egy devizát:</label><br>
            <label for="honap">Válasszon egy hónapot:</label>
        </div>
        <div class="column">
            <select id="deviza" name="deviza">
                <?php echo $viewData['devizak']?>
            </select><br>
            <input type="month" id="honap" name="honap" min="<?php echo $viewData['FirstMonth']?>" value="<?php echo $viewData['LastMonth'] ?>"><br>
            <input type="submit" value="Keresés">
        </div>
    </div>
</form>
<?php if(isset($_POST['honap']) && isset($_POST['deviza'])) : ?>
    <h2>A <?php echo $_POST['deviza']?> devizapár <?php echo $_POST['honap']?>. hónapban lévő alakulása:</h2>
    <div>
        <div class="container">
            <canvas class="container" id="myChart"></canvas>
        </div>
        <div class="table">
            <table class="styled-table">
            <tr>
                <th>Dátum</th>
                <th>Árfolyam</th>
            </tr>
            <?php for($i = 0; $i < count($viewData['napok_tbl']); $i++) : ?>
            <tr>
                <td><?= $viewData['napok_tbl'][$i] ?></td>
                <td><?= $viewData['arak_tbl'][$i] ?></td>
            </tr>
            <?php endfor; ?>
            </table>
        </div>
    <div>
<script>
    let myChart = document.getElementById('myChart').getContext('2d');

    let massPopChart = new Chart(myChart, {
        type: 'bar',
        data: {
            labels: [<?= $viewData['datelist']?>],
            datasets: [{
                label: 'Árfolyam',
                data: [<?= $viewData['arfolyamok']?>],
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
        },
        tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
                title: function(i, val) {
                    return attributeLabels[data.labels.type] +': '+ i[0].xLabel;
                },  
            },
        },

    });
</script>
<?php endif; ?>