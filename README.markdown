#Blog160

Bei blog160 handelt es sich um ein "Spaßprojekt". Aufgabe war es eine Kombination aus Twitter und Blogsystem zu bauen. Dabei durfte kein existierendes PHP-Framework verwendet werden. Hinzufügen von Kommentaren und Blogeinträgen sollte über JavaScript funktionieren.

Wäre die Einschränkung der Nichtverwendung eines PHP-Frameworks nicht gewesen, so wäre dieses Projekt in einer sehr kurzen Zeit mit Hilfe von z.B. Symfony2 und Doctrine2 umzusetzen.

#Installation
Um die Applikation zu installieren muss zuerst die Datenbank eingespielt werden. Die benötigten SQL-Queries befinden sich unter `sql/create.sql`. Danach muss in der index.php die Passwörter für die Datenbank korrekt gesetzt werden. Danach sollte die Software laufen, wenn das DOCUMENT_ROOT des Servers auf das htdocs Verzeichnis zeigt. Das System benötigt eine MySQL-Datenbank und PHP 5.3.

#Potential
Dieses Projekt war auf einen Arbeitstag beschränkt, was bedeutet, dass Abstriche gemacht werden mussten. Ich habe versucht Dinge so zu implementieren, dass alle möglichen Verbesserungen noch "ohne" Umbau der Applikation zu integrieren sind. Einige Punkte, die für einen produktiven Einsatz dieser Software sind im folgenden Abschnitt aufgezählt:

* Fehlerhandhabung: Derzeit ist das System kaum defensiv programmiert. Wenn man auf den vorgeschriebenen Wegen bleibt, sind Fehler abgefangen und werden dem Nutzer ausgegeben. Sollte man versuchen am System vorbei zu arbeiten, können - müssen aber nicht - Fehler/Exceptions auftreten. Ein Beispiel hierfür ist das 404 Handling, welches nicht implementiert wurde.

* Datenbank-Abstraktion: Bedingung bei diesem Projekt war, dass keine existierende PHP-Bibliothek verwendet werden sollte. Aus diesem Grund wurde das Active-Record-Pattern für die Datenbank gewählt, da es relativ einfach implementiert werden kann. Bei Produktiv-Projekten sollte ein professionelles System wie Doctrine2 verwendet werden. 

* Dieses Projekt wurde als "rapid prototype" umgesetzt. Unit Tests **müssen** nachgereicht werden. Da die Zeit leider nicht gereicht hat wurde nur eine Klasse als Beispielimplementierung getestet, um das System zu verdeutlichen. Bei der Implementation wurde darauf geachtet, dass keine statischen Methoden, Singletons oder globale Variablen verwendet wurden, um die Testbarkeit sicherzustellen. In fast allen Fällen wurden Abhängigkeiten über dependency injection gelöst.

* Trennung der Applikation: Ich habe versucht die Applikation in zwei Teile aufzuteilen. Damit sollte eine Trennung zwischen eigentlicher Applikation und dem MVC-Framework hergestellt werden. Mvc160 befindet sich im Bibliotheken-Verzeichnis `lib`. Die eigentliche Applikation befindet sich direkt im `source` Verzeichnis. Der Mvc160-Part sollte in ein separates Repository überführt werden.

*Konfiguration: Derzeit wird die Konfiguration direkt in der Index.php gelöst (DB-Connection). Dies sollte in ein Config-File ausgelagert werden.