<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->library('pagination');
    }

    public function index()
    {

        $data = [];
        $total = $this->Kategori_model->getTotal();
        if ($total > 0) {
            $limit = 2;
            $start = $this->uri->segment(3, 0);
            $config = [
                'base_url' => site_url() . '/kategori/index',
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 3,
                // Bootstrap 3 Pagination
                'first_link' => '&laquo;',
                'last_link' => '&raquo;',
                'next_link' => 'Next',
                'prev_link' => 'Prev',
                'full_tag_open' => '<ul class="pagination">',
                'full_tag_close' => '</ul>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                'cur_tag_open' => '<li class="active"><span>',
                'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',
            ];
            $this->pagination->initialize($config);
            $data = [
                'title' => 'Katalog Barang :: Data Kategori',
                'kategori' => $this->Kategori_model->list($limit, $start),
                'links' => $this->pagination->create_links(),
            ];
        }

        
        $this->load->view('kategori/index', $data);
    }

    public function create()
    {
        $error = array('error' => ' ' );
        $this->load->view('kategori/create', $error);
    }

    public function store()
    {
        // Ambil value 
        $jabatan = $this->input->post('kategori');

        // Validasi
        $dataval = $kategori;
        $errorval = $this->validate($dataval);

        // Pesan Error atau Upload
        if ($errorval==false)
        {
            
            // Insert data
            $data = [
                'kategori' => $kategori,
                ];
            $result = $this->Kategori_model->insert($data);
            
            if ($result)
            {
                redirect(kategori);
            }
            else
            {
                $error = array('error' => 'Gagal');
                $this->load->view('kategori/create', $error);
            }
        }
        else
        {
            $error = ['error' => validation_errors()];
            $this->load->view('kategori/create', $error);
        }
    }

    public function edit($id_kategori,$error='')
    {
      // TODO: tampilkan view edit data
        $kategori = $this->Kategori_model->show($id_kategori);
        $data = [
            'data' => $kategori,
            'error' => $error
        ];
        $this->load->view('kategori/edit', $data);
      
    }

    public function update($id_kategori)
    {
        //Ambil Value
        $id_kategori=$this->input->post('id_kategori');
        $kategori = $this->input->post('kategori');

        // Validasi
        $dataval = $kategori;
        $errorval = $this->validate($dataval);

        if ($errorval==false)
        {
            $data = [ 'kategori' => $this->input->post('kategori') ];
            $result = $this->Kategori_model->update($id_kategori,$data);

            if ($result)
            {
                redirect('kategori');
            }
            else
            {
                $data = array('error' => 'Gagal');
                $this->load->view('kategori/edit', $data);
            }
        }
        else
        {
            $error = validation_errors();
            $this->edit($id_kategori,$error=' ');
        }

        
    }

    public function destroy($id_kategori)
    {
        $kategori = $this->Kategori_model->show($id_kategori);
        $data = [ 'data' => $kategori ];
        $this->Kategori_model->delete($id_kategori);
        redirect('kategori');
    }

    public function validate($dataval)
    {
        // Validasi
        $this->form_validation->set_rules('kategori','Kategori','trim|required|callback_alpha_space');

        if (! $this->form_validation->run())
        { return true; }
        else
        { return false; }
    } 

    public function alpha_space($str)
    {
        return ( ! preg_match("/^([a-z ])+$/i", $str)) ? FALSE : TRUE;
    }
}