<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Biz haqimizda';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="site-about">-->
<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>This is the About page. You may modify the following file to customize its content:</p>-->
<!---->
<!--    <code>--><?php //= __FILE__ ?><!--</code>-->
<!--</div>-->

<?php
//use yii/db/
//$query = Yii::$app->db->createCommand("SELECT * FROM user")->queryAll();
//$arr = [0, 'a', ',', '#', 'ali'];
//sort($arr);
//print_r($arr)

//$arr = ['a', 'a', 'b', 'b', 'c'];
//print_r(array_unique($arr));

$command = "select * from user";
$query = Yii::$app->db->createCommand($command);
echo "<pre>";
print_r($query->queryALl());
?>