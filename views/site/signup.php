<?php 
$this->title = 'Регистрация Tovary';
?>

<div clas="login-form"  
        style="    background-color: rgba(255, 255, 255, 0.85);
            margin: inherit;
    margin-top: 100px;
            width: 400px;
        padding-top: 1px;
        padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 10px;" >

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-centre'],
]) ?>
<h1 style="text-align: center;">Регистрация</h1>

    <?= $form->field($model,'email')->textInput(['autofocus'=>true]); ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <div class="form-group">
        
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']) ?>
       
    </div>
<?php ActiveForm::end() ?>
</div>