<?php


namespace Source\Models;


use Composer\IO\NullIO;
use Source\Core\Model;

class Post extends Model
{
    public function __construct()
    {
        parent::__construct("posts", ["id"], ["title", "id", "subtitle", "content"]);
    }

    public function findK(?string $terms = null,?string $relation = null,?string $params = null,?string $columns = "*")
    {
        $terms = "";
        $relation = " users ON ". static::$entity .".author " ." = users.id ";
        $columns = "title, subtitle, content, cover, category, uri, post_at, first_name, last_name";
        return parent::findK($terms, $relation, $params, $columns);
    }

    public function find(?string $terms = null, ?string $params = null, ?string $columns = "*")
    {
        $terms = "status = :status AND post_at <= NOW()" . ($terms ? " AND {$terms}" : "");
        $params = "status=post" . ($params ? "&{$params}" : "");
        return parent::find($terms, $params, $columns);
    }

    public function findByUri(string $uri, string $columns = "*")
    {
        $find = $this->find("uri = :uri", "uri={$uri}", $columns);
        return $find->fetch();
    }


    public function author(): ?User
    {
        if($this->author){
            return (new User())->findById($this->author);
        }
        return null;
    }

    public function category():?Category
    {
        if($this->category){
            return (New Category())->findById($this->category);
        }
        return null;
    }

    public function save():bool
    {
        //*POST UPDATE*//
        if(!empty($this->id)){
            $postId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$postId}");
            if($this->fail()){
                $this->message->error("Não foi possivel atualizar o post");
                return false;
            }
        }
        //**POST CREATE **/


        $this->data = $this->findById($postId)->data();
        return true;

    }
}









