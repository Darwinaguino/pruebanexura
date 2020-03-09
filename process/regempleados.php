<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

 session_start();


sleep(3);

$nombre= $_POST['emp-name'];
$correo= $_POST['emp-email'];
$radio=$_POST['optionsRadios'];

 if($radio=="option1"){
	 $radio="M";
 }else {
	 $radio="F";
 }

$area=$_POST['emp-area'];
$descripcion=$_POST['emp-descripcion'];	
$recBolInformativo=$_POST['emp-bolinf'];	




  if(empty($recBolInformativo)) 
  {
   $recBolInformativo=0;
  } 
  else 
  {
      $recBolInformativo=isset($_POST['emp-bolinf']);
  }
    $info2 = array('a');											
	$info3 = array('');											
	
	$consultaC=ejecutarSQL::consultar("select * from roles");
	$upp=0;
	 while($conC=mysql_fetch_array($consultaC))
		{ 
			$info2[$upp] =$conC['nombre'];
			$upp+=1;
		}
$c=0;
for($i=0; $i<$upp; $i++)
{ if($_POST['emp-prof'.$i]==$i) 
	{   $info3[$c]= $info2[$i];
        $c+=1;
	}
}		

//bhernandez@nexura.com
//git@gitlab.com:batwin2005/pruebasnexura.git
$hoy = date("Y-m-d H:i:s");   


//echo '1)'.$nombre. '<br>2)'. $correo. '<br>3)'. $radio. '<br>4)'. $area. '<br>5)'. $descripcion. '<br>6)'.$recBolInformativo.'<br>7)'.$info3[0];


if(!$nombre=="" && !$correo==""&&!$area=="0"&&!$descripcion==""){
    $verificar=  ejecutarSQL::consultar("select * from empleados where email='".$correo."'");
    $verificaltotal = mysql_num_rows($verificar);
    $hoy = date("Y-m-d H:i:s");   

   if($verificaltotal<=0){
	   for($i=0; $i<$c; $i++){
        if(consultasSQL::InsertSQL("empleados", "nombre, email, sexo, area_id, boletin, descripcion", "'$nombre','$correo','$radio','$area','$recBolInformativo','$info3[$i]'")){
              if($i==0)echo '<img src="assets/img/ok.png" class="center-all-contens"><br>El registro se completo con éxito';
        }else{
               echo '<img src="assets/img/error.png" class="center-all-contens"><br>Ha ocurrido un error.<br>Por favor intente nuevamente'; 
       }
	   }
    }
}else {
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>Error los campos no deben de estar vacíos';
}



		