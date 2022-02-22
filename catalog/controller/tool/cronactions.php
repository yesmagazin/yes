<?php
class ControllerToolCronactions extends Controller {
    private $error = array();

    public function index() {
        die( 'There is nothing to see))' );
    }

    public function reasignProducts() {
        $this->load->model('tool/cronactions');
        $this->model_tool_cronactions->reasignProducts();
        exit(1);
    }
}
