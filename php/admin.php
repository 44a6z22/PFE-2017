<?php 
function AdminLogin($Pseudo,$Pass){
            $PseudoUp = strtoupper($Pseudo);
              $sql = "select count(*) From users where Pseudo ='$PseudoUp' AND Password = '$Pass'";
            $email = mysql_query($sql) ;
            $data = mysql_fetch_array($email); // Put all data fetched in an array form
                if ( $data['count(*)']== 1 ) // calling our result as $variable['Column']
                {
                    $sqltype= "select Pseudo,type From users WHERE Pseudo ='$Pseudo' AND Password = '$Pass'";
                $Result= mysql_query($sqltype);
                $datafn = mysql_fetch_array($Result);

                     $type =  $datafn['type'];
                     $Pseudoo = $datafn['Pseudo'];
                    if($type == 'ADMIN' || $type =='SEMI-ADMIN'){

                        _sessionn('admin',$Pseudoo);
                    header('location:index.php');
                    }

                }else{
                   echo " <p align='center' > And you faild </p>";
                }
}
function UsersTable(){
    $sql ="Select Pseudo,id,type From users ";
    $rslt = mysql_query($sql);
    $up = "Up";
    $down = "Dg";
    $del = "DEL";
    echo"
        <table border='1'  >
        <th>UserName</th>
        <th>Type</th>
        <th colspan='3'>Action</th>
        ";
        while($data = mysql_fetch_array($rslt)){
        echo"<tr>
            <td value = {$data['id']}> <a href='../Profile.php?id={$data['id']}' class='links'>{$data['Pseudo']}</a></td>
            <td value = {$data['type']}> {$data['type']}</td>";
            if($data['type'] == "ADMIN" && $data['id'] == 1){

            }else if ($data['type'] == "ADMIN" && $data['id'] != 1){
                 echo"<td ><a class='adlinks' href='../actions/delete.php?id={$data['id']}'>{$del}</a></td>
                  <td ><a class='adlinks' href='../actions/Downgrade.php?id={$data['id']}'>{$down}</a></td>  ";
            }else if ($data['type'] == "SEMI-ADMIN" )
            {
             echo"<td ><a class='adlinks' href='../actions/delete.php?id={$data['id']}'>{$del}</a></td>
                  <td ><a class='adlinks' href='../actions/Upgrade.php?id={$data['id']}'>{$up}</a></td>
                  <td ><a class='adlinks' href='../actions/Downgrade.php?id={$data['id']}'>{$down}</a></td> ";

            }
            else{
                 echo"<td ><a class='adlinks' href='../actions/delete.php?id={$data['id']}'>{$del}</a></td>
                  <td ><a class='adlinks' href='../actions/Upgrade.php?id={$data['id']}'>{$up}</a></td> ";
            }
            echo"
        </tr>
         ";
        }
    echo "
        </table>
    ";
}
////////////////////// modifications
function supprimer($id){

  $sql="delete from users where id=$id;";
  mysql_query($sql) or die("Ereur".mysql_error());


}
function UpgradeUser($id){
    $sql1="select type from users where id = '$id'";
     $rslt = mysql_fetch_array(mysql_query($sql1));
    if($rslt["type"] == "SEMI-ADMIN"){
        $sql = "Update users set type = 'ADMIN' where id = '$id'";
    }
    else if ($rslt["type"] == "USER")
    {
         $sql = "Update users set type = 'SEMI-ADMIN' where id = '$id'";
    }


    mysql_query($sql);
}
function Downgrade($id){
    $sql="select type from users where id = '$id'";
    $rslt = mysql_fetch_array(mysql_query($sql));

    if ($rslt["type"] == "SEMI-ADMIN")
        $sql = "Update users set type = 'USER' where id = '$id'";
    else if ($rslt['type'] == "ADMIN")
        $sql = "Update users set type = 'SEMI-ADMIN' where id = '$id'";


    mysql_query($sql);
}

?>