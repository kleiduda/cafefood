<?php


namespace Source\Models\Faq;


use Source\Core\Model;

class Questions extends Model
{
    public function __construct()
    {
        parent::__construct("faq_questions", ["id"], ["chanel_id", "question", "response"]);
    }

    public function save():bool
    {

    }
}