<style>
    .img_class {
        height: 150px;
    }
    h2 {
        margin-top: 0;
    }
</style>
<html>
<body>

    <div class="row">
        <div class="col-xs-10">
            <h1 class="text-center">Your articles </h1>

                <?php
                use yii\helpers\Html;
                use yii\helpers\Url;

                foreach ($posts as $post): ?>
                    <div style="margin-top: 15px" class="row">
                        <div class="col-xs-4">
                    <?= Html::img(\Yii::getAlias('@web'). $post->image, ['class' => 'img_class']) ?>
                        </div>
                    <div class="col-xs-8">
                    <h2> <?= Html::encode($post->title) ?> </h2>
                    <p>  <?= Html::encode($post->text) ?>  </p>
                    <p>  <?= Html::encode($post->user->username) ?>  </p>
                    <p>  <?= Html::encode($post->created_at) ?>  </p>
                    </div>
                    </div>
                    <div style="margin-top: 10px">
                    <?= Html::a('Delete Post', ['/post/delete', 'id' => $post->id], ['class'=>'btn btn-danger']) ?>
                    <?= Html::a('Update Post', ['/post/update', 'id' => $post->id], ['class'=>'btn btn-warning']) ?>
                    <?php if($post->comments >0 && $post->comments_on == 1 ): ?>
                       <?= Html::a('Add Comment', ['/comment/create', 'id' => $post->id], ['class'=>'btn btn-primary']) ?>
                        <h2 class="text-center">Comments</h2>
                        <?php foreach ($post->comments as $comment) :?>
                            <h3> <?=Html::encode($comment->text) ?></h3>
                            <p style="color:blue"><?= Html::encode($comment->user->username) ?></p>
                            <?= Html::a('Delete Comment', ['/comment/delete', 'id' => $comment->id], ['class'=>'btn btn-danger']) ?>
                            <?= Html::a('Update Post', ['/comment/update', 'id' => $comment->id], ['class'=>'btn btn-warning']) ?>
                            <?php endforeach;?>

                    <?php endif; ?>
                    </div>
                    <hr style="margin-top: 10px;">
                <?php endforeach; ?>
        </div>
        <div class="col-xs-2">
            <a style="color: #FF8000;font-size: 1.5em;" href="<?= $url = Url::to(['post/create']) ?>">Create new Post </a>
        </div>
    </div>

</body>
</html>