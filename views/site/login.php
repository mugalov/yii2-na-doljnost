<?php 
$this->title = 'Войти Tovary';
?>
<?php
use yii\widgets\ActiveForm;
?>

<div class="login-form"
        style="background-color: rgba(255, 255, 255, 0.85);
            margin: inherit;
    margin-top: 100px;
            width: 400px;
        padding-top: 1px;
        padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 10px;" >

<h1 style="text-align: center;">Логин</h1>
<?php $form = ActiveForm::begin();?>

<?= $form->field($login_model,'email')->textInput()?>

<?= $form->field($login_model,'password')->passwordInput()?>

<div>
    <button class="btn btn-success" type="submit">Login</button>
</div>

<?php $form = ActiveForm::end();?>
</div>

