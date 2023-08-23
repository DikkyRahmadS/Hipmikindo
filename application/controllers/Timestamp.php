<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Timestamp extends CI_Controller
{

    public function index(){
        date_default_timezone_set('Asia/Jakarta');
         date('H:i:s');
    }

}

?>