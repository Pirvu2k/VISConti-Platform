<?php
namespace spanjeta\comments;

use spanjeta\comments\models\Comment;
use yii\data\ActiveDataProvider;

<<<<<<< HEAD
/**
 * This is just an example.
 */
=======
>>>>>>> c9579b21655241726d9f05fe4c86b60466b84d15
class CommentsWidget extends \yii\base\Widget
{

    public $disabled = false;

<<<<<<< HEAD
    /**
     *
     * @var Model
     */
=======
>>>>>>> c9579b21655241726d9f05fe4c86b60466b84d15
    public $model;

    public $readOnly = false;

    protected function getRecentComments()
    {
        if ($this->model == null)
            return null;
<<<<<<< HEAD
        $query = Comment::find([
            'model_type' => get_class($this->model),
            'model_id' => $this->model->id
        ]);
=======
		
		$query = Comment::find()->where(['model_id' => $_GET["id"]]);

>>>>>>> c9579b21655241726d9f05fe4c86b60466b84d15
        return new ActiveDataProvider(['query' =>$query]);
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
<<<<<<< HEAD
            $comment->load($_POST['Comment']);
            $comment->model_type = get_class($this->model);
            $comment->model_id = $this->model->id;
            
=======
            $comment->comment = $_POST['Comment']['comment'];
            $comment->model_type = get_class($this->model);
            $comment->model_id = $this->model->id;

>>>>>>> c9579b21655241726d9f05fe4c86b60466b84d15
            $comment->save();
        }
        
        echo $this->render('comments', [
            'comments' => $this->getRecentComments(),
            'model' => $this->formModel()
        ]);
    }
}
