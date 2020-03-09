<?php
 session_start();
 include 'library/configServer.php';
 include 'library/consulSQL.php';

	$info = array('DARWIN');											
	$consultaC=ejecutarSQL::consultar("select * from areas");
	$upp=0;
	 while($conC=mysql_fetch_array($consultaC))
		{ 
			$info[$upp] =$conC['nombre'];
			$upp+=1;
		}
		
    $info2 = array('DARWIN');											
	$consultaC=ejecutarSQL::consultar("select * from roles");
	$upp=0;
	 while($conC=mysql_fetch_array($consultaC))
		{ 
			$info2[$upp] =$conC['nombre'];
			$upp+=1;
		}
		
?>



<!DOCTYPE html>
<html lang="es">

    <head>
    <title>Registro</title>
	<?php include './php/link.php'; ?>
	
    <script type="text/javascript" src="js/bootstrap-sortable.js"></script>
    <link rel="stylesheet" href="css/bootstrap-sortable.css">
    <link rel="stylesheet" href="css/datepicker.css">
    <script type="text/javascript" src="js/admin.js"></script>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <script type="text/javascript" src="js/typed.js"></script>

    <link rel="stylesheet" href="css/bootstrap-select.css">
    <script src="js/bootstrap-select.js"></script>

    <script src="js/bootstrap-colorselector.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-colorselector.css" />
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.es.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/push.js"></script>
		
       
  <meta charset="ISO-8859-1">
<style>
* {
  box-sizing: border-box;
}

body {
  font: 16px Arial;  
}

/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #ffffff;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #ffffff;
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>

<script>
	$(function() {
	 var spge= <?php echo json_encode($info); ?>;	
	 pacientes = spge;
	 var x = autocomplete(document.getElementById("emp-familiar"), pacientes);
	
});
</script>;


<script type="text/javascript">
      $(function() {
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

        $('#datepicker').datepicker({
          format: "yyyy-mm-dd",
          language: "es",
          autoclose: true,
          endDate: '+0d',
        });

        $('#datepicker1').datepicker({
          format: "yyyy-mm-dd",
          language: "es",
          autoclose: true,
          endDate: '+0d',
        });
		
		//var x = autocomplete(document.getElementById("emp-familiar"), pacientes);
      });



function autocomplete(inp, arr) {

  var currentFocus;
 
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      this.parentNode.appendChild(a);
      for (i = 0; i < arr.length; i++) {
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          b = document.createElement("DIV");
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          b.addEventListener("click", function(e) {
              inp.value = this.getElementsByTagName("input")[0].value;
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        currentFocus++;
        addActive(x);
      } else if (e.keyCode == 38) { //up
        currentFocus--;
        addActive(x);
      } else if (e.keyCode == 13) {
        e.preventDefault();
        if (currentFocus > -1) {
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    if (!x) return false;
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
var pacientes = ["Admin"];

 $('#datepicker').datepicker('setDate', 'now');
 $('#datepicker1').datepicker('setDate', 'now');
</script>

</head>

    <body id="container-page-registration">
        <?php include './php/navbar.php'; ?>
        <section id="form-registration">
            <div class="container">
                <div class="row">
                    <div class="page-header" aling="text-center">
                        <h2><small class="tittles-pages-logo">REGISTRO DE EMPLEADOS</small></h2>
                    </div>
                    <div class="col-xs-12 col-sm-6 text-center">
                        <br><br><br>
                        <p><i class="fa fa-users fa-5x"></i></p>
                        <p class="lead">
                            Al registrarse recibirá notificaciones de su proceso como soporte.
                        </p>
                        <br>
                        <img src="assets/img/registro2.png" alt="" class="img-responsive">
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="container-form">
                            <p style="color:#fff;" class="text-center lead">Deberá de llenar todos los campos para registrarse</p>
                            <br><br>
                            <form class="form-horizontal FormCatElec" action="process/regempleados.php" role="form" method="post" data-form="save">
                               
                              
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su nombre completo" required name="emp-name" data-toggle="tooltip" data-placement="top" title="Ingrese su nombre de usuario. Máximo 9 caracteres (solamente letras)"
                                            pattern="[a-zA-Z]{1,9}" maxlength="50">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-at"></i></div>
                                        <input class="form-control all-elements-tooltip" type="email" placeholder="Ingrese su email" required name="emp-email" data-toggle="tooltip" data-placement="top" title="Ingrese la dirección de su Email" maxlength="50">
                                    </div>
                                </div>
							   <br>
						      <p style="color:white">¿GENERO?</p>
							  <div class="radio">
								<label style="color:white">
								<input type="radio" name="optionsRadios" value="option1" checked>
								Masculino
								</label>
							  </div>
							  <div class="radio" style="color:white">
								<label>
								<input type="radio" name="optionsRadios" value="option2">
								 Femenino
								</label>
							  </div>
							   
							   <br>
								 <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                       <select class="form-control all-elements-tooltip" id="emp-area" required name="emp-area" data-toggle="tooltip" data-placement="top" title="Ingrese area">
									   <option value="" selected="selected" disabled>Seleccione Area</option>
										<?php
										 for ($i=0; $i<count($info); $i++)
										 {   $res+=1;
											 echo '<option value="'. $res.'">'.$res.'-'.$info[$i].'</option>';
										 }
										?>

									  </select>
                                    </div>
                                </div>
								
								<br>
								 <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-smile-o"></i></div>
                                        <textarea style="height:100px; cols:40; rows:10" class="form-control all-elements-tooltip" type="text" placeholder="Ingrese la descripcion" required name="emp-descripcion" data-toggle="tooltip" data-placement="top" title="Ingrese la Observacion" maxlength="700"></textarea>
                                    </div>
                                </div>
								<br>
								<div class="form-check">
								<input type="checkbox" class="form-check-input"  name="emp-bolinf" id="emp-bolinf" value="0">
									<label class="form-check-label" for="emp-bolinf" style="color:white">Deseo recibir boletin informativo</label>
								</div>
								<br>
								   <p style="color:white">¿ROLES?</p>
								   <div class="form-check">
								   <?php 
								   for ($i=0; $i<count($info2); $i++)
								   {
									echo '<input type="checkbox" class="form-check-input" name="emp-prof'.$i.'" id="emp-prof'.$i.'" value="'.$i.'">
										<label class="form-check-label" for="emp-prof'.$i.'" style="color:white">'.$info2[$i].'</label>
									  <br>';
								   }
								?>
								<br>
                                <p><button type="submit" class="btn btn-success btn-block"><i class="fa fa-pencil"></i>&nbsp; Registrarse</button></p>
                                <div class="ResForm" style="width: 100%; color: #fff; text-align: center; margin: 0;"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include './php/footer.php'; ?>
    </body>

</html>
