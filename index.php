<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>GK RESTURENT</title>
    <style>
        #restaurant{
            margin-top:15px;
            margin-left: 15px;
        }

        #info{
            margin-top:50px;
            
        }

        h3:hover{
            background-color:purple;
            margin-right: 30%;
        }

    </style>
</head>
<body style="background-image:url(im3.jpg);">
         <h1 style="text-align:center; margin-top:10px; color:cyan">WELCOME TO GK RESTURENT</h1>
         <h2 style="margin-left: 30px; color:darkorchid; margin-top:50px;">Please select the Menu</h2>
        <!--<select id="restaurant" name="locality">
         </select> -->
         <div class="form-group col-md-4">
            <label for="inputState">MENU ITEMS</label>
            <select id="restaurant" class="form-control">
              
            </select>
          </div>
         <diV id="info">
         <h2 style="margin-left: 40%; color:deeppink"><i>Selected Menu Detail Information</i></h2><br>
         <h3 style="color:orange;margin-left:40%">Item Name: <span id="Name" style="color:red;"></span></h3><br> 
         <h3 style="color:yellow;margin-left:40%">ShortName: <span id="short" style="color: chartreuse;"></span></h3><br>
         <h3 style="color:rgb(68, 0, 255);margin-left:40%;margin-right: 100px;">Description: <span id="des"style="color:red;"></span></h3><br><br>
         <h3 style="color:red;margin-left:40%">Price Small: <span id="prices" style="color: chartreuse;"></span></h3><br>
         <h3 style="color:orangered;margin-left:40%;">Price Large: <span id="pricel" style="color: chartreuse;"></span></h3><br>
         </diV> 
     
       <script src="jquery-3.5.1.min.js"></script>
    <script>
        let base_url = "https://travelchar.000webhostapp.com/test/menu.php/";
       // let menu_items = null;
       let dropdown = $('#restaurant');
      

       dropdown.empty();

        dropdown.append('<option  selected="true" disabled>Select the Item</option>');
        dropdown.prop('selectedIndex', 0); 
         //let menu_items=null;
        $("document").ready(function(){
            getMenuNameList();
           
        });

        function getMenuNameList() {
            let url = base_url + "?req=name_list";
            $.get(url,function(data,status){
                console.log(data.length);
                console.log(data);
                $.each(data, function (key, entry) {
                 dropdown.append($('<option></option>').attr('value', entry.abbreviation).text(entry.name));
              })
            });
        }

        document.querySelector("#restaurant").addEventListener("change",getMenuByName);

        function getMenuByName(e) {
           let name=e.target.value;
            let url = base_url + "?req=menu_data&name="+name;
            $.get(url,function(data,success){
               
        
              
               document.querySelector("#Name").textContent = data.name;
               document.querySelector("#short").textContent = data.short_name;
               document.querySelector("#des").textContent = data.description;
               document.querySelector("#prices").textContent = data.price_small;
               document.querySelector("#pricel").textContent = data.price_large;
               
              //  console.log(data.name);
               // console.log(data.short_name);
               
               
            });
        }
    </script>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>