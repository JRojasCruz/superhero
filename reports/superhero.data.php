<h1 class="text-md text-center">SuperHero Report</h1>
<table class="table table-border mt-3">
  <colgroup>
    <col style='width: 10%'>
    <col style='width:20%'>
    <col style='width:10%'>
    <col style='width:10%'>
    <col style='width:20%'>
    <col style='width:10%'>
    <col style='width:10%'>
    <col style='width:10%'>
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>Full Name</th>
      <th>Gender</th>
      <th>Race</th>
      <th>Publisher</th>
      <th>Faction</th>
      <th>Height</th>
      <th>Weight</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($datos as $registro): ?>
        <tr>
          <td><?=$registro['id']?></td>
          <td><?=$registro['full_name']?></td>
          <td><?=$registro['gender']?></td>
          <td><?=$registro['race']?></td>
          <td><?=$registro['publisher_name']?></td>
          <td><?=$registro['alignment']?></td>
          <td><?=$registro['height_cm']?></td>
          <td><?=$registro['weight_kg']?></td>
        </tr>
      <?php endforeach; ?>
  </tbody>
</table>