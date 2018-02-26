<?PHP
//starta sessionen
date_default_timezone_set('Europe/Stockholm');
session_start();

    $email          = "";
    $firstname      = "";
    $lastname       = "";
    $street         = "";
    $zip            = "";
    $town           = "";
    $order          = "";

    $orderConfirmed = "";

    if($_POST) {
        //Crappy trim
        $email         = trim($_POST["email"]);
        $firstname     = trim($_POST["firstname"]);
        $lastname      = trim($_POST["lastname"]);
        $street        = trim($_POST["street"]);
        $zip           = trim($_POST["zip"]);
        $town          = trim($_POST["town"]);
        $order         = trim($_POST["order"]);
        //Crappy html
        $email         = htmlspecialchars($_POST["email"]);
        $firstname     = htmlspecialchars($_POST["firstname"]);
        $lastname      = htmlspecialchars($_POST["lastname"]);
        $street        = htmlspecialchars($_POST["street"]);
        $zip           = htmlspecialchars($_POST["zip"]);
        $town          = htmlspecialchars($_POST["town"]);
        $order         = htmlspecialchars($_POST["order"]);

        $date          = date('d-m-y H:i:s');

        // anger en variabel som kan lagra de eventuella felaktigheterna
        $errors = array();

        //Kontrollera mail
        if (!$_POST["email"])
        $errors[]= "Din email";

        // kontrollera om en Epostadress angivits
        $emailcheck = $_POST["email"];
        if(!preg_match("/^[a-z0-9\å\ä\ö._-]+@[a-z0-9\å\ä\ö.-]+\.[a-z]{2,6}$/i", $emailcheck))
        $errors[] = "Din epostadress saknas eller är felaktig";

        //kontrollerar om en session är aktiv
        if (!isset ($_SESSION["form_session"]))
        $errors[] = "Din användning är inte tillåten! [session]";

        if (!$_POST["firstname"])
        $errors[]= "Ditt förnamn";

        if (!$_POST["lastname"])
        $errors[]= "Ditt efternamn";

        if (!$_POST["street"])
        $errors[]= "Din gatuadress";

        if (!$_POST["zip"])
        $errors[]= "Ditt postnummer";

        if (!$_POST["town"])
        $errors[]= "Din stad";

        if (!$_POST["order"])
        $errors[]= "Din beställning";

        // om felaktig information finns visas detta meddelande
        if (count($errors)>0){
            echo "<ul>";
            foreach($errors as $error_message) {
                echo "<li> $error_message </li>";
            }
            echo "</ul>";
        } else {
            //formuläret är korrekt ifyllt och informationen bearbetas
            //kontrollerar om magic_quotes_gpc är aktiverat
            if(get_magic_quotes_gpc()){
                $to           =                   "order@teodorslivs.se";
                $from         =                   stripslashes($_POST["email"]);
                $subject      = "ORDER "        . $date;
                $name         =                   stripslashes($_POST["firstname"] . " " . $_POST["lastname"]);
                $message      = "Namn: "        . stripslashes($_POST["firstname"]) . " " . stripslashes($_POST["lastname"]) . "\r\n";
                $message     .= "Gatuadress: "  . stripslashes($_POST["street"])                                             . "\r\n";
                $message     .= "Postnr: "      . stripslashes($_POST["zip"])                                                . "\r\n";
                $message     .= "Stad: "        . stripslashes($_POST["town"])                                               . "\r\n";
                $message     .= "Beställning: " . stripslashes($_POST["order"]);
            } else {
                $to           =                 "order@teodorslivs.se";
                $from         =                 $_POST["email"];
                $subject      = "ORDER "        . $date;
                $name         =                 $_POST["firstname"] . " " . $_POST["lastname"];
                $message      = "Namn: "        . $_POST["firstname"] . " " . $_POST["lastname"]                            . "\r\n";
                $message     .= "Gatuadress: "  . $_POST["street"]                                                          . "\r\n";
                $message     .= "Postnr: "      . $_POST["zip"]                                                             . "\r\n";
                $message     .= "Stad: "        . $_POST["town"]                                                            . "\r\n";
                $message     .= "Beställning: " . $_POST["order"];
            }
            // SEND MAIL BRO
            if (mail($to, $subject, $message, "From: $name <$from>"))
            echo    "<ul>
                        <li><strong>Mottagen:</strong> "    . $date . "</li>
                        <li><strong>Email:</strong> "       . $_POST["email"] . "</li>
                        <li><strong>Namn:</strong> "        . $_POST["firstname"] . " " . $_POST["lastname"] . "</li>
                        <li><strong>Gatuadress:</strong> "  . $_POST["street"] . "</li>
                        <li><strong>Postnr:</strong> "      . $_POST["zip"] . "</li>
                        <li><strong>Stad:</strong> "        . $_POST["town"] . "</li>
                        <li><strong>Beställning:</strong> " . $_POST["order"] . "</li>
                    </ul>";
            else
            echo    "error";
        }
    }

session_unset();
session_destroy();
?>