<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Aloqa';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    h3.text-primary {
        font-weight: bold;
    }

    p a:hover {
        color: #0056b3;
        text-decoration: underline;
    }

</style>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Ushbu formadan foydalanib bizga e-mail jo'nating. Biz siz bilan tez orada bog'lanamiz.
    </p>

    <div class="row">
        <div class="col-lg-8">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Ism-sharifingiz'])->label(false) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Elektron pochta'])->label(false) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Murojaat mavzusi'])->label(false) ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <?= $form->field($model, 'body')->textarea(['rows' => 6, 'placeholder' => "Xabar matni"])->label(false) ?>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-lg-5">
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row"><div class="col-lg-6">{image}</div><div class="col-lg-6">{input}</div></div>',
                        'options' => ['placeholder' => 'Xavfsizlik kodi'],
                    ])->label(false) ?>
                </div>

                <div class="col-lg-4">
                    <?= Html::submitButton('Yuborish', [
                        'class' => 'btn btn-primary',
                        'name' => 'contact-button',
                        'style' => 'width: 125px;', // Tugma kengligi oshirilgan
                    ]) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-11">
            <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3020.8130160485744!2d72.37008687605703!3d40.7881247329518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38bcec8187a14f81%3A0x82b53c72a937651f!2sAndijan%20State%20University!5e0!3m2!1sen!2s!4v1734640642963!5m2!1sen!2s"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <h3 class="text-primary">Xorijiy adabiyotlar fakulteti</h3>
                <p>
                    <strong>Manzilimiz: </strong>
                    170100, O'zbekiston Respublikasi, Andijon shahar, Universitet ko'chasi 129-uy
                </p>
                <p>
                    <strong>E-pochta:</strong>
                    <a href="mailto:agsu_info@edu.uz" class="text-info">agsu_info@edu.uz</a>,
                    <a href="mailto:anddu@exat.uz" class="text-info">anddu@exat.uz</a>
                </p>
                <p>
                    <strong>Telefon/faks:</strong> 0 (374) 223 88 30<br>
                    <strong>Ishonch telefon:</strong> 0 (374) 223 88 14
                </p>
                <p>
                    <strong>Transport:</strong> 75-yo'nalishdagi taksilar
                </p>
            </div>
        </div>
    </div>



</div>
