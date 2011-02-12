#Blog160

#Potential
Dieses Projekt war auf einen Arbeitstag beschränkt, was bedeutet, dass Abstriche gemacht werden mussten. Ich habe versucht Dinge so zu implementieren, dass alle möglichen Verbesserungen noch "ohne" Umbau der Applikation zu integrieren sind. Einige Punkte, die für einen produktiven Einsatz dieser Software sind im folgenden Abschnitt aufgezählt:

* Fehlerhandhabung: Derzeit ist das System kaum defensiv programmiert. Wenn man auf den vorgeschriebenen Wegen bleibt, sind Fehler abgefangen und werden dem Nutzer ausgegeben. Sollte man versuchen am System vorbei zu arbeiten, können - müssen aber nicht - Fehler/Exceptions auftreten. Ein Beispiel hierfür ist das 404 Handling, welches nicht implementiert wurde.

* Datenbank-Abstraktion: Bedingung bei diesem Projekt war, dass keine existierende PHP-Bibliothek verwendet werden sollte. Aus diesem Grund wurde das Active-Record-Pattern für die Datenbank gewählt, da es relativ einfach implementiert werden kann. Bei Produktiv-Projekten sollte ein professionelles System wie Doctrine2 verwendet werden. 

* Dieses Projekt wurde als "rapid prototype" umgesetzt. Unit Tests **müssen** nachgereicht werden. Da die Zeit leider nicht gereicht hat wurde nur eine Klasse als Beispielimplementierung getestet, um das System zu verdeutlichen. Bei der Implementation wurde darauf geachtet, dass keine statischen Methoden, Singletons oder globale Variablen verwendet wurden, um die Testbarkeit herzustellen. In den meisten Fällen wurden Abhängigkeiten über dependency injection gelöst.

* Trennung der Applikation: Ich habe versucht die Applikation in zwei Teile aufzuteilen. Damit sollte eine Trennung zwischen eigentlicher Applikation und dem MVC-Framework hergestellt werden. Mvc160 befindet sich im Bibliotheken-Verzeichnis `lib`. Die eigentliche Applikation befindet sich direkt im `source` Verzeichnis. Der Mvc160-Part sollte in ein separates Repository überführt werden.