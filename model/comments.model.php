<?php


namespace comments {
class commentsModel {

	public $mysql;

	function __construct($mysql){
		$this->mysql = $mysql;
	}
	
	public function getAllByPublicationId($data){
		return $this->mysql->query('SELECT id,publicationId,userId,comment,parentCommentId FROM comments WHERE publicationId=' . $data->publicationId);
	}
}


}



















?>