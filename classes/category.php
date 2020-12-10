<?php
# Require Connection Files

class category
{
    public $cate_id;
    public $title;
    public $author_id;
    public $date_time;

    private $con = null;
    private $table_name = 'categories';

    public function __construct($mysqli)
    {
        $this->con = $mysqli;
        $this->author_id = 1;
        $t = time();
        $this->date_time = date('Y-m-d', $t);
    }

    #--------Insert Category------------#
    public function InsertCate()
    {
        $sql = "INSERT INTO {$this->table_name}
    (cate_title,author_id,date_time)
    VALUES('{$this->title}',{$this->author_id},'{$this->date_time}')";
        // echo $sql;
        if (mysqli_query($this->con, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    #--------Edit Category------------#
    public function Edit_Category()
    {
        $sql = "UPDATE {$this->table_name}
        SET cate_title = '{$this->title}' WHERE cate_id = {$this->cate_id}";
        if ($this->con->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    #--------Delete Category------------#
    public function Delete_Category($data)
    {
    }

    #--------Pause Category------------#
    public function Pause_Category($data)
    {
    }

    #--------Get Categorys------------#
    public function Get_Category()
    {
        $sql = "SELECT *FROM {$this->table_name}";
        $data = $this->con->query($sql);
        return $data;
    }

    public function get_categories()
    {
        $sql = "SELECT *FROM {$this->table_name}  JOIN   users WHERE {$this->table_name}.author_id = users.user_id";
        $data = $this->con->query($sql);
        return $data;
    }

    public function get_category_single($id)
    {
        $sql = "SELECT *FROM {$this->table_name} WHERE cate_id = {$id}";
        $data = $this->con->query($sql);
        return $data;
    }
}
