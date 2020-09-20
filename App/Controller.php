<?php
class Controller
{
	function errors($error_code)
	{
		include("../App/Views/errors.php");
	}
	function main()
	{
		include("../App/Model.php");
		$model = new Model();
		$data = $model->main();
		extract($data);
		include("../App/Views/main.php");
	}
}