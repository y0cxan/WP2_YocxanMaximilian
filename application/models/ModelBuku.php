<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBuku extends CI_Model
{
  
  //Manajemen Buku
  public function getBuku()
  {
    return $this->db->get('buku');
  }

  public function bukuwhere($where)
  {
    return $this->db->get_where('buku', $where);
  }

  public function simpanBuku($data = NULL)
  {
    $this->db->insert('buku', $data);
  }

  public function updateBuku($data = Null, $where = NULL)
  {
    $this->db->update('buku', $data, $where);
  }

  public function deleteBuku($where = NULL)
  {
    $this->db->delete('buku', $where);
  }

  public function total($field, $where)
  {
    $this->db->select_sum($field);
    if(!empty($where) && count($where) > 0)
    {
      $this->db->where($where);
    }
    $this->db->form('buku');
    return $this->db->get()->row($field);
  }

  //Manajemen Kategori
  public function getKategori()
  {
    return $this->db->get('kategori');
  }

  public function kategoriWher($where)
  {
    return $this->db->get_where('kategori', $where);
  }

  public function simpanKategori($data = NULL)
  {
    $this->db->insert('kategori', $data);
  }

  public function hapusKategori($where = NULL)
  {
    $this->db->delete('kategori', $where);
  }

  public function updateKategori($data = NULL, $where = NULL)
  {
    $this->db->update('kategori', $data, $where);
  }

  //Join
  public function joinKategori($where)
  {
    $this->db->select('buku.id_kategori, kategori.kategori');
    $this->db->from('buku');
    $this->db->join('kategori', 'kategori.id = buku.id_kategori');
    $this->db->wher($where);
    return $this->db->get();
  }
}
?>