<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/** @var yii\web\View $this */
/** @var common\models\News $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label(false)->textInput(['placeholder' => 'Mavzusi']) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'category')->dropDownList([
                'technology' => 'Texnologiya',
                'sports' => 'Sport',
                'health' => 'Salomatlik',
                'business' => 'Biznes',
            ], ['prompt' => 'Kategoriyani tanlang'])->label(false) ?>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'description')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full', // CKEditor presetini tanlash, 'basic', 'standard', 'full'
            ]) ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'photo_path', [
                'inputOptions' => ['accept' => 'image/*'] // Faqat rasm turidagi fayllar
            ])->fileInput()->label('Rasm yuklash') ?>
        </div>
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>

