<h2>Az éves összes szállítás:</h2>
<table class="styled-table2">
  <tr>
    <th>datum</th>
    <th>igeny</th>
    <th>mennyiseg</th>
    <th>tipus</th>
    <th>jelentes</th>
  </tr>
  <?php foreach($viewData['jelentkezesek']->jelentkezesek as $jel): ?>
  <tr>
    <td><?= $jel['datum']; ?></td>
    <td><?= $jel['igeny']; ?></td>
    <td><?= $jel['mennyiseg']; ?></td>
    <td><?= $jel['tipus']; ?></td>
    <td><?= $jel['jelentes']; ?></td>
  </tr>
  <?php endforeach; ?>
</table>