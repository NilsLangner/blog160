#Blog160

Bei blog160 handelt es sich um ein Projekt welches eine Kombination aus Twitter und Blogsystem darstellen soll. Hierfür durfte kein existierendes PHP-Framework verwendet werden. Das Hinzufügen von Kommentaren und Blogeinträgen sollte über JavaScript funktionieren. Darüber hinaus wurde die Entwicklung zeitlich auf einen Arbeitstag begrenzt.

Würde das Projekt ohne Einschränkungen entwickelt werden, so sollte auf ein modernes MVC-Framework, wie zum Beispiel Symfony2 und eine saubere Datenbank-Abstraktion und ORM wie Doctrine2 gesetzt werden. 

#Installation
Um die Applikation zu installieren muss zuerst die Datenbank eingespielt werden. Die benötigten SQL-Queries befinden sich unter `sql/create.sql`. Danach müssen in der `index.php` die Passwörter für die Datenbank korrekt gesetzt werden. Anschließend sollte die Software laufen, wenn das DOCUMENT_ROOT des Servers auf das `htdocs`-Verzeichnis zeigt. Das System benötigt eine MySQL-Datenbank und **PHP 5.3**.

#Potential
Dieses Projekt war auf einen Arbeitstag beschränkt, was bedeutet, dass Abstriche gemacht werden mussten. Ziel war es dennoch Dinge so zu implementieren, dass alle möglichen Verbesserungen "ohne" Umbau der Applikation zu integrieren sind (open closed Prinzip). Einige Punkte, die für einen produktiven Einsatz dieser Software relevant sind, aber aus Zeitmangel nicht umgesetzt werden konnten, sind im folgenden Abschnitt aufgeführt:

* Fehlerhandhabung: Derzeit ist das System nicht sonderlich defensiv programmiert. Wenn auf den vorgeschriebenen Wegen geblieben wird, sind Fehler abgefangen und werden dem Nutzer ausgegeben. Sollte an dem System vorbeigearbeitet werden, können - müssen aber nicht - Fehler/Exceptions auftreten. Ein Beispiel hierfür ist das 404-Handling, welches nicht implementiert wurde.

* Datenbank-Abstraktion: Bedingung bei diesem Projekt war, keine existierende PHP-Bibliothek zu verwenden. Aus diesem Grund wurde das Active-Record-Pattern für die Model-Schicht  gewählt, da es relativ einfach implementiert werden kann. Diese einfache Implementierung erkauft man sich durch eine starke Kopplung von Datenbank und Modellen. Bei professionellen Projekten sollte ein ausgereiftes System wie Doctrine2 verwendet werden, welches mit seinen Konzepten losere Kopplung erlaubt.

* Dieses Projekt wurde als "rapid prototype" umgesetzt. Unit Tests **müssen** nachgereicht werden. Da die Zeit nicht gereicht hat wurde nur **eine** Klasse als Beispielimplementierung (`test/lib/Mvc160/Route/RequestTest.php`) getestet, um das System zu verdeutlichen. Bei der Implementation wurde darauf geachtet, dass keine statischen Methoden, Singletons oder globale Variablen verwendet wurden, um die Testbarkeit sicherzustellen. In fast allen Fällen wurden Abhängigkeiten über dependency injection gelöst. Die verwendeten JavaScript-Funktionen sind so einfach gestalltet, dass auf eine Verwendung von jsUnit verzichtet wurde. Funktionale Tests mit Selenium würden einen Mehrwert bringen.

* Trennung der Applikation: Die Applikation ist in zwei Teile aufgeteilt. Damit wurde eine Trennung zwischen eigentlicher Applikation und dem MVC-Framework hergestellt . Mvc160 befindet sich im Bibliotheken-Verzeichnis `lib`. Die eigentliche Applikation befindet sich direkt im `source`-Verzeichnis. Der Mvc160-Part sollte in ein separates Repository überführt werden.

* Konfiguration: Derzeit wird die Konfiguration direkt in der index.php gelöst (DB-Connection), dies sollte in ein Config-File ausgelagert werden. Zend_Config empfiehlt sich für diesen Einsatz. 