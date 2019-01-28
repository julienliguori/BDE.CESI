  var express = require('express'); // Web Framework
  var app = express();
  var mysql = require('mysql');
  var bodyParser = require('body-parser');
  var jwt = require('jsonwebtoken');

  // Connection string parameters.
  var con = mysql.createConnection({
      host: "localhost",
      user: "root",
      password: "",
      database: "bde_cesi"
  });

  var server = app.listen(8081, function () {
      var host = server.address().address
      var port = server.address().port

  console.log("app listening at http://", host, port)
});

  app.use(bodyParser.json()); // support json encoded bodies

  app.get('/api', function(req, res){

    res.json({
      message : 'Welcome to the API'
    });

  });

  app.post('/api/login', function(req, res){

    //utilisateur de test
    user = {
      id : 1,
      username : 'adminBoutique'
    }

    jwt.sign({user}, 'verysecretkey',function(err, token){
      res.json({
         token
      });
    });
  });

 

  app.get('/:site/:table/:filtre/:signe/:condition/', verifyToken, function (req, res) {
    jwt.verify(req.token, 'verysecretkey', function(err, authData){
      if(err){
        res.sendStatus(403);
        //res.json('nop');
      }else{
     
      if(req.params.signe == "like"){
        var sql ="SELECT * FROM " + req.params.table + " WHERE " +  req.params.filtre + " like '" + req.params.condition + "%'";
        console.log(sql);
        con.query(sql, function (err, result) {
          if (err) throw err;
          console.log("like");
          res.json(result);
          //res.json("58"+ req.path +"25")
        });
      

      }else{
        var sql ="SELECT * FROM " + req.params.table + " WHERE " +  req.params.filtre + " " + req.params.signe + " '" + req.params.condition + "'";
        console.log(sql);
        con.query(sql, function (err, result) {
          if (err) throw err;
          console.log("autre");
          res.json(result);
          //res.json("58"+ req.path +"25")
        });}
     } });
});

  app.post('/:site/:table/', verifyToken, function (req, res) {
    jwt.verify(req.token, 'verysecretkey', function(err, authData){
      if(err){
        console.log(sql);
        res.sendStatus(403);
      }else{
     
        var dataKeys = Object.keys(req.body).toString();
        var dataValues = Object.values(req.body).toString();

        var i;
        strLength = dataValues.length;

        for(i = 0; i < strLength; i++) {
        dataValues = dataValues.replace(",", "'µ'");
        }

        for(i = 0; i < strLength; i++) {
        dataValues = dataValues.replace("µ", ",");
        }

        dataValues = "'" + dataValues + "'";

        //concatent

        var sql = "INSERT INTO " + req.params.table + " (" + dataKeys + ") VALUES ("+ dataValues +")";
        console.log(sql);
        con.query(sql, function (err, result) {
          if (err) throw err;
          console.log("Result: ", result);
          res.send("Executé");
          });  
      } });
     });


     
  app.put('/:site/:table/:filtre/:signe/:condition/', verifyToken, function (req, res) {
    jwt.verify(req.token, 'verysecretkey', function(err, authData){
      if(err){
        res.sendStatus(403);
      }else{
      var dataKeys = Object.keys(req.body).toString();
      var dataValues = Object.values(req.body).toString();

      var i;
      strLength = dataValues.length;

      for(i = 0; i < strLength; i++) {
      dataValues = dataValues.replace(",", "' '");
      }

      for(i = 0; i < strLength; i++) {
      dataValues = dataValues.replace(" ", ",");
      }

      dataValues = "'" + dataValues + "'";

      //concatent

      var sql ="UPDATE " + req.params.table + " SET " + dataKeys + " = " + dataValues + " WHERE " +  req.params.filtre + req.params.signe + " '" + req.params.condition + " '";
      console.log(sql);
      con.query(sql, function (err, result) {
        if (err) throw err;
        console.log("Result: ", result);
        res.send("Éxécuté");
        });  
      } });
  });

function verifyToken(req, res, next){
  //Get auth header value
  const bearerHeader = req.headers['authorization'];
  if(typeof bearerHeader !== 'undefined') {
    // Split at the space
    const bearer = bearerHeader.split(' ');
    // Get token from array
    const bearerToken = bearer[1];
    // Set the token
    req.token = bearerToken;
    // Next middleware
    next();
  } else {
    // Forbidden
    res.sendStatus(403);
    //res.send(bearerToken);
  }

}

// con.on('error', function(err) {
//   console.log("[mysql error]",err);
// });

// const express = require('express');
// const jwt = require('jsonwebtoken');

// const app = express();

// app.get('/api', (req, res) => {
//   res.json({
//     message: 'Welcome to the API'
//   });
// });

// app.post('/api/posts', verifyToken, (req, res) => {  
//   jwt.verify(req.token, 'secretkey', (err, authData) => {
//     if(err) {
//       res.sendStatus(403);
//     } else {
//       res.json({
//         message: 'Post created...',
//         authData
//       });
//     }
//   });
// });

// app.post('/api/login', (req, res) => {
//   // Mock user
//   const user = {
//     id: 1, 
//     username: 'brad',
//     email: 'brad@gmail.com'
//   }

//   jwt.sign({user}, 'secretkey', { expiresIn: '30s' }, (err, token) => {
//     res.json({
//       token
//     });
//   });
// });

// // FORMAT OF TOKEN
// // Authorization: Bearer <access_token>

// // Verify Token
// function verifyToken(req, res, next) {
//   // Get auth header value
//   const bearerHeader = req.headers['authorization'];
//   // Check if bearer is undefined
//   if(typeof bearerHeader !== 'undefined') {
//     // Split at the space
//     const bearer = bearerHeader.split(' ');
//     // Get token from array
//     const bearerToken = bearer[1];
//     // Set the token
//     req.token = bearerToken;
//     // Next middleware
//     next();
//   } else {
//     // Forbidden
//     res.sendStatus(403);
//   }

// }

// app.listen(5000, () => console.log('Server started on port 5000'));