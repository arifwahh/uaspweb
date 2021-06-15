<?php
class Home extends Controller {
    public function index(){
       $this->view('home/index');
    }
    public function gagal(){
        $data['pesan'] ='gagal';
        $this->view('home/index',$data);
     }
    public function ceklogin(){
        $this->view('home/ceklogin');
     }
}