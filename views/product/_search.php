<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-search my-3">
    
  <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'd-flex'
         ]
    ]); ?>


    <?= $form->field($model, 'test')->label(false) ?>

    <div class="form-group mx-1">
  
   
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
</div>
<div class="form-group">
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
