<?php

class Kabupaten_model extends CI_Model
{
    private $_table = "kabupaten";

    public function get_all_kabupaten()
    {
        return $this->db->get($this->_table)->result();
    }

   
}
