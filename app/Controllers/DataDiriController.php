<?php

namespace App\Controllers;

use App\Models\DataDiriModel;
use App\Models\accountModel;
use CodeIgniter\RESTful\ResourceController;

class DataDiriController extends ResourceController
{
  public function getAllData()
  {
    $model = new DataDiriModel();
    $data = $model->findAll();
    return $this->respond($data);
  }

  public function insertData()
  {
    $model = new DataDiriModel();
  }

  public function getData($id)
  {
    $model = new DataDiriModel();
    $data = $model->find($id);
    return $this->respond($data);
  }

  public function deleteData()
  {
    $model = new DataDiriModel();
    $data = json_decode(key($this->request->getPost()));
    $model->delete($data->id);
    return $this->respond("sukses");
  }

  public function getAllDataNegara()
  {
    $model = new DataDiriModel();
    $data = [
      'malaysia' => $model->selectCount('ngr_std', 'jumlah')->where('ngr_std', 'malaysia')->get()->getResultArray()[0],
      'sudan' => $model->selectCount('ngr_std', 'jumlah')->where('ngr_std', 'sudan')->get()->getResultArray()[0],
      'polandia' => $model->selectCount('ngr_std', 'jumlah')->where('ngr_std', 'polandia')->get()->getResultArray()[0],
      'hungaria' => $model->selectCount('ngr_std', 'jumlah')->where('ngr_std', 'hungaria')->get()->getResultArray()[0],
      'china' => $model->selectCount('ngr_std', 'jumlah')->where('ngr_std', 'china')->get()->getResultArray()[0],
      'ceko' => $model->selectCount('ngr_std', 'jumlah')->where('ngr_std', 'ceko')->get()->getResultArray()[0],
      'rusia' => $model->selectCount('ngr_std', 'jumlah')->where('ngr_std', 'rusia')->get()->getResultArray()[0],
      'taiwan' => $model->selectCount('ngr_std', 'jumlah')->where('ngr_std', 'taiwan')->get()->getResultArray()[0],
      'total' => $model->countAllResults()
    ];
    return $this->respond($data);
  }

  public function getAllDataDaerah()
  {
    $model = new DataDiriModel();
    $data = [
      'loteng' => $model->selectCount('kbptn_asal', 'jumlah')->where('kbptn_asal', 'Lombok Tengah')->get()->getResultArray()[0],
      'lobar' => $model->selectCount('kbptn_asal', 'jumlah')->where('kbptn_asal', 'Lombok Barat')->get()->getResultArray()[0],
      'lotim' => $model->selectCount('kbptn_asal', 'jumlah')->where('kbptn_asal', 'Lombok Timur')->get()->getResultArray()[0],
      'klu' => $model->selectCount('kbptn_asal', 'jumlah')->where('kbptn_asal', 'Lombok Utara')->get()->getResultArray()[0],
      'mataram' => $model->selectCount('kbptn_asal', 'jumlah')->where('kbptn_asal', 'Kota Mataram')->get()->getResultArray()[0],
      'bima' => $model->selectCount('kbptn_asal', 'jumlah')->where('kbptn_asal', 'bima')->get()->getResultArray()[0],
      'kotabima' => $model->selectCount('kbptn_asal', 'jumlah')->where('kbptn_asal', 'Kota Bima')->get()->getResultArray()[0],
      'dompu' => $model->selectCount('kbptn_asal', 'jumlah')->where('kbptn_asal', 'Dompu')->get()->getResultArray()[0],
      'sumbawa' => $model->selectCount('kbptn_asal', 'jumlah')->where('kbptn_asal', 'Sumbawa')->get()->getResultArray()[0],
      'sumbar' => $model->selectCount('kbptn_asal', 'jumlah')->where('kbptn_asal', 'Sumbawa Barat')->get()->getResultArray()[0],
      'total' => $model->countAllResults()
    ];

    return $this->respond($data);
  }

  public function getToken()
  {
    $model = new accountModel();
    $data = json_decode(key($this->request->getPost()));
    $password = $model->where('username', $data->username)->get()->getResultArray()[0]['password'];

    if (password_verify($data->password, $password)) {
      $string = 207;
    } else {
      $string = 401;
    }

    return $this->respond($string);
  }
}
