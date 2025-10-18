<?php
require_once __DIR__ . '/../core/Controller.php';

class PendaftaranController extends Controller {
    public function form() {
        $this->views('pendaftaran/form');
    }

    public function submit() {
        $model = $this->models('PendaftaranModel');
        $model->simpanData($_POST, $_FILES);
        $this->views('pendaftaran/success');
    }
}
