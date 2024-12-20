<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/** @var yii\web\View $this */
/** @var common\models\News $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Mavzu']) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 4],
        'preset' => 'full',
    ]) ?>


    <!--    --><?php //= $form->field($model, 'views_count')->textInput() ?>

    <!--    --><?php //= $form->field($model, 'created_at')->textInput() ?>

    <!--    --><?php //= $form->field($model, 'updated_at')->textInput() ?>
    <br>
    <?= $form->field($model, 'photo_path')->fileInput(['accept' => 'image/*']) ?>

    <!--    --><?php //= $form->field($model, 'author')->textInput() ?>
    <br>
    <?= $form->field($model, 'category')->dropDownList(
        [
            'Category 1' => 'Category 1',
            'Category 2' => 'Category 2',
            'Category 3' => 'Category 3',
        ],
        ['prompt' => 'Kategoriyani tanlang']
    )->label(false) ?>

    <br>
    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
