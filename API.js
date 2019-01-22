//L'application requiert l'utilisation du module Express.
//La variable express nous permettra d'utiliser les fonctionnalités du module Express.  
var express = require('express');

// Nous définissons ici les paramètres du serveur.
var hostname = 'localhost';
var port = 3000;
<<<<<<< HEAD
 
var sql = require('mssql'); // MS Sql Server client

// Connection string parameters.
var sqlConfig = {
    user: 'root',
    password: '',
    server: 'localhost',
    database: 'bde_cesi'
}
=======
>>>>>>> ac59736cf18da3ca0457254060c8c157721a9216

// Nous créons un objet de type Express. 
var app = express();
//Afin de faciliter le routage (les URL que nous souhaitons prendre en charge dans notre API), nous créons un objet Router.
//C'est à partir de cet objet myRouter, que nous allons implémenter les méthodes. 
var myRouter = express.Router();
 
myRouter.route('/boutique')
.get(function(req,res){
      res.json({action : "Vous avez ouvert la boutique.", methode : req.method});

})
.post(function(req,res){
      res.json({action : "Vous avez mit cet article dans le panier.", methode : req.method});
})
myRouter.route('/')

// all permet de prendre en charge toutes les méthodes. 
.all(function(req,res){ 
      res.json({message : "Bienvenue sur l'api de notre boutique ", methode : req.method});
});
 
myRouter.route('/')



// Nous demandons à l'application d'utiliser notre routeur
app.use(myRouter);

// Démarrer le serveur 
app.listen(port, hostname, function(){
	console.log("Mon serveur fonctionne sur http://"+ hostname +":"+port); 
});

get(function(req,res){
      res.json({action });
})