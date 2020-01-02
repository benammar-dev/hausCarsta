<!DOCTYPE html>
<html lang="de">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/0d23544b65.js"></script>

   <link rel="stylesheet" type="text/css" href="/css/main.css">
   <title>Haus Carsta</title>
</head>
<body id="mailsenden" name="top">
    
    <div class="col-xs-12 content">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- hidden mobile menu  -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Haus Carsta</a>
                    </div>
                
                    <!-- main menu  -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.html">Startseite<span class="sr-only">(current)</span></a></li>
                            <li class="dropdown"> 
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Wohnungen <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Wohnung 1 EG RE</a></li>
                                    <li><a href="#">Wohnung 5 EG LI</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Wohnung 2 OG RE</a></li>
                                    <li><a href="#">Wohnung 3 OG LI</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Wohnung 4 Anbau</a></li>
                                    </ul>
                            </li>
                            <li><a href="belegungskalender.html">Belegungskalender</a></li>
                            <li><a  href="preise.html">Preise</a></li>
                            <li class="active"><a href="kontakt.php">Kontakt</a></li>
                            <li><a href="impressum.html">Impressum</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</body>
<!--   jquery    -->
<script 
    src="https://code.jquery.com/jquery-1.12.4.min.js" 
    integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous">
</script>

<script 
    src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
</script>

</html>
<?php

    // Sendet Mails
    // überprüft ob die felder leer sind und übergibt die Daten in die Variable
    if($_POST['name']!="" and $_POST['email']!="" and $_POST['betreff']!="" and $_POST['nachricht']!="") {

        // name des Absenders
        $name = $_POST['name'];
        // Betreff
        $betreff = $_POST['betreff'];
        // Absender (Mailadresse)
        $absender = $_POST['email'];
        // eMailnachricht
        $nachricht = $_POST['nachricht'];

        $empfaenger = "fam.benammar@web.de";
        // Headers
        $headers = "Von: ".$name. "\n\n";
        $headers = "Antworden: ".$absender. "\n\n";

        mail($empfaenger, $betreff, $nachricht, $headers );

        // Bestätigungsnachricht
        echo "
        <div style='border:solid #ddd 2px; max-width:500px; height:150px; margin:0 auto; background:#fff; text-align:center; margin-top:100px; display:flex; justify-content:center; border-radius:5px; transform: translateY(100%);'><p style='align-self:center;'>Vielen Dank für Ihre Anfrage. <br/>Wir melden uns so bald wie möglich bei Ihnen.<br/><br/>Mit freundlichen Grüßen<br/>Annja & Sven Liphardt</p>
        
        </div>";


    }else {
        // Fehlermeldung
        echo "Sorry, hier ist was schief gelaufen. Bitte versuchen Sie es zu einem späteren Zeitpunkt noch mal.";
    }  
?>

