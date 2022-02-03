<?php


class commentsController {

	private $commentsWood=[];	
	public $model,$view;
	
	function __construct($model,$view){
	
		$this->model = $model;
		$this->view = $view;
	}
	
	public function getAllByPublicationId($data){
		
		$comments = [];
		if(!$commentsSqlSource = $this->model->getAllByPublicationId($data)){
		
		}else{
		
		while($result = $commentsSqlSource->fetch_object()){
			$comments[] = $result;
		}
		
		}
		return $this->commentsWood($comments);
	}

	// группируем записи у которых есть родительский комментарий
	private function groupByParentCommentId($commentsArray){
	
		$groups = [];
		
		for($i=0;$i<count($commentsArray);$i++){
		
			if($commentsArray[$i]->parentCommentId){
				if(!isset($groups[$commentsArray[$i]->parentCommentId])){
					$groups[$commentsArray[$i]->parentCommentId] = [];
				}
					
				$groups[$commentsArray[$i]->parentCommentId][] = $commentsArray[$i];
			}
		}
		
		return $groups;
	}
	
	private function commentsWood($commentsArray){
	
		$groupsComments = $this->groupByParentCommentId($commentsArray);
		$wood=[];
		for($i=0;$i<count($commentsArray);$i++){
			if(!$commentsArray[$i]->parentCommentId){
				// root comment
				$wood[$commentsArray[$i]->id] = $this->view->commentsChildContainer($this->view->comment($commentsArray[$i]).implode($this->childCommentsWood($commentsArray[$i]->id,$groupsComments))); // тут вызываем метод и работаем с дочерними элементами

			}
		}
		return implode($wood);
	}
	
	private function childCommentsWood($parentId,$groups){
		
		$wood = [];
		
		if(isset($groups[$parentId])){
			for($i=0;$i<count($groups[$parentId]);$i++){			
				$wood[$groups[$parentId][$i]->id] = 
				$this->view->commentsChildContainer($this->view->comment($groups[$parentId][$i]).implode($this->childCommentsWood($groups[$parentId][$i]->id,$groups)));
			}
		}
		return $wood;
	}
	
}








?>