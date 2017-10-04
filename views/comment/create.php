<html>
<body>
<?php use yii\widgets\ActiveForm;

$form = ActiveForm::begin() ?>
<?= $form->field($model, 'text')->textarea() ?>
<button>Submit</button>

<?php ActiveForm::end() ?>
</body>
</html>