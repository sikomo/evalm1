Application pour l'évalution M1-UE2.7S3 Systèmes distribués et applications  sous Windows et Linux

* Enoncé : https://wiki.simoko.eu/master/m1-ue2.7s3/eval 
* Corrigé : https://wiki.simoko.eu/master/m1-ue2.7s3/corrigeeval

**Contexte**

* On souhaite conteneuriser l'application crée au TP.
* On ne vous demande pas de développer l'application, mais de fournir 
l'infrastructure et de la déployer sur une plateforme Docker.
* Dans un second temps, on rendra cette application HA avec swarm.


Le cahier des charges est le suivant :

**Étape 1**

*  L'application sera déployée sur le modèle microservices :
1. Un service pour la backend : la base de données.
2. Un service pour le frontend pour l'interface WEB.


**Étape 2**

* Redéployer l'application sur un cluster swarm composé de trois nœuds. 
