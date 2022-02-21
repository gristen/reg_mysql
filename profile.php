<?php
session_start();
$title = 'Профиль';
require ('head.php');



?>



<body>
    <h1>рег</h1>
<span><?= $_SESSION['id'] ?></span>
<p><?php $_SESSION['name'] 


  ?></p>
<nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link text-danger border border-danger" href="/vendor/logaut.php">Выход</a>
  </nav>
 


</body>
