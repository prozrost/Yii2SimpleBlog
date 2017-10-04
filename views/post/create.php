<html>
<body>
<?php use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'text')->textarea() ?>
<?= $form->field($model, 'comments_on')->checkbox() ?>
<?= $form->field($model, 'image')->fileInput() ?>

<button>Submit</button>

<?php ActiveForm::end() ?>
</body>
</html>