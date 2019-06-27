<?php

require APPPATH . '/libraries/REST_Controller.php';
Class Silsilah Extends REST_Controller{
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
    
    // untuk menampilkan data
    function index_get(){
        $id = $this->get('id');
        if ($id == '') {
            $data = $this->db->get('silsilahkeluarga')->result();
        } else {
            $this->db->where('id', $id);
            $data = $this->db->get('silsilahkeluarga')->result();
        }
        return $this->response($data,200);
    }
    
    // untuk mengirim data
    function index_post(){
        $id             = $this->post('id');
        $nama           = $this->post('nama');
        $jenis_kelamin  = $this->post('jenis_kelamin');
        $anak           = $this->post('anak');
        $cucu           = $this->post('cucu');
        
        $keluarga = array(
                    'id'            => $id,
                    'nama'          => $nama,
                    'jenis_kelamin' => $jenis_kelamin,
                    'anak'          => $anak,
                    'cucu'          => $cucu);

        $insert = $this->db->insert('silsilahkeluarga',$keluarga);
        
        if($insert){
            $this->response($keluarga,200);
        }else{
            $data = array ('status'=>'gagal insert');
            $this->response($data,502);
        }
    }
    
    function index_put(){
        // parameter yang dikirimkan oleh client
        $id             = $this->put('id');
        $nama           = $this->put('nama');
        $jenis_kelamin  = $this->put('jenis_kelamin');
        $anak           = $this->put('anak');
        $cucu           = $this->put('cucu');
        // menyimpan data dalam bentuk array
        $keluarga = array(
                    'id'            => $id,
                    'nama'          => $nama,
                    'jenis_kelamin' => $jenis_kelamin,
                    'anak'          => $anak,
                    'cucu'          => $cucu);
        // update berdasarkan sibn sebagai parameter
        $this->db->where('id',$id);
        $update = $this->db->update('silsilahkeluarga',$keluarga); 
        // chek apakah update nya berhasil atau gagal
        if($update){
            $this->response($keluarga,200);
        }else{
            $data = array ('status'=>'gagal insert');
            $this->response($data,502);
        }
    }
    
    function index_delete(){
        $id= $this->delete('id');
        $keluarga = $this->db->get_where('silsilahkeluarga',array('id'=>$id));
        if($keluarga->num_rows()>0){
            // delete data
            $this->db->where('id',$id);
            $this->db->delete('silsilahkeluarga');
            $data = array('status'=>'Berhasil Delete Nama Keluarga Dengan id : '.$id);
            $this->response($data,200);
        }else{
            $data = $data = array('status'=>'Nama Keluarga dengan id: '.$id.' Tidak Ditemukan');
            $this->response($data,200);
        }
    }
}
?>
