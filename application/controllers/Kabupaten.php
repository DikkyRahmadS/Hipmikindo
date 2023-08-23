<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kabupaten extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Kabupaten_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		if ($this->session->userdata('logged') != TRUE) {
			$url = base_url('login');
			redirect($url);
		};
	}

	public function banyuasin()
	{
		$data['banyuasin'] = $this->Kabupaten_model->get_all_kabupaten();
        $data['profillama'] = $this->all_model->get_profil();
        $data['kabupaten'] = $this->all_model->tampil_data_kabupaten();


        $filterKabupatenId = $this->input->get('filterKabupatenId', true);
        $data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

        $filterKabupaten = $this->input->get('filterKabupaten');
        $kabupatenId = '';

        if ($filterKabupaten) {
            // Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
            $kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
        }

        if ($kabupatenId) {
            $data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
            $config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
        } else {
            $data['kuliner'] = $this->all_model->display_records();
        }
		$this->load->view('kabupaten/banyuasin', $data);
	}

	
}
