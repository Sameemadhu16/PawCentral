<?php

class FindMedi{
    use Controller;

    public function index() {
        $medicalCenterModel = new MedicalProvModel;
        $medical_centers = $medicalCenterModel->get([], [
            'order_column' => 'name',
            'order_type' => 'desc'
        ]);
        $this->view("medi.f/findMedi", ['medical_centers' => $medical_centers]);
    }
}