<!-- Ici on retrouvera tous les éléments communs aux views //CSS //Navigation //Header //Footer -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La boite à outils du concierge</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?action=add">Ajouter</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="?action=newtask">En Attente <span class="sr-only">(current)</span></a>
      </li>
     
    </ul>
 
  </div>
</nav>
<div class="container">
<form class="form-inline">
   
    <input type="date" name="date" class="form-control">
    <select name="etage"  class="form-control">
     <option value="" disabled selected>Etage</option>
        <?php
              $step = new Tasks;
              $steps = $step->listOfStep();
              foreach ($steps as $step){
                  echo "<option value='".$step['floor']."'>".$step['floor']."</option>";
              }
        ?>
    </select>
    <input class="form-control mr-sm-2" type="search" placeholder="Intervention" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Rechercher</button>
  </form>
  </div>

    <div class="container">
       
        <?php echo $content; ?>

    </div>
</body>
</html>