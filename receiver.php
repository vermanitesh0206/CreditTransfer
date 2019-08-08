<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>

<style>

    * {
        margin: 0px;
        padding: 0px;
    }
    body{
            position: relative;
            box-sizing: border-box;
            padding: 0%;
            margin: auto;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 700;
            font-family: Poppins-Bold;
            text-shadow: 0 1px 1px #1f1c18;
            width:100%;
            height: auto;
            background-repeat:no-repeat;
            background-size: cover;
            background-image:url(images/money-transfer.jpg);
           
            
    }

    .popup { 
            position: fixed; 
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
            
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 65%;
            background: linear-gradient(-39deg, rgb(0, 204, 255), rgb(231, 136, 250));
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.671), 0 6px 20px 0 rgba(0, 0, 0, 0.678);
             /* Could be more or less, depending on screen size */
        }

        #pkg {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #pkg td, #pkg th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #pkg tr:nth-child(even){background-color: #f2f2f2;}

        #pkg tr:hover {background-color:#e9afab;}

        #pkg th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #605df7;
            color: white;
        }

        #head{
            text-align:center;
            color:#353535;
            padding:20px;
            margin:10px;
            text-decoration: underline;
        }

         img{
            width:100%;
            height: auto;
            filter: blur(2px) brightness(150%) saturate(100%);
           
        }

        input{
            border:none;
            border-radius:20px;
            color:#353535;
            padding:9px;
            margin:20px;
            text-align:center;
        }

        .input{
            text-align:center;
            position:relative;
            bottom:70px;
        }

        button{
            border:none;
            border-radius:10px;
            color:#000000;
            background: #ff33ff;
            padding:9px;
            margin:20px;   
        }
        button:hover{
            color:black;
            background-color: rgb(17, 247, 197);
            cursor: pointer;
        }
        .input .inp{
            cursor: not-allowed;
        }

        


</style>
  
    <img src="pic.jpg" >
<div id= "modal" class="popup">  
       
        <div class="modal-content">
            
            <h3 id="head">Select Reciever</h3>
              
        <table id="pkg">
            <tr>
                <th>Email</th>
                <th>Name</th>
                <th>Credits</th>
                <th>Click</th>
            </tr> 

            <?php 
                 
              $username = "";
             // $email    = "";
              $errors = array(); 
              $email=$_POST["email"];
              $name=$_POST["name"];
              $credit=$_POST["credit"];
              // connect to the database
              $db = mysqli_connect('localhost', 'root', '', 'Credit_Management');

              
                  $sql= "select * from user where email <> '$email';";
                  $results = mysqli_query($db, $sql);
                  if (mysqli_num_rows($results) > 0)
                  {
                      while($row= mysqli_fetch_assoc($results))
                      {
                        $_email=$row["email"];
                        $_name=$row["name"];
                        $_credit=$row["credit"];
                          echo 
                          "<tr>
                          <td>$row[email]</td>
                          <td>$row[name]</td>
                         <td>$row[credit]</td>
                         <td>
                              <form method='post' action='payment.php'>
                              <input type='Hidden' name='sender' value='$email'/>
                                  <input type='Hidden' name='email' value='$_email'/>
                                  <input type='Hidden' name='name' value='$_name'/>
                                  <input type='Hidden' name='credit' value='$_credit'/>
                                  <button><b> Select <b></button>
                              </form>
                          </td>
                      </tr>";
                        }
                      echo "</table>";  

                  }            

                  else{
                      array_push($errors, "Connection Error");
                  }

              mysqli_close($db);
            ?> 
            
            <div style="margin-top:100px;"></div>
            <form class="input" method="post" action="creditHome.php">
                <button><b>Home<b></button>
            </form>
            
            </div>
    </div>


</body>
</html>