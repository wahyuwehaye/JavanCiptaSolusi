<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_master extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
	    parent::__construct();
	    $this->load->library('session');
	    $this->load->model('M_master','master');
    }

	public function index() {
		$this->load->helper('url');
		$data['users']=$this->master->get_data_users();
		$this->load->view('users', $data);
	}

    public function ceknama($id){
        $query = $this->db->query('SELECT * FROM silsilahkeluarga where id = "'.$id.'" LIMIT 1');
        $row = $query->row();
        echo $row->name;
    }

    public function ajax_list()
    {
        $list = $this->master->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $status = '';
        foreach ($list as $master) {
        	if ($master->jenis_kelamin=="L") {
            	$status= "Laki-laki";
            }else{
            	$status= "Perempuan";
            }
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $master->nama;
            $row[] = $status;
            $row[] = $master->anak;
            $row[] = $master->cucu;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_master('."'".$master->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_master('."'".$master->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->master->count_all(),
                        "recordsFiltered" => $this->master->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function master_edit($id) {
		$data = $this->master->get_by_id($id);
		echo json_encode($data);
	}

	public function master_add() {
		$data = array(
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'anak' => $this->input->post('anak'),
                'cucu' => $this->input->post('cucu'),
			);
		$insert = $this->master->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function master_update() {
			$data = array(
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'anak' => $this->input->post('anak'),
                'cucu' => $this->input->post('cucu'),
			);
		
		$this->master->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function master_delete($id) {
		$this->master->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('username') == '')
        {
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'Username Harus Diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('password') == '')
        {
            $data['inputerror'][] = 'password';
            $data['error_string'][] = 'Password Harus Diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('activating_status') == '')
        {
            $data['inputerror'][] = 'activating_status';
            $data['error_string'][] = 'activating_status Harus Dipilih';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate1()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('username') == '')
        {
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'Username Harus Diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('activating_status') == '')
        {
            $data['inputerror'][] = 'activating_status';
            $data['error_string'][] = 'activating_status Harus Dipilih';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


}
