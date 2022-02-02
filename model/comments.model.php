<?php



class commentsModel {

	public $mysql;

	function __constructor(&$mysql){
		$this->mysql = $mysql;
	}
	
	public function getAllByPublicationId($data){
		return $this->mysql->query('SELECT id,publicationId,userId,comment,parentCommentId FROM comments WHERE publicationId='.$data->publicationId);
	}
	
	public function set($data){
		return $this->mysql->query('INSERT INTO comments (publicationId,userId,comment,_date) VALUES ('.$data->publicationId.','.$data->userId.',"'.$data->comment.'",'.$data->_date.')');
	}
}






















?>