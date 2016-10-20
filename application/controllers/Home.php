<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model');
	}
	
	function indexTemplates()
	{
		$data['title'] = "Beranda";
		$data['pegawai'] = $this->crud_model->getData('pegawai');
		$data['bigText'] = "Halaman Utama";
		$this->load->view('header',$data);
		$this->load->view('beranda',$data);
		$this->load->view('footer',$data);
	}
	
	function index()
	{
		self::indexTemplates();
	}
	
	function routing($segment)
	{
		switch($segment)
		{
			case 'beranda':
				self::indexTemplates();
			break;
			
			case 'pegawai';
				$this->form_validation->set_rules('nama','error content','required');
				$this->form_validation->set_rules('no_telp','error content','required');
				$this->form_validation->set_rules('kota','error content','required');
				$this->form_validation->set_rules('kelamin','error content','required');
				$this->form_validation->set_rules('posisi','error content','required');
				$this->form_validation->set_rules('status','error content','required');
				$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
				
				if ( $this->form_validation->run())
				{
					$form_data = array(
						'id_pegawai' => md5(rand(1,99999)),
						'nama' => set_value('nama'),
						'no_telp' => set_value('no_telp'),
						'kota' => set_value('kota'),
						'kelamin' => set_value('kelamin'),
						'id_posisi' => set_value('posisi'),
						'status' => set_value('status')
					);
 
					if ($this->crud_model->insertData('pegawai',$form_data) == TRUE) 
					{
						$info = 'success|Data berhasil disimpan.';
					}
					else
					{
						$info = 'danger|Warning! data gagal disimpan.';
					}
					
					$_SESSION['info'] = $info;
				}
				
				$data['title'] = "Pegawai";
				$data['kota'] = $this->crud_model->getData('kota');
				$data['posisi'] = $this->crud_model->getData('posisi');
				$data['kelamin'] = $this->crud_model->getData('kelamin');
				$data['bigText'] = "Tambah Pegawai";
				$this->load->view('header',$data);
				$this->load->view('pegawai',$data);
				$this->load->view('footer',$data);
			break;
			
			case 'kelola';
				$data['title'] = "Kelola Data";
				$data['kota'] = $this->crud_model->getData('kota');
				$data['posisi'] = $this->crud_model->getData('posisi');
				$data['kelamin'] = $this->crud_model->getData('kelamin');
				$data['bigText'] = "Kelola Data";
				$this->load->view('header',$data);
				$this->load->view('kelola',$data);
				$this->load->view('footer',$data);
			break;
			
			case 'kota';
				$this->form_validation->set_rules('nama','Kota','required');
				$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
				
				if ( $this->form_validation->run())
				{
					$form_data = array(
						'nama' => set_value('nama')
					);
 
					if ($this->crud_model->insertData('kota',$form_data) == TRUE) 
					{
						$info = 'success|Data berhasil disimpan.';
					}
					else
					{
						$info = 'danger|Data gagal disimpan.';
					}
					
					$_SESSION['info'] = $info;
				}
				
				$data['title'] = "Tambah kota";
				$data['bigText'] = "Tambah kota";
				$this->load->view('header',$data);
				$this->load->view('kota',$data);
				$this->load->view('footer',$data);
			break;
			
			case 'posisi';
				if ( $_REQUEST['view'] == 'edit')
				{
					if ( ! $_REQUEST['key'])
					{
						redirect('kelola');
					}
					
					$this->form_validation->set_rules('e_nama','Posisi','required');
					$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
					
					if ( $this->form_validation->run())
					{
						$this->crud_model->updatePosisi($_REQUEST['key'] , set_value('e_nama'));
						$info = 'success|Data berhasil diubah.';
						$_SESSION['info'] = $info;
					}
					
					$data['title'] = "Edit Posisi";
					$data['bigText'] = "Edit Posisi";
					$data['editdata'] = $this->crud_model->getWhere('posisi', array('id_posisi' => $_REQUEST['key']));
					
					$this->load->view('header',$data);
					$this->load->view('edit_posisi',$data);
					$this->load->view('footer',$data);
				}
				else
				{
					$this->form_validation->set_rules('nama','Posisi','required');
					$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
					
					if ( $this->form_validation->run())
					{
						$form_data = array(
							'id_posisi' => substr(md5(rand(1,99999)),0,3),
							'nama' => set_value('nama')
						);
	 
						if ($this->crud_model->insertData('posisi',$form_data) == TRUE) 
						{
							$info = 'success|Data berhasil disimpan.';
						}
						else
						{
							$info = 'danger|Data gagal disimpan.';
						}
						
						$_SESSION['info'] = $info;
					}
					
					$data['title'] = "Tambah Posisi";
					$data['bigText'] = "Tambah Posisi";
					$this->load->view('header',$data);
					$this->load->view('posisi',$data);
					$this->load->view('footer',$data);
				}
			break;
			
			case 'kelamin';
				$this->form_validation->set_rules('nama','Kelamin','required');
				$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
				
				if ( $this->form_validation->run())
				{
					$form_data = array(
						'nama' => set_value('nama')
					);
 
					if ($this->crud_model->insertData('kelamin',$form_data) == TRUE) 
					{
						$info = 'success|Data berhasil disimpan.';
					}
					else
					{
						$info = 'danger|Data gagal disimpan.';
					}
					
					$_SESSION['info'] = $info;
				}
				
				$data['title'] = "Tambah Kelamin";
				$data['bigText'] = "Tambah Kelamin";
				$this->load->view('header',$data);
				$this->load->view('kelamin',$data);
				$this->load->view('footer',$data);
			break;
			
			case 'hapus';
				$options = array('pegawai','kota','posisi','kelamin');
				
				if ( ! in_array($_REQUEST['option'] , $options))
				{
					redirect();
				}
				$k = str_replace( array('[',']',) , '',$_REQUEST['key']);
				$x = explode(":",$k);
				
				$form_data = array(
					$x[0] => $x[1]
				);
				
				$this->crud_model->deleteData($_REQUEST['option'],$form_data);
				
				if ( $_REQUEST['option'] == 'pegawai')
				{
					redirect();
				}
				
				redirect('kelola');
			break;
			
			case 'search':
				if ( ! isset($_REQUEST['keyword']))
				{
					redirect();
				}
				
				$x = $this->crud_model->buildQuery("SELECT * FROM pegawai WHERE nama LIKE '%".$_REQUEST['keyword']."%'");
				$data['title'] = "Pencarian : ".$_REQUEST['keyword'];
				$data['x'] = $x;
				$data['pegawai'] = $x->result();
				$data['bigText'] = "Pencarian pegawai";
				$this->load->view('header',$data);
				$this->load->view('beranda',$data);
				$this->load->view('footer',$data);
			break;
			
			default:
				show_404();
			break;
		}
	}
}
