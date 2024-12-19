<?php

use common\models\User;

$user = User::findOne(['username' => 'admin']);
if ($user) {
    $user->setPassword('yangi_parol');
    $user->save();
}