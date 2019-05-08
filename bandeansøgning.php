<?php
$title = "CN | Bandeansøgning";
require_once "assets/incl/recaptchalib.php";
require_once "assets/incl/init.php";
$vrp = new vrp();
$valid = false;
$post = filter_var_array($_POST, FILTER_SANITIZE_STRING);
if(!empty($_POST)) {
    $secret = "6LdyvIwUAAAAACK85bAfcQ9bH7hZ0v8O6MtMUbzr";
// empty response
    $response = null;

// check secret key
    $reCaptcha = new ReCaptcha($secret);

    if (isset($_POST["g-recaptcha-response"])) {
        $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    }

    if ($response != null && $response->success) {
        if(!empty($post['userid']) && !empty($post['groupname']) && !empty($post['president']) && !empty($post['vpresident']) && !empty($post['members']) && !empty($post['house']) && !empty($post['attitude']) && !empty($post['background']) && !empty($post['andet'])) {
            $user = $vrp->getUser($post['userid']);
            if ($user != false) {
                $discord = $user['discord'];
                if ($discord) {
                    $localip = $vrp->getLocalIP();
                    if($localip == $user['last_login']) {
                        $notify = new notify();
                        $notify->data = [
                            [
                                "name" => "Discord:",
                                "value" => ($discord) ? "<@".$discord.">" : "Ingen discord fundet"
                            ],
                            [
                                "name" => "User ID:",
                                "value" => $post['userid']
                            ],
                            [
                                "name" => "Gruppe navn:",
                                "value" => $post['groupname']
                            ],
                            [
                                "name" => "Præsident:",
                                "value" => $post['president']
                            ],
                            [
                                "name" => "Vice præsident",
                                "value" => $post['vpresident']
                            ],
                            [
                                "name" => "Medlemmer:",
                                "value" => $post['members']
                            ],
                            [
                                "name" => "Ønsket placering for bandehus:",
                                "value" => $post['house']
                            ],
                            [
                                "name" => "Fremtoning osv:",
                                "value" => $post['attitude']
                            ],
                            [
                                "name" => "Baggrund:",
                                "value" => $post['background']
                            ],
                            [
                                "name" => "Andet:",
                                "value" => $post['andet']
                            ]
                        ];
                        $notify->username = "CiviliansNetwork - Bande";
                        $notify->footer = date("d/m/y - H:i");
                        $notify->webhook = "https://discordapp.com/api/webhooks/";
                        $notify->sendNotify();
                    }else{
                        $valid = "Brugeren IP matcher ikke med din! (Tilslutte serveren og prøv igen!)";
                    }
                }else{
                    $valid = "Kan ikke finde din discord! (Tilslutte serveren og prøv igen!)";
                }
            }else{
                $valid = "Fejl user id: ".$post['userid']." findes ikke!";
            }
        } else {
            $valid = "Du mangler og udfylde nogen felter!";
        }
    } else {
        $valid = "Du skal udfylde reCAPTCHA";
    }
}

?>
<?php include 'assets/incl/header.php' ?>
<section id="contact2">
    <div class="container2">
    </div>
    <form action="" method="post">
        <h1>Bande ansøgning</h1>

        <div class="contentform">
            <div class="text-danger"><?php if (!empty($_POST) && $valid) {echo $valid;} ?></div>
            <div class="text-success"><?php if (!empty($_POST) && !$valid) {echo "Anmoding sendt!";} ?></div>

<div class="topxx">
                <div class="form-group">
                    <p>Ingame ID</p>

                    <input type="number" name="userid" id="userid" data-rule="required" value="<?php if(!empty($post['userid']) && $valid) {echo $post['userid'];}?>" data-msg="" required/>
                    <div class="validation"></div>
                </div>

                <div class="form-group">
                    <p>Grupperingsnavn</p>

                    <input type="text" name="groupname" id="groupname" data-rule="required" value="<?php if(!empty($post['groupname']) && $valid) {echo $post['groupname'];}?>" data-msg="" required/>
                    <div class="validation"></div>
                </div>

                <div class="form-group">
                    <p>Præsident (ID - Navn)</p>
                    </i></span>
                    <input type="text" name="president" id="president" data-rule="required" value="<?php if(!empty($post['president']) && $valid) {echo $post['president'];}?>" data-msg="" required/>
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <p>Vice Præsident (ID - Navn)</p>
                    </i></span>
                    <input type="text" name="vpresident" id="vpresident" data-rule="required" value="<?php if(!empty($post['vpresident']) && $valid) {echo $post['vpresident'];}?>" data-msg="" required/>
                    <div class="validation"></div>
                </div>
</div>
                <div class="form-group">
                    <p>Gruppermedlemmer (ID - Navn)</p>

                    <textarea type="number" name="members" id="members" data-rule="required" data-msg="" required><?php if(!empty($post['members']) && $valid) {echo $post['members'];}?></textarea>
                    <div class="validation"></div>
                </div>

                <div class="form-group">
                    <p>Ønsket placering for bandehus</p>

                    <textarea type="number" name="house" id="house" data-rule="required" data-msg="" required><?php if(!empty($post['house']) && $valid) {echo $post['house'];}?></textarea>
                    <div class="validation"></div>
                </div>

                <div class="form-group">
                    <p>Udseende og attityde</p>
                    </i></span>
                    <textarea type="text" name="attitude" id="attitude" data-rule="required" data-msg="" required><?php if(!empty($post['attitude']) && $valid) {echo $post['attitude'];}?></textarea>
                    <div class="validation"></div>
                </div>

                <div class="form-group">
                    <p>Grupperingens baggrund</p>
                    </i></span>
                    <textarea type="text" name="background" id="background" data-rule="required" data-msg="" required><?php if(!empty($post['background']) && $valid) {echo $post['background'];}?></textarea>
                    <div class="validation"></div>
                </div>

                <div class="form-group">
                    <p>Andet relevant angående grupperingen</p>
                    </i></span>
                    <textarea type="text" name="andet" id="andet" data-rule="required" data-msg="" required><?php if(!empty($post['andet']) && $valid) {echo $post['andet'];}?></textarea>
                    <div class="validation"></div>
                </div>

                <div>  &zwnj; </div>
<div class="captcha">
            <div class="g-recaptcha" data-sitekey="6LdyvIwUAAAAAD2eEdve2WPCRUF-2kJAbrZMrrf3"></div>
            </div>
</div>
        <button type="submit" class="bouton-contact" value="Submit">Send</button>
        <script>
            var x, i, j, selElmnt, a, b, c;
            x = document.getElementsByClassName("custom-select");
            for (i = 0; i < x.length; i++) {
                selElmnt = x[i].getElementsByTagName("select")[0];
                a = document.createElement("DIV");
                a.setAttribute("class", "select-selected");
                a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
                x[i].appendChild(a);
                b = document.createElement("DIV");
                b.setAttribute("class", "select-items select-hide");
                for (j = 1; j < selElmnt.length; j++) {

                    c = document.createElement("DIV");
                    c.innerHTML = selElmnt.options[j].innerHTML;
                    c.addEventListener("click", function(e) {

                        var y, i, k, s, h;
                        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                        h = this.parentNode.previousSibling;
                        for (i = 0; i < s.length; i++) {
                            if (s.options[i].innerHTML == this.innerHTML) {
                                s.selectedIndex = i;
                                h.innerHTML = this.innerHTML;
                                y = this.parentNode.getElementsByClassName("same-as-selected");
                                for (k = 0; k < y.length; k++) {
                                    y[k].removeAttribute("class");
                                }
                                this.setAttribute("class", "same-as-selected");
                                break;
                            }
                        }
                        h.click();
                    });
                    b.appendChild(c);
                }
                x[i].appendChild(b);
                a.addEventListener("click", function(e) {

                    e.stopPropagation();
                    closeAllSelect(this);
                    this.nextSibling.classList.toggle("select-hide");
                    this.classList.toggle("select-arrow-active");
                });
            }
            function closeAllSelect(elmnt) {

                var x, y, i, arrNo = [];
                x = document.getElementsByClassName("select-items");
                y = document.getElementsByClassName("select-selected");
                for (i = 0; i < y.length; i++) {
                    if (elmnt == y[i]) {
                        arrNo.push(i)
                    } else {
                        y[i].classList.remove("select-arrow-active");
                    }
                }
                for (i = 0; i < x.length; i++) {
                    if (arrNo.indexOf(i)) {
                        x[i].classList.add("select-hide");
                    }
                }
            }

            document.addEventListener("click", closeAllSelect);
        </script>

    </form>
</section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
    <script src="contact.js"></script>
    </body>

    </html>