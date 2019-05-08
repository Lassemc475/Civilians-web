<?php
$title = "CN | Hjem";
include 'assets/incl/header.php'
?>
<section id="showcase">
    <div class="container">
        <h1>CiviliansNetwork</h1>
        <p>Et community der sætter spillerne højest</p>
    </div>
</section>
<section id="boxes">
    <div class="container">
        <div id="serverstatus">
        <div class="box">
            <img src="./assets/img/pc.png">
            <div id="status">
                <div class="row1">
                    <h3>Server 1</h3>
                    <p style=color:orange;>Tjekker status...</p>
                    <br>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>


<section id="faq">
    <h1>F.A.Q</h1>
    <div id="q">
        <div id="a">
            <h3>Hvordan får man whitelelist?</h3>
            <p>For at du kan blive whitelisted på vores server skal du til en whitelist samtale på vores discord, og være over 16 år jo mindre du er blevet henvist af en anden spiller.</p>
        </div>
    </div>
    <div id="q">
        <div id="a">
            <h3>Hvad gør jeg hvis jeg bliver bannet?</h3>
            <p>Hvis du bliver bannet på vores server og du enten har hacket, snydt eller bug abused på nogen måder kan du ikke få unban. Hvis ikke du har gjordt nogen af de ting kan du sagtens ansøge om unban. Du ansøger om unban <a href="unbanansøgning.php">her,</a> du skal bare udfylde de felter på siden, og en fra ledelsen vil vurdere din mulighed for at komme tilbage på serveren.</p>
        </div>
    </div>
    <div id="q">
        <div id="a">
            <h3>Hvornår får jeg svar på en ansøgning?</h3>
            <p>Du vil få svar på ansøgninger inden for 2 uger. Hvis du intet svar har fået inden for det tidsrum er din ansøgning afvist. Du bedes ikke skrive til staff og/eller job ledelsen hvornår du modtager svar.</p>
        </div>
    </div>
    <div id="q">
        <div id="a">
            <h3>Hvordan bliver man staff?</h3>
            <p>Hvis du godt kan lide at hjælpe, og du har erfaring skal du være velkommen til at skrive en ansøgning. Du kan skrive en ansøgning <a href="staffansøgning.php">her</a> du skal bare have fået din whitelist ansøgning accepteret og være aktiv på serveren!</p>
        </div>
    </div>
    <div id="q">
        <div id="a">
        <h3>Hvordan kontakter jeg ledelsen?</h3>
        <p>I det fleste tilfælde er det ikke det rette at kontakte ledelsen. Hop i afventer support på discorden, så du kan få hjælp af en supporter. Hvis du absolut skal snakke med en fra Ledelsen vil supporteren sende dig videre. Grunden til at vi ikke accepterer at folk skriver direkte til ledelsen er fordi de i øjeblikket har meget travlt.</p>
        </div>
    </div>
    <div id="q">
        <h3>Jeg har mistet mine ting?</h3>
        <p>Hvis du mister dine ting bedes du sende en "refund" formular, det fungerer på følgende måde: Du sender en ansøgning, og derefter venter på svar. En fra staff teamet vil vurdere din sag, og kontakte dig på discord.</p>
    </div>
</section>
<section id="discordwidget">
    <div id="some">
        <div id="discordlogo">
            <img href="https://discord.gg/AxpEspz" target="_blank" src="https://discordapp.com/assets/192cb9459cbc0f9e73e2591b700f1857.svg">
        </div>
        <div id="discordconnect">
            <p>Vores discord server til spillere <a href="https://discord.gg/AxpEspz" target="_blank" button type="discord" class="dbutton">Tilslut</button></a>     <div id="members-count"></div>
        </div>
    </div>


    <section id="patreonwidget">
        <div id="patreonlogo">
            <img href="https://discord.gg/AxpEspz" target="_blank" src="./assets/img/patreon.png">
        </div>
        <div id="patreondoner">
            <p>Vores patreon til server donationer<a href="http://patreon.com/civiliansnetwork" target="_blank" button type="patreon" class="pbutton">Støt os</button></a>     <div id="patreon-count"><span>22 Patreons $320 pr. mdr.</span></div>
        </div>

        </div>


    </section>

    <div class="footer">Copyright - Hermansen &copy; 2019 </div>


    <script>
        function myFunction() {
            var x = document.getElementById("myLinks");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }

        var xhReq = new XMLHttpRequest();
        xhReq.open(
            "GET",
            "https://discordapp.com/api/guilds/535958931562823702/widget.json",
            false
        );
        xhReq.send(null);
        var discordjson = JSON.parse(xhReq.responseText);

        if (discordjson != null) {
            function showMembersCount() {
                var membersCount = discordjson.members.length;

                var countElem = (document.getElementById("members-count").innerHTML =
                    membersCount + "<span class='member-label'> Medlemmer online<span>");
            }

            function showMembers() {
                discordjson.members.reverse().forEach(function(members) {
                    var td = document.createElement("td");

                    var label = document.createElement("label");
                    label.innerHTML = members.username;

                    var img = document.createElement("img");
                    img.src = members.avatar_url;

                    var table = document.getElementById("members-list");
                    var row = table.insertRow(0);
                    var td1 = row.insertCell(0);
                    var td2 = row.insertCell(1);
                    td1.className = "member-avatar";
                    td2.className = "member-name";
                    td1.appendChild(img);
                    td2.appendChild(label);
                });
            }
        }



        setTimeout(function() {
            showMembersCount();
            showMembers();
        }, 500);

        /* workaround to display regular table instead of liquid table plugin  */
        /* the plugin sets the regular table to display:none, this fixes it */
        setTimeout(function() {
            document.getElementById("members-list").style.display = "block";
        }, 2000);


        $(function() {
            updateCounter();
        });
        function updateCounter() {
            $.ajax({
                url: 'assets/incl/servers.php',
                success: function(output) {
                    $('#serverstatus').empty();
                    $('#serverstatus').html(output);
                },
                complete: function() {
                    setTimeout(updateCounter(), 5000);//run again in 5 seconds
                }
            });
        }

    </script>