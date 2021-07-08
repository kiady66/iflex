# iFlex

**iFlex est un web service qui a pour objectif de permettre à des groupes de personnes, par exemple des membres d’une entreprise de se créer facilement leur application de messagerie interne et se répartir dans les salons. Les utilisateurs s’identifient grâce à un token qu’ils peuvent obtenir en envoyant leurs nom d’utilisateur et leur mot de passe.**

### Les pré-requis : 

<ul>
<li>php (version 8.0 ou plus) installé</li>
<li>Extension gd de php activée</li>
<li>Extension pdo_sql de php activée</li>
<li>MySql Server installé</li>
<li>Composer installé</li>
</ul>

### Les commandes a exécutées :

<p>Ouvrir un terminal et se mettre dans la racine du dossier du web service, ensuite executer les commandes suivantes:</p>

```
composer install
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load
php -S localhost:3000 -t public
```
### Accéder à l’API :

Aller sur le lien : ```localhost:3000/api```

### Tester l’API :

Ouvrir **Postman** ou une alternative de Postman (Insomnia, Paw, HTTPie …)

Ensuite executer la requete de type **POST** suivante :


```http
POST /api/login_check HTTP/1.1
Host: localhost:3000
Content-Type: application/json
Cache-Control: no-cache

{
	"username" : "nom_d_utilisateur",
	"password" : "mot_de_passe"
}
```

Vous obtiendrez une réponse de ce genre :

```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2MjU2OTA3MzIsImV4cCI6MTYyNTY5NDMzMiwicm9sZXMiOlsiUk9MRV9BRE1JTiJdLCJ1c2VybmFtZSI6Imh1ZXQubWFyeXNlIn0.Dq6WMBkQMjztDnNapIiGk3_mKuyC41Y7KUq_onvGjOAjM2Y59UgkSJGR5sPOufc9deLn0nx0YFGZPVKttiEkcLf16eRBfLgFHbBvCySNFxQjt6Q5OkjCvF_w3k9knMVaHwdlJGZaoiAU968617Eflj2STPaVpvYEOkGI70_6kX5GC3P0a3VrRiYme0z3gCLBYt8AEZPGf8f6wlZpzfsRMQG5oaPVazqze7PhX_sJJcDF5MdVoEAujB4R1qwTVOhOU1zUHZ-kQB-jSLM7sjdmg-ttKzW3GkMOpUDzVyM5c09BM1LC0jq5VHkPOHG6lcebXnK-fr0nOqoLe9MH0fjETg",
    "refresh_token": "f4ead6be131fccc49eb506707fe91cd9d0c3d89792055b7cdec1aec7292b1da2673d650b494ee999adef856bbb654b2710726f8af0d13ef0268776feb969bac2"
}
```

Ensuite prendre le token dans la réponse pour pouvoir avoir l’autorisation d'accéder aux messages. Dans la documentation de l’API, cliquez sur Authorize et coller “Bearer ” suivi du token dans le pop up : 

![alt text](https://github.com/kiady66/iflex/tree/main/Images/api.png "API")


Vous pouvez directement tester les requêtes en cliquant sur “try it out”.
