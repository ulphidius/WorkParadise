<?php
	if( !empty($_SESSION["errors_form"]) ){
		echo "<ul>";
		foreach ($_SESSION["errors_form"] as $value) {
			echo "<li>".$listOfErrors[$value];
		}
		echo "</ul>";

		unset($_SESSION["errors_form"]);

		$dataForm = $_SESSION["data_form"];

	}