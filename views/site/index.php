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
    <div class="col-xs-12">
        <h1 class="text-center">News </h1>

        <?php
        use yii\helpers\Html;

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

            <?php if($post->comments_on == 1 ): ?>
                <h2 class="text-center">Comments</h2>
                <?php foreach ($post->comments as $comment) :?>
                    <h3> <?=Html::encode($comment->text) ?></h3>
                    <p style="color:blue"><?= Html::encode($comment->user->username) ?></p>
                <?php endforeach;?>

            <?php endif; ?>
            <hr style="margin-top: 10px;">
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>