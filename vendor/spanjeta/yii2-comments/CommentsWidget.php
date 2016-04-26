<?php
namespace spanjeta\comments;

use spanjeta\comments\models\Comment;
use yii\data\ActiveDataProvider;

class CommentsWidget extends \yii\base\Widget
{

    public $disabled = false;

    public $model;

    public $readOnly = false;

    protected function getRecentComments()
    {
        if ($this->model == null)
            return null;
		
		$query = Comment::find()->where(['model_id' => $_GET["id"]])->orderBy(['id' => SORT_DESC]);

        return new ActiveDataProvider(['query' =>$query,
									   'pagination' => [
											'pageSize' => 10,
										]
									   ]);
    }

    protected function formModel()
    {
        $comment = null;
        if ($this->readOnly == false) {
            $comment = new Comment();
            $comment->model_type = get_class($this->model);
            $comment->model_id = $this->model->id;
        }
        return $comment;
    }

    public function run()
    {
        if ($this->disabled)
            return; //Do nothing
        
        if (isset($_POST['Comment'])) {
            $comment = new Comment();
            $comment->comment = $_POST['Comment']['comment'];
            $comment->model_type = get_class($this->model);
            $comment->model_id = $this->model->id;

            $comment->save();
        }
        
        echo $this->render('comments', [
            'comments' => $this->getRecentComments(),
            'model' => $this->formModel()
        ]);
    }
}
