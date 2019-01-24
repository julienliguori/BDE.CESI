  var express = require('express'); // Web Framework
  var app = express();
  var mysql = require('mysql');
  var bodyParser = require('body-parser');

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

  app.get('/:site/:table/:filtre/:signe/:condition/', function (req, res) {

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
  });


  app.post('/:site/:table/', function (req, res){

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

    var sql = "INSERT INTO " + req.params.table + " (" + dataKeys + ") VALUES ("+ dataValues +")";

    con.query(sql, function (err, result) {
      if (err) throw err;
      console.log("Result: ", result);
      res.send("Executé");
      });  
  });

  app.put('/:site/:table/:filtre/:signe/:condition/', function (req, res){
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

    con.query(sql, function (err, result) {
      if (err) throw err;
      console.log("Result: ", result);
      res.send("Éxécuté");
      });  

  });

  // app.get('/boutique', function (req, res) {
  //       con.connect(sqlConfig, function() {
  //           var request = new sql.Request();
  //           request.query('select * from article', function(err, recordset) {
  //               if(err) console.log(err);
  //               res.end(JSON.stringify(recordset)); // Result in JSON format
  //           });
  //       });
  //   })

  // var sql = "INSERT INTO articles (nom,prix) VALUES ?";
  // var values = [
  //   ['John', '71'],
  //   ['Peter', '4'],
  //   ['Amy', '652'],
  //   ['Hannah', '21'],
  //   ['Michael', '345'],
  //   ['Sandy', '2'],
  //   ['Betty', '1'],
  //   ['Richard', '31'],
  //   ['Susan', '98'],
  //   ['Vicky', '2'],
  //   ['Ben', '8'],
  //   ['William', '954'],
  //   ['Chuck', '989'],
  //   ['Viola', '1633']
  // ];

  // Start server and listen on http://localhost:8081/
// var server = app.listen(8081, function () {
//     var host = server.address().address
//     var port = server.address().port

//     console.log("app listening at http://%s:%s", host, port)
// });

// app.get()

// app.post()

    // app.get('/boutique', function (req, res) {
    //     sql.connect(sqlConfig, function() {
    //         var request = new sql.Request();
    //         request.query('select * from article', function(err, recordset) {
    //             if(err) console.log(err);
    //             res.end(JSON.stringify(recordset)); // Result in JSON format
    //         });
    //     });
    // })
    // app.get('/customers/:customerId/', function (req, res) {
    //     sql.connect(sqlConfig, function() {
    //         var request = new sql.Request();
    //         var stringRequest = 'select * from Sales.Customer where customerId = ' + req.params.customerId;
    //         request.query(stringRequest, function(err, recordset) {
    //             if(err) console.log(err);
    //             res.end(JSON.stringify(recordset)); // Result in JSON format
    //         });
    //     });
    // })
    // app.get('/customers/:customerId/orders', function (req, res) {
    //     sql.connect(sqlConfig, function() {
    //         var request = new sql.Request();
    //         request.input('CustomerId', req.params.customerId);
    //         request.execute('Sales.uspShowOrderDetails', function(err, recordsets, returnValue, affected) {
    //             if(err) console.log(err);
    //             res.end(JSON.stringify(recordsets)); // Result in JSON format
    //         });
    //     });
    // })