<!-- 1. $_POST (De Geheime Envelop)
Denk aan $_POST als een gesloten envelop waarmee je gegevens opstuurt.

Wanneer een gebruiker een formulier invult op je website (zoals het aanmaken of aanpassen van een notitie) en op "Verzenden" klikt, stopt de browser al die gegevens in een onzichtbare envelop. PHP vangt deze envelop op en stopt de inhoud in de speciale variabele $_POST.

Kenmerk: De gegevens zijn niet zichtbaar in de adresbalk (URL) van de browser.

Waarom handig? Veilig voor wachtwoorden, invoervelden en het opslaan van data in je database.

2. Git (De Tijdmachine)
Git heeft op zichzelf niks met PHP te maken. Het is een programma (een versiebeheersysteem) dat de geschiedenis van jouw code bijhoudt. Zie het als een tijdmachine en back-up voor je project.

Elke keer als je code werkt, maak je een foto van je mappen (een commit) en stuur je die naar internet (een push naar GitHub).

Waarom handig? Als je vandaag je code helemaal kapotmaakt en je weet niet meer wat je hebt gedaan, kun je met Git met één druk op de knop terugreizen naar de versie van gisteravond die wél werkte. Ook kun je hierdoor makkelijk samenwerken met klasgenoten in hetzelfde project.

3. $_SESSION (Het Kladblok van de Server)
Bijna alles op internet is "vergeetachtig". Zodra je van home.php naar edit.php klikt, is de server alweer vergeten wie jij bent. $_SESSION is het persoonlijke kladblok dat de server voor jou bijhoudt zolang je de website open hebt staan.

Hoe werkt het? Zodra je session_start(); bovenaan je code zet, krijgt jouw browser een uniek koekje (cookie). De server opent een kladblokje voor jouw computer.

Waarom handig? Hierin bewaar je gegevens die op meerdere pagina's moeten blijven onthouden. Denk aan:

Je flash-berichten ("Item succesvol toegevoegd!"). Je typt het bericht op de verwerkpagina, en dankzij de sessie kan de homepage het onthouden en laten zien.

Controleren of iemand is ingelogd.

4. Server (De Centrale Computer)
Een server is simpelweg een centrale computer die 24/7 aanstaat en luistert naar wat andere computers (clients) vragen. 
Hoe werkt het in jouw project?

Jouw browser is de client (de klant).

Als jij typt localhost/..., geef je een seintje aan de webserver (Apache op jouw laptop).

De webserver leest de PHP-code, vraagt eventueel data aan de database server (MySQL), maakt er een mooie HTML-pagina van en stuurt die terug naar jouw browser.

De Grote Samenvatting (In één scenario):
Stel, je logt in op een website:

Je typt je wachtwoord en verstuurt dit veilig in een dichte envelop ($_POST).

De Server vangt de envelop op en controleert in de database of het wachtwoord klopt.

Als het klopt, schrijft de server op zijn kladblok ($_SESSION): "Gebruiker Saad is ingelogd". Nu mag je naar alle geheime pagina's kijken zonder dat je opnieuw hoeft in te loggen.

Ondertussen is de programmeur die deze website heeft gebouwd heel blij, want hij heeft al zijn code veilig opgeslagen in zijn tijdmachine (Git).-->