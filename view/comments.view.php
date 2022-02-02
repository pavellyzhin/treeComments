<?php


class commentsView{

	function __constructor(){
	
	}
	
	public function comment($data){
		return '<div style=" width: 200px; height: 100px; border: 1px solid black;">'.$data->id.'</div>';
	}
	
	public function commentsChildContainer($data){
		return '<div style="padding-left: 30px; width: 200px; border: 1px solid black;">'.$data.'</div>';
	}

}



?>