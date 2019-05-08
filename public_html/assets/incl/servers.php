<?php
ini_set('default_socket_timeout', 1);
$servers = array('30120' => 1, '30121' => 2, '30122' => 3);
foreach ($servers as $key => $value) {

    echo '<div class="box">
            <img src="./assets/img/pc.png">
            <div id="status">
                <div class="row1">';
    $server = json_decode(@file_get_contents("http://213.32.6.196:$key/players.json"), true);
    if ($server) {
        $players = count($server);
        $key = "<p style=color:green;>Online</p><p>$players/32";
    } else {
        $key = "<p style=color:red;>Offline</p>";
    }
    echo "<h3>Server $value:</h3>";
    echo $key;
    echo "<br>";
    echo '</div>
            </div>
        </div>';
}
?>