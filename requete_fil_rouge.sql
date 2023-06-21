-- Afficher la liste des commandes ( la liste doit faire apparaitre la date, les informations du client, le plat et le prix )
select commande.id,date_commande,nom_client,telephone_client,email_client,libelle,prix
 FROM commande
  join plat on commande.id_plat=plat.id;
-- Afficher la liste des plats en spécifiant la catégorie
select plat.libelle,categorie.libelle 
from plat join categorie on plat.id_categorie = categorie.id ;
-- Afficher les catégories et le nombre de plats actifs dans chaque catégorie
select categorie.libelle,count(*) AS nbActive
 from categorie join plat on plat.id_categorie = categorie.id
  where plat.active = 'YES' 
group by libelle;-- Liste des plats les plus vendus par ordre décroissant
select libelle,prix 
from plat 
order by prix desc ;
-- Le plat le plus rémunérateur
select Max(commande.quantite *plat.prix ) as totalprixcommande 
from commande join plat on commande.id_plat = plat.id 
where commande.id_plat = plat.id ;
-- Liste des clients et le chiffre d'affaire généré par client (par ordre décroissant)
select nom_client,email_client,(commande.quantite * plat.prix ) as totalClient
 from commande 
 join plat on commande.id_plat = plat.id 
 where commande.id_plat = plat.id
group by commande.email_client 
order by totalClient Desc;
-- Ecrivez une requête permettant de supprimer les plats non actif de la base de données
delete from plat where plat.active='No';
-- Ecrivez une requête permettant de supprimer les commandes avec le statut livré
delete from commande where commande.etat ='Livrée';
-- Ecrivez un script sql permettant d'ajouter une nouvelle catégorie et un plat dans cette nouvelle catégorie.
insert into categorie ('libelle','image','active')
Values ('Tacos','assets\img\tacos.png','YES')
insert into plat('libelle','description','prix','image','id_categorie','active')
values('tacos','blablz',15,'assets\img\tacos.png',LAST_INSERT_ID(),'yes');

-- Ecrivez une requête permettant d'augmenter de 10% le prix des plats de la catégorie 'Pizza'
update plat join categorie on commande.id_plat =plat.id 
set plat.prix =  plat.prix * 1,1
where categorie.libelle = 'Pizza';

-- afficher les 6 categorie qui ont eut le plus de commandes
Select categorie.libelle,count(id_plat) AS totalcommande
 from categorie 
 join plat on categorie.id=plat.id_categorie
 join commande on plat.id=commande.id_plat
 group by categorie.libelle
 order by totalcommande
 limit 6
 ;


--  afficher les 3 plats qui ont ete le plus commande 

SELECT p.id, p.libelle, SUM(c.quantite) AS quantite_totale 
FROM commande AS c 
JOIN plat AS p ON c.id_plat = p.id 
JOIN categorie AS cat ON p.id_categorie = cat.id
 WHERE c.etat = 'vendu' OR c.etat = 'En préparation' OR c.etat = 'En cours de livraison' AND p.active = 'yes' AND cat.active = 'yes' 
GROUP BY p.id, p.libelle 
 ORDER BY quantite_totale DESC LIMIT 3 ;