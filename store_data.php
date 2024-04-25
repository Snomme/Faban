<?php
$name = $_POST['spitzname'] ?? '';
$kommentar = $_POST['kommentar'] ?? '';
/*
    In den Zeilen 2 und 3 passiert folgendes

    $name = $_POST['spitzname'] ?? '';
    nimmt den Wert aus dem POST-Request mit dem Schlüssel 'name' entgegen. 
    Falls dieser Schlüssel nicht existiert, wird der Variable $name ein leerer String zugewiesen. 
    Das ist nützlich, um Fehler zu vermeiden, falls das Formularfeld für den Namen nicht ausgefüllt wurde.

    $kommentar = $_POST['kommentar'] ?? '';
    funktioniert genau so, nur dass es sich hier um einen Text handelt.
*/

$file = 'data.txt';
/*
    In Zeile 16 passiert folgendes

    $file = 'data.txt'; 
    definiert den Dateinamen (und den relativen Pfad), 
    in dem die Kommentare gespeichert werden. 
    Die Datei data.txt wird im gleichen Verzeichnis wie das PHP-Script erwartet.
*/

$current = "Spitzname: $name\nKommentar: $kommentar\n\n";
file_put_contents($file, $current, FILE_APPEND);
/*
    In Zeile 26 und 27 passiert folgendes
    
    $current = "Spitzname: $name\nKommentar: $text\n\n";
    In der Variable $current wird der String "Spitzname: $name\nKommentar: $text\n\n" gespeichert, 
    der die Benutzereingaben formatiert.

    file_put_contents($file, $current, FILE_APPEND);
    fügt den Inhalt von $current an das Ende der Datei $file an. 
    Durch die Verwendung von FILE_APPEND wird sichergestellt, 
    dass die Daten angehängt und nicht überschrieben werden.
*/

$storedData = file_get_contents($file);
$dataLines = explode("\n\n", $storedData);
/*
    In Zeile 41 und 42 passiert folgendes
    
    $storedData = file_get_contents($file);
    liest den gesamten Inhalt der Datei in die Variable $storedData.

    $dataLines = explode("\n\n", $storedData);
    teilt den Inhalt von $storedData in einzelne Kommentare, 
    basierend auf dem Trennzeichen "\n\n" (zwei Newlines), 
    und speichert diese als Array in $dataLines.
*/

echo "<h3>Stored Data:</h3>";
foreach ($dataLines as $data) {
    echo "<p>$data</p>";
}
/*
    In Zeile 56 bis 59 passiert folgendes
    
    echo "<h3>Kommentare</h3>"
    erzeugt eine Überschrift für den Abschnitt der Kommentaranzeige erzeugt 
    - wie im Exkurs schon gesehen

    Die foreach-Schleife durchläuft das, was in $datalines gespeichert ist 
    und geht dabei auf jedes einzelne Element ein
    - man nennt das 'sie iteriert über alle Elemente in $dataLines' -
    und gibt sie in Paragraphen (<p>) eingebettet aus. Das kennen wir aus HTML.
    Das ermöglicht die Darstellung der gespeicherten Kommentare in einem HTML-Dokument

*/
?>
