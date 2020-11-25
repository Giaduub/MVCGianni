<?php ob_start();?>
<form method="GET">
            <input type="date" name="date">
            <input type="number" name="floor">
            <input type="text" name="type">
            <input type="submit" name='action' value="ajouter"> <!-- ?action=ajouter -->

        </form>

        <?php
 $content =  ob_get_clean();
 require_once 'Views/template.php'; ?>