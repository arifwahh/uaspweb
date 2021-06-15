<?php

class Admin extends Controller{
    public function index(){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $this->view('templates/header',$data);
        $this->view('admin/index');
        $this->view('templates/footer');
    }
    public function infoKPSPAMS(){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $this->view('templates/header',$data);
        $this->view('admin/infoKPSPAMS');
        $this->view('templates/footer');
    }
    public function tambahpelanggan(){
        $gagal['pesan'] ='gagal';
        $sukses['pesann'] ='sukses';
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $this->view('templates/header',$data);
        $this->view('admin/tambahpelanggan',$gagal,$sukses);
        $this->view('templates/footer');
    }
    public function addpelanggan(){
        $this->view('admin/addpelanggan');
     }
     public function editpelanggan($id){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $data['id']=$id;
        $this->view('templates/header',$data);
        $this->view('admin/editpelanggan',$data);
        $this->view('templates/footer');
    }
    public function updatepelanggan(){
        $this->view('admin/updatepelanggan');
     }
     public function hapuspelanggan($id){
        $data['id']=$id;
        $this->view('admin/hapuspelanggan',$data);
     }
     public function cetakkartupelanggan($id){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $data['id']=$id;
        $this->view('templates/header',$data);
        $this->view('admin/cetakkartupelanggan',$data);
        $this->view('templates/footer');
     }
     public function printkartumeter($id){
        $data['id']=$id;
        $this->view('admin/printkartumeter',$data);
     }
     public function tambahinventaris(){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $this->view('templates/header',$data);
        $this->view('admin/tambahinventaris',$data);
        $this->view('templates/footer');
     }
     public function addinventaris(){
        $this->view('admin/addinventaris');
     }
     public function editinventaris($id){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $data['id']=$id;
        $this->view('templates/header',$data);
        $this->view('admin/editinventaris',$data);
        $this->view('templates/footer');
    }
    public function updateinventaris(){
        $this->view('admin/updateinventaris');
     }
     public function hapusinventaris($id){
        $data['id']=$id;
        $this->view('admin/hapusinventaris',$data);
     }
     public function tambahtarif(){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $this->view('templates/header',$data);
        $this->view('admin/tambahtarif',$data);
        $this->view('templates/footer');
     }
     public function addtarif(){
        $this->view('admin/addtarif');
     }
     public function edittarif($id){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $data['id']=$id;
        $this->view('templates/header',$data);
        $this->view('admin/edittarif',$data);
        $this->view('templates/footer');
    }
    public function updatetarif(){
        $this->view('admin/updatetarif');
     }
     public function hapustarif($id){
        $data['id']=$id;
        $this->view('admin/hapustarif',$data);
     }
     public function tambahakun(){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $this->view('templates/header',$data);
        $this->view('admin/tambahakun',$data);
        $this->view('templates/footer');
     }
     public function addakun(){
        $this->view('admin/addakun');
     }
     public function editakun($id){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $data['id']=$id;
        $this->view('templates/header',$data);
        $this->view('admin/editakun',$data);
        $this->view('templates/footer');
    }
    public function updateakun(){
        $this->view('admin/updateakun');
     }
     public function hapusakun($id){
        $data['id']=$id;
        $this->view('admin/hapusakun',$data);
     }
     public function tambahkaryawan(){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $this->view('templates/header',$data);
        $this->view('admin/tambahkaryawan',$data);
        $this->view('templates/footer');
     }
     public function addkaryawan(){
        $this->view('admin/addkaryawan');
     }
     public function editkaryawan($id){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $data['id']=$id;
        $this->view('templates/header',$data);
        $this->view('admin/editkaryawan',$data);
        $this->view('templates/footer');
    }
    public function updatekaryawan(){
        $this->view('admin/updatekaryawan');
     }
     public function hapuskaryawan($id){
        $data['id']=$id;
        $this->view('admin/hapuskaryawan',$data);
     }
     public function pencatatan(){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $this->view('templates/header',$data);
        $this->view('admin/pencatatan',$data);
        $this->view('templates/footer');
     }
     public function addpencatatan(){
        $this->view('admin/addpencatatan');
     }
     public function pembayaran(){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $this->view('templates/header',$data);
        $this->view('admin/pembayaran',$data);
        $this->view('templates/footer');
     }
     public function prosesbayar($id){
        $data['id']=$id;
        $this->view('admin/prosesbayar',$data);
    }
    public function transaksihutang(){
        $data['nama'] = $this->model('Admin_model') ->getAdmin();
        $this->view('templates/header',$data);
        $this->view('admin/transaksihutang',$data);
        $this->view('templates/footer');
     }
     public function cetaktagihan($id){
        $data['id']=$id;
        $this->view('admin/cetaktagihan',$data);
    }
}