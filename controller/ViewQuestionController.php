<?php
	include_once 'utils/Controller.php';
	include_once 'model/Question.php';
	include_once 'model/Answer.php';
	include_once 'model/Comment.php';
	include_once 'utils/Parsedown.php';

	class ViewQuestionController extends Controller{

		public function __construct(){
			/*
				Set title
			*/
			$this->setTitle('Question');
			/*
				Set View
			*/
			$this->setView('question.php');


			/*
				Add css files
			*/
			$this->addCss('question.css');
			$this->addCss('parsedown.css');
			$this->addCss('answer.css');
			$this->addCss('comment.css');
		}

		public function handle(){
			/*
				if the id is set
			*/
			if( isset($_GET["id"]) ){
				/*
					create question object
				*/
				$question = new Question();
				/*
					check if question exists and fill it with data
				*/
				if ( $question->create( intval( $_GET["id"] ) ) ) {
					/*
						all is ok set the question to the view
					*/
					$args['question'] = $question;
				}else{
					/*
						Question does not exist redirect to home
					*/
					header("Location: ?p=home");
                	die();
				}
			}else{
				/*
					Question does not exist redirect to home
				*/
				header("Location: ?p=home");
                die();
			}

			/*
				Post a comment to a question
			*/
			if(isset($_POST['question_id']) && isset($_POST['question_comment'])){

			}

			/*
				Post an answer to a question
			*/
			if(isset($_POST['question_id']) && isset($_POST['postedAnswer'])){

			}

			/*
				Post a comment to an answer
			*/
			if(isset($_POST['answer_id']) && isset($_POST['answer_comment'])){

			}

	
			/*
				Show View
			*/
			$this->showView($args);
		}

	}