<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Home');
?>
<div class="row blog">
    <div class="col-md-8">
        <style>
            * {
                box-sizing:border-box
            }
            h2 {
                text-align: left;
            }
            .slideshow-container {
                max-width: 90%;
                position: relative;
                margin: auto;
            }
            .mySlides {
                display: none;
            }
            .text {
                color: #f2f2f2;
                font-size: 15px;
                padding: 8px 12px;
                position: absolute;
                bottom: 8px;
                width: 100%;
                text-align: center;
            }
            .dot {
                cursor:pointer;
                height: 10px;
                width: 10px;
                margin: 0 2px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block;
                transition: background-color 0.6s ease;
            }
            .active, .dot:hover {
                background-color: #717171;
            }
            .fade {
                -webkit-animation-name: fade;
                -webkit-animation-duration: 10s;
                animation-name: fade;
                animation-duration: 10s;
            }

            @-webkit-keyframes fade {
                from {opacity: .4} 
                to {opacity: 1}
            }

            @keyframes fade {
                from {opacity: 1} 
                to {opacity: 1}
            }
        </style>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="<?= Yii::getAlias('@web') ?>/images/pic1.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="<?= Yii::getAlias('@web') ?>/images/pic2.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
              <img src="<?= Yii::getAlias('@web') ?>/images/pic3.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="<?= Yii::getAlias('@web') ?>/images/pic4.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="<?= Yii::getAlias('@web') ?>/images/pic5.jpg" style="width:100%">
            </div>
        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(0)"></span> 
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
            <span class="dot" onclick="currentSlide(4)"></span> 
        </div>  
        <script>
      
            var slideIndex;
      
            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }

                slides[slideIndex].style.display = "block";  
                dots[slideIndex].className += " active";
          
                slideIndex++;
          
                if (slideIndex > slides.length - 1) {
                    slideIndex = 0
                }    
          
                setTimeout(showSlides, 10000);
            }
      
            showSlides(slideIndex = 0);


            function currentSlide(n) {
                showSlides(slideIndex = n);
            }
        </script>
        <h3>GIỚI THIỆU ĐỘI OLYMPIC</h3>
            <p style="text-align: justify;">Đội Olympic Tin học Đại học công nghiệp Hà Nội (Đội O) được thành lập vào năm 2004, là Đội trực thuộc Khoa Công nghệ thông tin Trường đại học Công nghiệp Hà Nội.</p>
            <p style="text-align: justify;">Đội O được được đánh giá là môi trường phù hợp để hoạt động, học tập, chia sẻ kiến thức về lập trình, thuật toán. Trải qua 18 năm phát triển, được sự quan tâm và ủng hộ của trường, khoa, các thầy cô,  Đội đã gặt hái được rất nhiều thành tích trong các cuộc thi tin học lớn trong nước như ACM/ICPC, Olympic Tin học sinh viên, Procon…</p>
    </div>
    <div class="col-md-4">
        <div class="blog-main">
            <h2 class="text-info" style="font-size: 24px;"><span><?=Yii::t('app','Notification')?></span></h2>
            <?php if (empty($news)): ?>
                <div class="text-muted" style="font-size: 18px; padding-left: 15px;"><?=Yii::t('app','No notification')?>. </div>
            <?php endif; ?>

            <?php foreach ($news as $v): ?>
                <div class="blog-post">
                    <h4 class="blog-post-title" style="font-size: 18px; padding-left: 15px;"><?= Html::a(Html::encode($v['title']), ['/site/news', 'id' => $v['id']]) ?></h4>
                    <p class="blog-post-meta"><span class="glyphicon glyphicon-time"></span> <?= Yii::$app->formatter->asDate($v['created_at']) ?></p>
                </div>
            <?php endforeach; ?>
            
            <?= \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
                ]); ?>
            <hr>
            <h2 class="text-info" style="font-size: 24px;"><span><?=Yii::t('app','Recent Contest')?></span></h2>
            <?php if (empty($contests)): ?>
                <div class="text-muted" style="font-size: 18px; padding-left: 15px;"><?=Yii::t('app','No contest')?>.</div>
            <?php endif; ?>
            
            <div class="sidebar-module">
                <ol class="list-unstyled">
                    <?php foreach ($contests as $contest): ?>
                        <li>
                            <h4 class="blog-post-title" style="font-size: 18px; padding-left: 15px;"><?= Html::a(Html::encode($contest['title']), ['/contest/view', 'id' => $contest['id']]) ?></h4>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
            <hr>
            <h2 class="text-info" style="font-size: 24px;"><span><?=Yii::t('app','Recent Discussion')?></span></h2>
            <?php if (empty($discusses)): ?>
                <div class="text-muted" style="font-size: 18px; padding-left: 15px;"><?=Yii::t('app','No discussion')?>.</div>
            <?php endif; ?>
            
            <div class="sidebar-module">
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
        </div>
    </div>
</div>

