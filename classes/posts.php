<?php
require_once '../config/config.php';

class post
{
    public $id;
    public $title;
    public $author_id;
    public $meta_tag;
    public $is_published;
    public $created_at;
    public $updated_at;
    public $published_at;
    public $image;
    public $content;
    public $category_id;

    private $con = null;
    private $table_name = 'posts';

    public function __construct($mysqli)
    {
        $this->con = $mysqli;
        $t = time();
        $this->created_at = date("Y-m-d", $t);
        $this->published_at = date("Y-m-d", $t);
        $this->updated_at = date("Y-m-d", $t);
        $this->image = 'Not Available';
    }

    #--------Insert Post------------#
    public function Insert_post()
    {
        $sql = "INSERT INTO {$this->table_name}
    (title,post_image,author_id,meta_tag,published,created_at,updated_at,published_at,content,category_id)
    VALUES('{$this->title}','{$this->image}',{$this->author_id},
    '{$this->meta_tag}','{$this->is_published}','{$this->created_at}','{$this->updated_at}','{$this->published_at}','{$this->content}',{$this->category_id})";
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
    public function Get_posts()
    {
        $sql = "SELECT *FROM {$this->table_name} as p INNER JOIN categories as c ON p.category_id = c.cate_id INNER JOIN users as u ON  p.author_id = u.user_id";
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
