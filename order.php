<?PHP
session_start();
$_SESSION["form_session"] = "yes";
$title = "Beställ olivolja och oliver";
include('header.php');
?>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
            <div class="page-header">
                <h1>Skicka din beställning här!</h1>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                <p class="lead">
                    Fyll i formuläret med dina kontaktuppgifter. Skriv i textrutan längst ned vad och antal Du önskar att beställa. Välj mellan <strong>Olivolja Glasflaska 500ml</strong> och <strong>Oliver Glasburk 720ml</strong>.
                </p>
                <p>När jag har mottagit en beställning kontaktar jag Dig via den e-mailadress Du angav i formuläret. Har Du frågor eller funderingar, kontakta mig på <a href="mailto:&#107;&#111;&#110;&#116;&#097;&#107;&#116;&#064;&#116;&#101;&#111;&#100;&#111;&#114;&#115;&#108;&#105;&#118;&#115;&#046;&#115;&#101;">kontakt@teodorslivs.se</a>. Fakturering sker i efterskott och betalning till svenskt bankkonto vilket innebär att inga extra kostnader tillkommer. Alla priser i SEK inkl. moms och frakt till Linköping. Kan skickas överallt i Sverige och då tillkommer bussgodsfrakt.
                </p>
                <p class="well">Om du har en restaurang, delikatessbutik eller livsmedelsbutik och vill beställa större partier än de listade nedan, ta kontakt för personlig offert.</p>
                <h4 class="contact-header">Kontaktuppgifter</h4>
                <address>
                    <span class="glyphicon contact-information glyphicon-user"></span> Karanis Sweden AB<br />
                    <span class="glyphicon contact-information">&nbsp;</span> c/o Georgios Karanis<br />
                    <span class="glyphicon contact-information glyphicon-map-marker"></span> Stenåldersgatan 52<br>
                    <span class="glyphicon contact-information">&nbsp;</span> 589 51 Linköping<br>
                    <span class="glyphicon contact-information glyphicon-envelope"></span> <a href="mailto:&#107;&#111;&#110;&#116;&#097;&#107;&#116;&#064;&#116;&#101;&#111;&#100;&#111;&#114;&#115;&#108;&#105;&#118;&#115;&#046;&#115;&#101;">kontakt@teodorslivs.se</a><br />
                    <span class="glyphicon contact-information glyphicon-earphone"></span> 013-12 59 08<br />
                    <span class="glyphicon contact-information"><img src="img/teodorslivs-facebook-icon-zurb-16x16.png" alt="facebook icon" title="Icon made by Zurb" /></span> <a href="http://www.facebook.com/teodorslivs" target="_blank"> Teodors Livs</a>
                </address>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="well">
                    <h3>Beställningsformulär</h3>
                    <div class="alert alert-warning fade in" id="errorMessage" data-hide="alert" role="alert"></div>
                    <form id="orderForm" name="orderForm" class="form-horizontal" role="form" method="post" onsubmit="return validate()" action="sendorder.php">
                        <div class="form-group">
                            <input name="email" type="text" class="form-control input-lg" id="inputEmail" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input name="firstname" type="text" class="form-control input-lg" id="inputFirstName" placeholder="Förnamn">
                        </div>
                        <div class="form-group">
                            <input name="lastname" type="text" class="form-control input-lg" id="inputLastName" placeholder="Efternamn">
                        </div>
                        <div class="form-group">
                            <input name="street" type="text" class="form-control input-lg" id="inputStreet" placeholder="Gatuadress">
                        </div>
                        <div class="form-group">
                            <input name="zip" type="text" class="form-control input-lg" id="inputZip" placeholder="Postnummer">
                        </div>
                        <div class="form-group">
                            <input name="town" type="text" class="form-control input-lg" id="inputTown" placeholder="Stad">
                        </div>
                        <div class="form-group">
                            <textarea name="order" class="form-control input-lg" id="inputText" rows="5" placeholder="Skriv din beställning här..."></textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block" id="inputResetButton">
                                    <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                                    Rensa formulär</button>
                            </div>
                           <div class="col-lg-6">
                                <button type="submit" class="btn btn-success btn-lg btn-block" id="inputSubmitButton">
                                    <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                                    Skicka beställning</button>
                            </div>
                        </div>
                    </form>
                    <h4 class="text-center">Prislista</h4>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>1 flaska</strong> olivolja á 500ml<span class="badge">100kr</span></li>
                        <li class="list-group-item"><strong>1 burk</strong> oliver á 720ml<span class="badge">100kr</span></li>
                        <li class="list-group-item bg-danger text-danger"><strong>12 burkar</strong> oliver á 720ml<span class="badge discount">60% Rabatt</span><span class="badge">480kr</span></li>
                        <li class="list-group-item"><strong>12 flaskor</strong> olivolja á 500ml<span class="badge discount">20% rabatt</span> <span class="badge">960kr</span> </li>
                        <li class="list-group-item"><strong>60 burkar</strong> oliver á 720ml<span class="badge discount">65% rabatt</span> <span class="badge">2100kr</span></li>
                        <li class="list-group-item"><strong>60 flaskor</strong> olivolja á 500ml<span class="badge discount">30% rabatt</span> <span class="badge">4200kr</span> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?PHP
include('footer.php');
?>
