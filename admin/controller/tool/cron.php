<?php
//require_once 'export_import.php';
class ControllerToolCron extends Controller {
	$this->model_tool_export_import->upload("/upload_import/products.xlsx", true);
}

?>