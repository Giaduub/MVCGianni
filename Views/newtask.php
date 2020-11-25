<?php ob_start();?>

<table class="table table-dark  ml-1 col-5 justify-align-center">
  <thead>
    <tr>
       <th></th>
      <th scope="col">Date</th>
      <th scope="col">Type</th>
      <th scope="col">Etage</th>
      <th></th>
      <th></th> 
      <th></th>
    </tr>
  </thead>
  <tbody>
 
<?php foreach($show as $task): ?>
   <form method="GET"> <tr>
    <td><input type="hidden" name="id" value="<?= $task['id']?>"></td>
      <td><?= $task['date']?></td>
      <input type="hidden" name="date" value="<?= $task['date']?>"></td>
      <td><?= $task['type']?></td>
      <input type="hidden" name="type" value="<?= $task['type']?>"></td>
      <td><?= $task['floor']?></td>
      <input type="hidden" name="etage" value="<?= $task['floor']?>"></td>
      
      <td><button type="submit" name="action">Valider</button></td>
    </tr>
  </tbody></form>

  <?php endforeach; ?>
</table>


<?php $content =  ob_get_clean();
require_once 'views/template.php'?>