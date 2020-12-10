<?php
require_once '../config/config.php';

class admins
{
    public $id;
    public $name;
    public $email;
    public $password_hash;
    public $registered_at;
    public $last_login;
    public $profile_intro;
    public $type;

    private $con = null;
    private $table_name = 'users';

    public function __construct($mysqli)
    {
        $this->con = $mysqli;
        $t = time();
        $this->registered_at = date("Y-m-d", $t);
        $this->last_login = date("Y-m-d", $t);
    }

    #--------Insert Post------------#
    public function Add_user()
    {
        $sql = "INSERT INTO {$this->table_name}
                 (name,email,password_hash,registered_at,
                 last_login,profile_intro,user_type)
    VALUES('{$this->name}','{$this->email}','{$this->password_hash}','{$this->registered_at}',
    '{$this->last_login}','{$this->profile_intro}','{$this->type}')";
        if (mysqli_query($this->con, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    #--------Edit Post------------#
    public function Edit_post()
    {
        $sql = "UPDATE {$this->table_name}
            SET title = '{$this->title}' ,
            meta_tag = '{$this->meta_tag}' ,
            published = {$this->is_published} ,
            updated_at = '{$this->updated_at}' ,
            content = '{$this->content}' ,
            category_id = {$this->category_id}
            WHERE post_id = {$this->id}";
        if ($this->con->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    #--------Delete Post------------#
    public function Delete_post()
    {
        $sql = "DELETE FROM  {$this->table_name}
            WHERE post_id = {$this->id}";
        if ($this->con->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    #--------Pause Post------------#
    public function Pause_post()
    {
        $sql = "UPDATE {$this->table_name}
        SET published = '{$this->is_published}',
        updated_at = '{$this->updated_at}'
        WHERE post_id = {$this->id}";
        if ($this->con->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    #------------Activate Post-------------------#
    public function Activate_post()
    {
        $sql = "UPDATE {$this->table_name}
        SET published = '{$this->is_published}',
        updated_at = '{$this->updated_at}'
        WHERE post_id = {$this->id}";
        echo $sql;
        if ($this->con->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    #--------Get Posts------------#
    public function Get_users()
    {
        $sql = "SELECT *FROM {$this->table_name}";
        $data = mysqli_query($this->con, $sql);
        return $data;
    }

    public function Get_posts_single($id)
    {
        $sql = "SELECT *FROM {$this->table_name} WHERE post_id = {$id}";
        $data = mysqli_query($this->con, $sql);
        return $data;
    }
}
