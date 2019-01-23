var express = require('express'); // Web Framework
var app = express();
var mysql = require('mysql');

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


app.get('/:site/:table/:filtre/:condition/', function (req, res) {
  con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
    var sql ="SELECT * FROM " + req.params.table + " WHERE " +  req.params.filtre + " = '" + req.params.condition + " '";
    con.query(sql, function (err, result) {
      if (err) throw err;
      //console.log("Result: ", result);
      res.json(result);
      //res.json("58"+ req.path +"25")
    });
  });
});

app.post('/:site/:table/:filtre/:condition/', function (req, res){
  con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
    var sql ="INSERT INTO " + req.params.table + " (nom, prix, quantite) VALUES (edouart, 20, 10)";
    con.query(sql, function (err, result) {
      if (err) throw err;
      console.log("Result: ", result);
      res.json(result);
    });
  });
});

app.put('/:site/:table/:filtre/:condition/', function (req, res){
con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
  var sql ="UPDATE " + req.params.table + " SET " +  + "WHERE" +  req.params.filtre + " = '" + req.params.condition + " '";
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("Result: ", result);
    res.json(result);
  });
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