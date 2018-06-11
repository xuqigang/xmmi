<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class index_v1 extends CI_Controller {
    public function index() {
        $this->json([
            'code' => 0,
            'data' => [
                'msg' => 'Hello World'
            ]
        ]);
    }
}
?>
