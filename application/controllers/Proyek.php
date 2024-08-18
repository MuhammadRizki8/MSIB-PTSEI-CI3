<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Proyek extends CI_Controller {

    public function index() {
        // Ambil data dari API
        $response = file_get_contents('http://localhost:8080/proyek');
        $data['proyek'] = json_decode($response, true);

        // Load view dan kirimkan data proyek
        $this->load->view('templates/header');
        $this->load->view('proyek/index', $data);
        $this->load->view('templates/footer');
    }
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'namaProyek' => $this->input->post('namaProyek'),
                'client' => $this->input->post('client'),
                'tglMulai' => $this->input->post('tglMulai'),
                'tglSelesai' => $this->input->post('tglSelesai'),
                'pimpinanProyek' => $this->input->post('pimpinanProyek'),
                'keterangan' => $this->input->post('keterangan'),
                'lokasiId' => $this->input->post('lokasiId')
            ];
            $this->api_request('POST', 'http://localhost:8080/proyek', json_encode($data));
            redirect('proyek');
        } else {
            $data['lokasi'] = json_decode($this->api_request('GET', 'http://localhost:8080/lokasi'), true);
            $this->load->view('templates/header');
            $this->load->view('proyek/create', $data);
            $this->load->view('templates/footer');
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'namaProyek' => $this->input->post('namaProyek'),
                'client' => $this->input->post('client'),
                'tglMulai' => $this->input->post('tglMulai'),
                'tglSelesai' => $this->input->post('tglSelesai'),
                'pimpinanProyek' => $this->input->post('pimpinanProyek'),
                'keterangan' => $this->input->post('keterangan'),
                'lokasiId' => $this->input->post('lokasiId')
            ];
            $this->api_request('PUT', 'http://localhost:8080/proyek/' . $id, json_encode($data));
            redirect('proyek');
        } else {
            $data['proyek'] = json_decode($this->api_request('GET', 'http://localhost:8080/proyek/' . $id), true);
            $data['lokasi'] = json_decode($this->api_request('GET', 'http://localhost:8080/lokasi'), true);
            $this->load->view('templates/header');
            $this->load->view('proyek/edit', $data);
            $this->load->view('templates/footer');
        }
    }

    public function delete($id) {
        $this->api_request('DELETE', 'http://localhost:8080/proyek/' . $id);
        redirect('proyek');
    }

    private function api_request($method, $url, $data = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            ]);
        }
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
