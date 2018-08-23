<?php

function updateuser($id,$fullname,$pass,$Email,$City){
    $sql="UPDATE Users Set Full_Name = '$fullname' ,Password ='$pass' ,Email = '$Email' ,City_id = $City WHERE id = $id ";
    mysql_query($sql) or die("Ereur synatax".mysql_error());
    header('location:../profile.php');
  }

function AddUser($pseudo,$fullname,$pass,$Email,$City,$Age,$SQ,$QR){
    $Pesudoupper = strtoupper($pseudo);
    $sql="insert into Users (id,Full_Name,Pseudo,Password,Email,SecurityQestion,SQAnswer,City_id,age) values(NULL,'$fullname','$Pesudoupper','$pass','$Email','$SQ','$QR','$City',$Age);";
    mysql_query($sql) or die("Ereur synatax".mysql_error());
}
function check_email($email){// and it doesn't work correctly :)
    $sql = "select id from users where Email = '$email';";
    $result = mysql_query($sql) or die("ereur syntax".mysql_error()) ;
     while ( $data = mysql_fetch_array($result)){
       header("location:changePass.php?id={$data['id']}");
     }
}
function _sessionn($var,$fn){
    $_SESSION["$var"] = $fn;
}
function login($Pseudo,$pass){
            $PseudoUp = strtoupper($Pseudo);
            $sqlname = "select count(*) From users where Pseudo ='$PseudoUp' AND Password = '$pass'";
            $email = mysql_query($sqlname) ;
            $data = mysql_fetch_array($email); // Put all data fetched in an array form
                if ( $data['count(*)']== 1 ) // calling our result as $variable['Column']
                {
                    $sqlFN= "select Pseudo From users WHERE Pseudo ='$Pseudo' AND Password = '$pass'";
                $Result= mysql_query($sqlFN);
                $datafn = mysql_fetch_array($Result);

                     $fn =  $datafn['Pseudo'];
                    $mounth = 60*60*24*30;
                    setcookie('username', $fn , time() + $mounth);
                    _sessionn('username',$fn);
                    header('location:home.php');
                }else{
                   echo "
                   <p align='center' >
                     it seems like your not a mumber of our comunity
                        <p  align='center' class='links' >
                            You can Sign up From
                                <a href='Inscription.php' >Here </a>
                        </p>
                   </p>";
                }
}
function showd($Pseudo){
    $sql = "select * from users where Pseudo = '$Pseudo'";
    $result = mysql_query($sql);
    $data = mysql_fetch_array($result);
        echo "
        <ul class ='Userinfo'>
            <li> Name        : {$data['Full_Name']} </li>
            <li> Email       : {$data['Email']}     </li>
            <li> Age         : {$data['age']}       </li>
        </ul>
        ";
}
function citys(){
    $result = mysql_query("select * From city");
    while($data = mysql_fetch_array($result)){
        echo"<option value = {$data['City_id']}> {$data['City_name']}</option>";
    }
}

function Age(){$i = 18 ;
    echo"<select name='Age'  class='form_select form_control' >
            <option>Age</option>";

    while($i<100){
        echo"<option value = '$i'> $i </option>";
        $i++;
    }
    echo"</select>";
}
function change_password($pass,$pseudo){
    $password = md5($pass);
    $sql = "Update users set Password = '$password' where id = '$pseudo'";
    mysql_query($sql);
    header("location:index.php");

}
function all_members(){
     $sql ="select id ,Pseudo From users ";
            $result = mysql_query($sql);
            while($data = mysql_fetch_array($result)){
                $id = $data['Pseudo'];
                echo" <a href='Profile.php?id=".$id."' > {$data['Pseudo']} <a> <br> ";
            }
}
function disconected($id){
            session_destroy();
            setcookie('username' ,$id ,time() - 60*60*24*30);
            header('location:index.php');
}
/////////////////// NEWS (Admin Controls XD :V)

function lastone($id){
    $query = "select GameId From Played where UserId = '$id' order by PlayId desc";
    $data = mysql_fetch_array(mysql_query($query));
    $query1 = "SELECT GameName FROM games WHERE GameId = '{$data['GameId']}'";
    $data1 = mysql_fetch_array(mysql_query($query1));
    if(!$data1['GameName'] == "")
  echo"{$data1['GameName']}";
    else
        echo"Not Played yet ";

}
function hightscore($id,$game){
    $query1 = "SELECT GameId FROM games WHERE GameName = '$game'";
    $data1 = mysql_fetch_array(mysql_query($query1))  or die("".mysql_error());
    $query = "SELECT HighScore FROM Played WHERE UserId = '$id' AND GameId = '{$data1['GameId']}' ORDER BY HighScore desc";
    $data = mysql_fetch_array(mysql_query($query))  or die("Nothing to show yet".mysql_error());
    if( isset($data['HighScore']))
    echo"{$data['HighScore']}";
    
}
function SecQuestion($id){
    $sql = "Select SecurityQuestion FROM users WHERE id = ' $id'";
    $req = mysql_fetch_object(mysql_query($sql));
    echo"{$req['SecurityQuestion']}";
}


 ?>
