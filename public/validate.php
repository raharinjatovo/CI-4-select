<?php

if(filter_var($_POST["query"], FILTER_VALIDATE_EMAIL))
{








     echo '<input type="mail" id="country" class="form-control is-valid" id="validationServer01"  >
      ';
}
else
{
	echo '<input type="mail" id="country" class="form-control" id="validationServer01"  >
   ';
}


 ?>
