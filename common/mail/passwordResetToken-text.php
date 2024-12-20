<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Salom <?= $user->username ?>,

Parolni tiklash uchun quyidagi havolaga o'ting:

<?= $resetLink ?>
