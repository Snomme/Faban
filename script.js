document.getElementById('fabanFormular').addEventListener('submit', function(e) {
    e.preventDefault();
/*
    In Zeile 1 und 2 passiert folgendes
    
    Es wird ein event-Listener hinzugefügt - ähnlich haben wir das in 
    unserer ersten JS-Datei schongesehen:
    - document ist ein Objekt und bezieht sich auf die komplette HTML-Seite
    - auf document wenden wir Methoden an, z.B. mit getElementByID nutzen wir 
      die zuvor im HTML definierte ID

    Ein Event-Listener wird an das Formular mit der ID fabanFormular gebunden. 
    Der Listener reagiert auf das submit-Ereignis, welches ausgelöst wird, 
    wenn das Formular abgesendet werden soll.

    e.preventDefault();
    Verhindert das Standardverhalten des Formulars beim Absenden, 
    typischerweise das Neuladen der Seite. Dies ist notwendig, 
    um die Daten asynchron zu verarbeiten.
*/

    var formData = new FormData(this);
 /*
    In Zeile 22 sammeln wir die Formulardaten
    
    Ein FormData-Objekt wird aus dem aktuellen Formular erstellt
    (this bezieht sich hier auf das Formular-Element, 
    das den submit-Event ausgelöst hat). 
    FormData ermöglicht eine einfache Handhabung und Übermittlung der Formulardaten.
*/   

    fetch('store_data.php', {
        method: 'POST',
        body: formData
    })
 /*
    In Zeile 32 bis 35  geht es um einen asynchronen POST-Request
    
    Verwendet die fetch API, um einen asynchronen POST-Request an store_data.php 
    zu senden. Die Formulardaten (formData) werden im Body des Requests übertragen
*/  

    .then(response => response.text())
    .then(data => {
        document.getElementById('output').innerHTML = data;
    })
 /*
    In Zeile 43 bis 46 wird die Antwort vom Server verarbeitet
    
    .then(response => response.text())
    Nach dem Senden des Requests wird die Antwort des Servers als Text verarbeitet.

    .then(data => { document.getElementById('output').innerHTML = data; })
    Die Antwort des Servers (nun als Text data) wird genutzt, um den Inhalt 
    eines Elements mit der ID output auf der Webseite zu aktualisieren. 
    Dies ermöglicht die dynamische Anzeige von Inhalten, ohne die Seite neu 
    laden zu müssen.
*/ 

    .catch(error => {
        console.error('Error:', error);
    });
 /*
    In Zeile 60 bis 62 passiert folgendes
    
    .catch(error => { console.error('Error:', error); });
    Fängt mögliche Fehler während des Fetch-Vorgangs oder der 
    Antwortverarbeitung ab und loggt diese in der Konsole. 
    Dies ist hilfreich für Debugging-Zwecke.
*/ 

});
