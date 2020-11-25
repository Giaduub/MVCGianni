<?php ob_start();?>

<table class="table table-dark">
            <!-- entete du tableau -->
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Etage</th>
                    <th scope="col">Intervention</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <!-- corps du tableau -->
            <tbody>
                <!-- On crée la requête qui nous permet de récupérer toutes les interventions -->
                <?php

        foreach($listing as $ligne){
            echo "<tr scope='row'>";
                echo "<td><b>".$ligne['id']."</b></td>";
                echo "<td>".$ligne['date']."</td>";
                echo "<td>".$ligne['floor']."</td>";
                echo "<td>".$ligne['type']."</td>";
                echo "<td><button><a href='?action=modifier&id=".$ligne['id']."&date=".$ligne['date']."&floor=".$ligne['floor']."&type=".$ligne['type']."'>modifier</a></button> - <button><a href='?action=supprimer&id=".$ligne['id']."'>Supprimer</a></button></td>";
            echo "</tr>";

        }

         ?>

            </tbody>
        </table>


        <?php 
        
        $content =  ob_get_clean();
        require_once 'Views/template.php'; ?>