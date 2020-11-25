<?php ob_start();?>
<form method="GET">


<input type="text" name="id" value="<?php if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty( $_GET['id']) ){
echo $_GET['id'];
} ?>">
<input type="date" name="date" value="<?php if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty( $_GET['id']) ){
echo $_GET['date'];
} ?>">
<input type="number" name="floor" value="<?php if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty( $_GET['id']) ){
echo $_GET['floor'];
} ?>">
<input type="text" name="type" value="<?php if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty( $_GET['id']) ){
echo $_GET['type'];
} ?>">
<input type="submit" name='action' value="valider"> <!-- ?action=valider -->

</form>

<?php
$content =  ob_get_clean();
require_once 'views/template.php'; ?>