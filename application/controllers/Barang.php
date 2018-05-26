<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
        $this->load->library('pagination');
        $this->load->helper('form');
        $this->load->helper('url');

        // Konfigurasi Upload
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['max_width']            = 800;
        $config['max_height']           = 800;

        $this->load->library('upload', $config);
    }

    public function index()
    {

        $search = ($this->input->post("nama"))? $this->input->post("nama") : "NIL";

        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        $data = [];
        $total = $this->Barang_model->getTotal($search);
        if ($total > 0) {
            $limit = 2;
            $start = $this->uri->segment(4, 0);
            $config = [
                'base_url' => site_url() . '/barang/index',
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 4,
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
                'title' => 'Katalog Baju :: Data Baju',
                'barang' => $this->Barang_model->list($limit, $start,$search),
                'links' => $this->pagination->create_links(),
            ];
        }
        
        $this->load->view('barang/index', $data);
    }

    public function create($error='')
    {
        $kategori = $this->Kategori_model->list();
        $data = [
            'error' => $error,
            'data' => $kategori
        ];
        $this->load->view('barang/create', $data);
    }

    public function show($id_barang)
    {
        $barang = $this->Barang_model->show($id_barang);
        $data = [
            'data' => $barang
        ];
        $this->load->view('barang/show', $data);
    }
    
    public function store()
    {
        // Ambil value 
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');

        // Validasi 
        $dataval = $nama;
        $errorval = $this->validate($dataval);

        // Pesan Error atau Upload
        if ($errorval==false)
        {
            // Percobaan Upload
            if ( ! $this->upload->do_upload('foto'))
            {
                $error = $this->upload->display_errors();
                $this->create($error);
            }
            else
            {
                // Insert data
                $data = [
                    'nama' => $nama,
                    'id_kategori' => $kategori,
                    'foto' => $this->upload->data('file_name')
                    ];
                $result = $this->Barang_model->insert($data);
                
                if ($result)
                {
                    redirect(barang);
                }
                else
                {
                    $error = array('error' => 'Gagal');
                    $this->load->view('barang/create', $error);
                }
            }
        }
        else
        {
            $error = validation_errors();
            $this->create($error);
        }
    }

    public function edit($id_barang,$error='')
    {
      // TODO: tampilkan view edit data
        $barang = $this->Barang_model->show($id_barang);
        $kategori = $this->Kategori_model->list();
        $data = [
            'data' => $barang,
            'datakat' => $kategori,
            'error' => $error
        ];
        $this->load->view('barang/edit', $data);
      
    }

    public function update($id_barang)
    {
        //Ambil Value
        $id_barang=$this->input->post('id_barang');
        $nama = $this->input->post('nama');
        $id_kategori=$this->input->post('id_kategori');

        // Validasi Nama dan Jabatan
        $dataval = [
            'nama' => $nama,
            'kategori' => $kategori
            ];
        $errorval = $this->validate($dataval);

        if ($errorval==false)
        {
            if ( ! $this->upload->do_upload('foto'))
            {
                $data = [
                    'nama' => $nama,  
                    'id_kategori' => $kategori
                    ];
                $result = $this->Barang_model->update($id_barang,$data);

                if ($result)
                {
                    redirect('barang');
                }
                else
                {
                    $data = array('error' => 'Gagal');
                    $this->load->view('barang/edit', $data);
                }
            }
            else
            {
                $data = [
                    'nama' => $nama,
                    'id_kategori' => $kategori,
                    'foto' => $this->upload->data('file_name')
                    ];
                $result = $this->Barang_model->update($id_barang,$data);
                
                if ($result)
                {
                    redirect('barang');
                }
                else
                {
                    $data = array('error' => 'Gagal');
                    $this->load->view('barang/edit', $data);
                }
            }
        }
        else
        {
            $error = validation_errors();
            $this->edit($id_barang,$error);
        }

        
    }

    public function destroy($id_barang)
    {
        $barang= $this->Barang_model->show($id_barang);

        unlink('./assets/uploads/'.$barang->foto);
        
        $this->Barang_model->delete($id_barang);

        redirect('barang');
    }

    public function validate($dataval)
    {
        // Validasi Nama dan Jabatan
        $rules = [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ]
          ];

        $this->form_validation->set_rules($rules);

        if (! $this->form_validation->run())
        { return true; }
        else
        { return false; }
    } 
}

/* End of file Controllername.php */
