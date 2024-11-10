<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Wycieczki po Europie</title>
</head>

<body>
    <header>
        <h1>BIURO TURYSTYCZNE</h1>
    </header>
    <div id="dataBlock">
        <h3>Wycieczki, na które są wolne miejsca</h3>
        <ul>
            <?php
            $db = new mysqli('localhost', 'root', '', 'biuro');

            $sql = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna= 1";
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<li>";
                $id = $row['id'];
                $dzien = $row['dataWyjazdu'];
                $cel = $row['cel'];
                $cena = $row['cena'];
                echo "$id. dnia $dzien do $cel, cena: $cena";
                echo "</li>";
            }
            $db->close()
            ?>
        </ul>
    </div>
    <main>
        <div id="left">
            <h2>Bestselery</h2>
            <table>
                <tr>
                    <th>Wenecja</th>
                    <th>kwiecień</th>
                </tr>
                <tr>
                    <th>Londyn</th>
                    <th>lipiec</th>
                </tr>
                <tr>
                    <th>Rzym</th>
                    <th>wrzesień</th>
                </tr>
            </table>
        </div>
        <div id="center">
            <h2>Nasze zdjęcia</h2>
            <?php
            $db = new mysqli('localhost', 'root', '', 'biuro');
            $sql = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis DESC";
            $result = $db->query($sql);
            while($row = $result->fetch_assoc()) {
                $nazwa = $row['nazwaPliku'];
                $podpis = $row['podpis'];
                echo "<img src=\"$nazwa\" alt=\"$podpis\">";
            }
            $db->close();
            ?>
        </div>
        <div id="right">
            <h2>Skontaktuj się</h2>
            <a href="turysta@wycieczki.pl">napisz do nas</a>
            <p>telefon: 111222333</p>
        </div>
    </main>
    <footer>
        <p>Stronę opracował: 00000000000</p>
    </footer>
</body>

</html>