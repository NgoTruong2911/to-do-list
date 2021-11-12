<?php

namespace App\Controllers;

use App\Libraries\Controller;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->work_model = $this->model('Work');
    }

    public function index()
    {
        if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
            $start_date = $_GET['start_date'];
            $end_date = $_GET['end_date'];
        }
        $works = $this->work_model->getAll(isset($start_date) ? $start_date : false, isset($end_date) ? $end_date : false);
        $data = [
            'works' => $works
        ];
        return $this->view('works\index', $data);
    }

    public function create()
    {
        return $this->view('works\add');
    }

    public function store()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'name' => trim($_POST['name']),
            'start_date' => trim($_POST['start_date']),
            'end_date' => trim($_POST['end_date']),
            'status' => trim($_POST['status']),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $this->work_model->addWork($data);
        header("Location: " . URL_ROOT . "/works");
    }

    public function edit()
    {
        $work_id = $_GET['id'];
        $work = $this->work_model->getWorkById($work_id);
        $data = $work;
        return $this->view('works\edit', $data);
    }

    public function update()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'name' => trim($_POST['name']),
            'id' => trim($_POST['id']),
            'start_date' => trim($_POST['start_date']),
            'end_date' => trim($_POST['end_date']),
            'status' => trim($_POST['status']),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $this->work_model->updateWork($data);
        header("Location: " . URL_ROOT . "/works");
    }

    public function delete()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $id = trim($_POST['id']);
        $this->work_model->delete($id);
        header("Location: " . URL_ROOT . "/works");
    }
}
