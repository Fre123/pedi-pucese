<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Proyectos;
/* @var $this yii\web\View */
/* @var $model app\models\Subproyectos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subproyectos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_proyecto')->dropDownList(
    ArrayHelper::map(Proyectos::find()->all(), 'id_proyecto','descripcion'), 
    ['prompt' => 'Seleccione el Proyecto'])  ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <!--?= $form->field($model, 'evidencias_subproyectos')->textInput(['maxlength' => true]) ?-->

    <?= $form->field($model, 'file')->fileInput()?>

    <?= $form->field($model, 'fecha_inicio')->textInput(['type' => 'date'])?>

    <?= $form->field($model, 'fecha_fin')->textInput(['type' => 'date']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
