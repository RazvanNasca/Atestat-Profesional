<?php
    session_start();
    include ("module/modul-conectare.php");
    include ("module/modul-functii.php");
    include ("module/modul-setari.php");
    $pagina = 'home';
    if (isset($_GET['pagina']))
        $pagina = $_GET['pagina'];
?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?=$app_name . " - " . $page_titles[$pagina]?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
       <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #8047c1;">
            <a class="navbar-brand" href="./?pagina=home">Acasă <i class="fa fa-home"></i></a> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?=$pagina == "index"?"active":""?>">
                        <a class="nav-link" href="./?pagina=index">Listă produse <i class="fa fa-th-list"></i> </a>
                    </li>
                    <li class="nav-item <?=$pagina == "cautare"?"active":""?>">
                        <a class="nav-link" href="./?pagina=cautare"> Căutare <i class="fa fa-search"></i> </a>
                    </li>
                    <li class="nav-item <?=$pagina == "afisare"?"active":""?>">
                        <a class="nav-link" href="./?pagina=afisare">Filtrare <i class="fa fa-filter"></i></a>
                    </li>
                    <?php
                    if ( esteAdmin(login()) )
                    {
                    ?>
                        <li class="nav-item <?=$pagina == "adaugare"?"active":""?>">
                            <a class="nav-link" href="./?pagina=adaugare">Adăugare produs <i class="fa fa-upload"></i></a>
                        </li>
                        <li class="nav-item <?=$pagina == "anulare"?"active":""?>">
                            <a class="nav-link" href="./?pagina=anulare">Ștergere produs <i class="fa fa-eraser"></i></a>
                        </li>
                    <?php
                    }
                    
                        if( login() === false )
                        {
                            
                            ?>
                            <li class="nav-item <?=$pagina == "autentificare"?"active":""?>">
                                <a class="nav-link" href="./?pagina=autentificare">Autentificare <i class="fa fa-sign-in"></i></a>
                            </li>
                             <!--<li class="nav-item <?=$pagina == "inregistrare"?"active":""?>">
                                <a class="nav-link" href="./?pagina=inregistrare">Inregistrare</a>
                            </li>-->
                            <?php 
                        }
                        else
                        {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Deconectare <i class="fa fa-sign-out"></i></a>
                            </li>
                            <?php
                        }
                    ?>
                    <li class="nav-item <?=$pagina == "contact"?"active":""?>">
                            <a class="nav-link" href="./?pagina=contact">Contact <i class="fa fa-phone"></i></a>
                        </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <?php
        
            AfisareAlerta();
        
            $nf = "pagini/pagina-{$pagina}.php";
            if (file_exists($nf))
                include $nf;
            else
            {
                print("Boo-hoo-hoo!");
                ?><img src="https://destepti.ro/wp-content/uploads/2014/04/Bufnita.jpg" height="auto" width="600"><?php 
            }
            
            if(login())
            {
                print "Autentificat ca: " . username(login());
            }
            if($pagina == 'index')
            {
                include "module/modul-comentarii.php";
            }
        ?>
    </div>
</body>
</html>
        