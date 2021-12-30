<!doctype html>
<html lang="en">
  <head>
    <title>Check Weather</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    body{
        background-image:url('img/back.jpg');
        margin:0;
        padding:0;
        box-sizing:border-box;
        background-attachment: fixed;
        background-size:cover;
        background-size:large;

    .form-group{
        
        text-align:center;
        justify-content:center;
        width:440px;
        color:white;
        
    }    

    }
</style>  
</head>
  <body>
    
       
        <div class="container" style="margin-top:5rem;">
        
            <div class="form-group" style="text-align:center;color:white;">
            <h1 style="text-shadow: 2px 2px #1e9438;"><b>Search Global Weather</b></h1>
            <br>
              <!-- <label for="">Enter City Name</label> -->
              <input type="text" class="offset-md-3 col-sm-12 col-md-6 form-control" name="" id="input_val" placeholder="Enter City Name" style="padding:10px;">
              <br><input type="button" onclick='search();' value="Submit" style="border-radius:3px;background:none;padding:10px;font-weight:700;border:2px solid #1e9438;color:#1e9438;">
             
              <br><br>
              <div class="container" id="weather_info">
              
            </div>
            </div>
            
            
  </div>
            
            

      
    <script>
      function search(){
        // alert('ok');
        var input_value = document.getElementById('input_val').value;
        if(input_value){
            $.ajax({
              type:"GET",
              dataType:"json",
              url:'https://api.openweathermap.org/data/2.5/weather?q='+input_value+'&appid=f47937913e1def4dbf483343ed870497',
              success:function(data){ 
                       
                  var json = JSON.parse(JSON.stringify(data));
                  // alert(json);
                  var country = json.sys["country"];
                  var city = json.name;
                  var temperature1 = json.main["temp"] - 273;
                  var temperature= Number((temperature1).toFixed(1));
                  var weather_condition = json.weather[0]["main"];
                  var weather_description = json.weather[0]["description"];
                  var atmospheric_pressure = json.main["pressure"];
                  var wind_speed = json.wind["speed"];
                  var cloudness = json.clouds["all"];
                  var sunrise = json.sys["sunrise"];
                  var inf = "<div class='alert alert-info offset-md-3 col-sm-12 col-md-6 '>"+
                  "<b>"+city+", "+country+" : "+temperature+"&deg;C </b>"+
                  "<br><b> Condition : </b>"+weather_condition+
                  "<br><b> Description : </b>"+weather_description+
                  "<br><b> Atmospheric Pressure : </b>"+atmospheric_pressure+" hPa"+
                  "<br><b> Wind Speed : </b>"+wind_speed+" m/s"+
                  "<br><b> Cloudness : </b>"+cloudness+" %"+
      
                  "</div>";
            
            $("#weather_info").html(inf);
                
              },
              error: function(data){
                  var info = "<div class='alert alert-info offset-md-3 col-sm-12 col-md-6 '>No data found</div>";
            $("#weather_info").html(info);
                }
            });
        }
        else{
          var inf = "<div class='alert alert-info offset-md-3 col-sm-12 col-md-6 '>No data found</div>";
            $("#weather_info").html(inf);

        }
      }
      </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>