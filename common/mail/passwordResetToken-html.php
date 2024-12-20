<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $user */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Salom <?= Html::encode($user->username) ?>,</p>

    <p>Parolni tiklash uchun quyidagi havolaga o'ting:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
