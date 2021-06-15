<?php
class About{
    public function index(){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        echo 'about/index';
    }
    public function page(){
        echo 'About/page';
    }
}