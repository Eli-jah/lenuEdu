<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <?php include_once VIEWS . 'inc/head.php'; ?>
</head>
<body>
<?php include_once VIEWS . 'inc/nav.php'; ?>

<!--内容开始-->
<div class="Curricular">
    <div class="headerPartition" style="background: url('<?php echo $banner ?>') center no-repeat;">
        <div class="opacity_box"></div>
        <div class="Partition-title">
            <h1 class="title-zh">课程分类</h1>
            <h1 class="title-en">Curricular Taxonomy</h1>
        </div>
        <div class="Partition-nav">
            <ul class="nav-breadcrumb">
                <li><a href="<?php echo site_url('') ?>">首页</a></li>
                <li class=""><a href="javascript:void(0);">课程分类</a></li>
                <li class="active"><a href="javascript:void(0);"><?php echo $info['title'] ?></a></li>
            </ul>
            <ul class="Partition-nav-tabs Curricular_tabs">
                <li class="active">
                    <div class="Curricular_small_tabs">选择课程</div>
                    <ul class="Curricular_choose">

                        <?php if (!empty($data['subject'])): ?>
                            <?php foreach ($data['subject'] as $k => $v): ?>
                                <li><a href="<?php echo site_url('subject/info/' . $v['id']) ?>"><?php echo $v['subtitle'] ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="TextContent">
        <div class="wrapper">
            <div class="wrapper_title">
                <h3><?php echo $info['title'] ?></h3>
                <p><?php echo $info['decorate'] ?></p>
                <div class="wrapper_evaluate"></div>
            </div>
            <div class="wrapper_content">
                <?php echo $info['content'] ?>
            </div>
            <?php if (!empty($info_photo)): ?>
                <div class="wrapper_swiper">
                    <div class="swiper-container CourseRotation">
                        <div class="swiper-wrapper">
                            <?php foreach ($info_photo as $k => $v): ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $v ?>"/>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="swiper-button-prev swiper-button-black"></div>
                    <div class="swiper-button-next swiper-button-black"></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php include_once VIEWS . 'inc/footer.php'; ?>