<?php

namespace App\Models;

use App\Libraries\Database;

class Work
{
    private $db;

    private $table_name = 'works';

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll($start_date, $end_date)
    {
        $query = "select * from $this->table_name ";
        if ($start_date && $end_date) {
            $query .= "where start_date <= $start_date or end_date >= $end_date";
        }
        $query .= " order by created_at desc";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function addWork($data)
    {
        $this->db->query("INSERT INTO works (name, start_date, end_date, status, created_at, updated_at) values (:name, :start_date, :end_date, :status, :created_at, :updated_at)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':created_at', $data['created_at']);
        $this->db->bind(':updated_at', $data['updated_at']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getWorkById($id)
    {
        $this->db->query('select * from works where id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateWork($data)
    {
        $this->db->query("UPDATE works SET name = :name, end_date = :end_date, start_date = :start_date, updated_at = :updated_at, status = :status where id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':end_date', $data['end_date']);
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':updated_at', $data['updated_at']);
        $this->db->bind(':status', $data['status']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM works where id = :id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
