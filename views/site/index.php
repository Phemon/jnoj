<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $contests array */
/* @var $news app\models\Discuss */

$this->title = Yii::$app->setting->get('ojName') . ' Online Judge';
?>
<div class="row blog">
    <div class="col-md-8">
        <div class="jumbotron">
            <h2>欢迎访问石家庄二中OJ</h2>
            <a href="http://inoj.seinf.org">内网地址:http://inoj.seinf.org 或 192.168.14.150</a>
            <a href="http://oj.seinf.org:8080">外网地址:http://oj.seinf.org:8080</a>
            <p>在校内请使用内网地址，外网避免大量下载数据</p>
        </div>
        <hr>
        <div class="blog-main">
            <?php foreach ($news as $v): ?>
                <div class="blog-post">
                    <h2 class="blog-post-title"><?= Html::a(Html::encode($v['title']), ['/site/news', 'id' => $v['id']]) ?></h2>
                    <p class="blog-post-meta">
                        <span class="glyphicon glyphicon-time"></span> <?= Yii::$app->formatter->asDate($v['created_at']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="sidebar-module sidebar-module-inset">
            <h4>一言(Hitokoto)</h4>
            <p id="hitokoto">:D 获取中...</p>
        </div>
        <?php if (!empty($contests)): ?>
        <div class="sidebar-module">
            <h4>最近比赛</h4>
            <ol class="list-unstyled">
                <?php foreach ($contests as $contest): ?>
                <li>
                    <?= Html::a(Html::encode($contest['title']), ['/contest/view', 'id' => $contest['id']]) ?>
                </li>
                <?php endforeach; ?>
            </ol>
        </div>
        <?php endif; ?>
        <?php if (!empty($discusses)): ?>
            <div class="sidebar-module">
                <h4>最近讨论</h4>
                <ol class="list-unstyled">
                    <?php foreach ($discusses as $discuss): ?>
                        <li class="index-discuss-item">
                            <div>
                                <?= Html::a(Html::encode($discuss['title']), ['/discuss/view', 'id' => $discuss['id']]) ?>
                            </div>
                            <small class="text-muted">
                                <span class="glyphicon glyphicon-user"></span>
                                <?= Html::a(Html::encode($discuss['nickname']), ['/user/view', 'id' => $discuss['username']]) ?>
                                &nbsp;•&nbsp;
                                <span class="glyphicon glyphicon-time"></span> <?= Yii::$app->formatter->asRelativeTime($discuss['created_at']) ?>
                                &nbsp;•&nbsp;
                                <?= Html::a(Html::encode($discuss['ptitle']), ['/problem/view', 'id' => $discuss['pid']]) ?>
                            </small>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://v1.hitokoto.cn/?c=d&encode=js&select=%23hitokoto" defer></script>
</div>
