PFZ Symfony Workshop
====================

Veel van de volgende informatie kun je ook vinden op:

http://symfony.com/doc/current/book/installation.html



Symfony2 demo app vanaf github binnenhalen
------------------------------------------

Ga naar de directory waarin je de source wilt neerzetten, bijvoorbeeld /home/gebruiker

Run daarna het volgende commando:

    git clone https://github.com/jaytaph/pfz.git pfz

Ga hierna naar je nieuwe directory toe:

    cd /home/gebruiker/pfz


Vendors installeren
-------------------

Run het volgende commando op de commandline in je nieuwe directory

    php composer.phar install

Dit installeert alle symfony2 dependencies.


Check
-----

Run daarna de check om te kijken of je systeem helemaal goed is geconfigureerd:

    php app/check.php


Browsen van je symfony2 applicatie
----------------------------------

Zorg ervoor dat je webserver laat wijzen naar de goede directory. Dit moet wijzen naar de 'web'
directory binnen het symfony2 project. Dus bijvoorbeeld:  /home/gebruiker/pfz/web

Let op: je webserver mag dus NIET wijzen naar /home/gebruiker/pfz. De 'web' directory moet de zogenaamde
document-root zijn.



Rechten
-------
In sommige gevallen kunnen er permissie problemen ontstaan omdat zowel de webserver gebruiker, als jezelf op de
console gebruik maken van symfony. Hiervoor zul je (eenmalig) de permissie goed moeten zetten. Dit kun je vinden op

    http://symfony.com/doc/current/book/installation.html#configuration-and-setup



Hierna kun je direct vanuit je browser naar je applicatie gaan:

    http://<ip-of-domein>/app_dev.php/


