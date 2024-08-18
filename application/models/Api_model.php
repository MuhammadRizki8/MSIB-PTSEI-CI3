<?php
class Api_model extends CI_Model {

    private $api_url = 'http://localhost:8080'; // URL REST API

    public function get_proyek() {
        $response = file_get_contents($this->api_url . '/proyek');
        return json_decode($response, true);
    }

    public function get_lokasi() {
        $response = file_get_contents($this->api_url . '/lokasi');
        return json_decode($response, true);
    }
}
?>
