<?php
class Lokasi extends CI_Controller {

    public function index() {
        $response = $this->api_request('GET', 'http://localhost:8080/lokasi');
        $data['lokasi'] = json_decode($response, true);
        $this->load->view('templates/header');
        $this->load->view('lokasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'namaLokasi' => $this->input->post('namaLokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'createdAt' => date('Y-m-d\TH:i:s')
            ];
            $this->api_request('POST', 'http://localhost:8080/lokasi', json_encode($data));
            redirect('lokasi');
        } else {
            $this->load->view('templates/header');
            $this->load->view('lokasi/form'); // Menggunakan form.php
            $this->load->view('templates/footer');
        }
    }
    
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'namaLokasi' => $this->input->post('namaLokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
            ];
            $response = $this->api_request('PUT', 'http://localhost:8080/lokasi/' . $id, json_encode($data));
            if ($response) {
                redirect('lokasi');
            } else {
                // Handle error, e.g., show a message to the user
                show_error('Failed to update data.');
            }
        } else {
            $response = $this->api_request('GET', 'http://localhost:8080/lokasi/' . $id);
            $data['lokasi'] = json_decode($response, true);
            if (empty($data['lokasi'])) {
                show_404(); // Menampilkan halaman 404 jika data tidak ditemukan
            } else {
                $this->load->view('templates/header');
                $this->load->view('lokasi/form', $data);
                $this->load->view('templates/footer');
            }
        }
    }    
    

    public function delete($id) {
        $this->api_request('DELETE', 'http://localhost:8080/lokasi/' . $id);
        redirect('lokasi');
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
        if (curl_errno($ch)) {
            // Handle errors
            $result = curl_error($ch);
        }
        curl_close($ch);
        // Add logging or debugging
        log_message('debug', 'API Request URL: ' . $url);
        log_message('debug', 'API Request Data: ' . $data);
        log_message('debug', 'API Response: ' . $result);
        return $result;
    }    
    
}
