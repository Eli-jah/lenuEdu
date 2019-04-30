<?php $cid = $this->cid; ?>
<?php include_once 'inc_modules_path.php'; ?>

<h3><i class="fa fa-pencil"></i> <?php echo $title; ?></h3>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
    <?php echo form_open(site_urlc($this->class . '/edit'), array('class' => 'form-horizontal', 'id' => 'frm-edit')); ?>

    <input class="hide" type="text" id="p-title" name="title" value="<?php echo set_value('title', $seo['title']); ?>">
    <input class="hide" type="text" id="p-title_seo" name="title_seo" value="<?php echo set_value('title_seo', $seo['title_seo']); ?>">
    <input class="hide" type="text" id="p-tags" name="tags" value="<?php echo set_value('tags', $seo['tags']); ?>">
    <textarea class="hide" id='p-intro' name="intro" rows='8' class='span4'><?php echo set_value('intro', $seo['intro']); ?></textarea>

    <div class="boxed-inner seamless">

        <?php if (in_array($cid, array(4, 8, 12, 16, 19, 37, 40, 45, 49, 51, 54, 58, 62, 66, 71, 74, 79, 83))){ // 18 ?>
            <div class="control-group">
                <label for="title" class="control-label">标题</label>
                <div class="controls">
                    <input type="text" name="title" id="title" class='span5' value="<?php echo set_value('title', $it['title']); ?>">
                </div>
            </div>
        <?php } ?>

        <?php if (in_array($cid, array(4, 8, 12, 16, 19, 37, 40, 45, 49, 51, 54, 58, 62, 66, 71, 74, 79, 83))) { // 18 ?>
            <div class="control-group">
                <label for="title_en" class="control-label">标题（英文）</label>
                <div class="controls">
                    <input type="text" name="title_en" id="title_en" class='span5' value="<?php echo set_value('title_en', $it['title_en']); ?>">
                </div>
            </div>
        <?php } ?>

        <?php if (in_array($cid, array(23, 24, 25, 26, 29, 30, 31, 32))) { // 8 ?>
            <div class="control-group">
                <label for="text" class="control-label">文字</label>
                <div class="controls">
                    <input type="text" name="text" id="text" class='span5' value="<?php echo set_value('text', $it['text']); ?>">
                </div>
            </div>
        <?php } ?>

        <?php if (in_array($cid, array(5, 9, 13, 20, 34, 41, 72, 75, 76, 80))) { // 10 ?>
            <div class="control-group">
                <!--<label for="content" class="control-label">PC版内容</label>-->
                <label for="content" class="control-label">内容</label>
            </div>
            <div class="control-group uefull">
                <textarea id="content" name="content"> <?php echo set_value('content', $it['content']); ?></textarea>
            </div>
        <?php } ?>

        <?php if (in_array($cid, array(1))){ // 0 ?>
            <div class="control-group">
                <label for="content_mobile" class="control-label">手机版内容:</label>
            </div>
            <div class="control-group uefull">
                <textarea id="content_mobile" name="content_mobile"> <?php echo set_value('content_mobile', $it['content_mobile']); ?></textarea>
            </div>
        <?php } ?>

        <!-- 图片上传 -->
        <?php if (in_array($cid, array(6, 10, 14, 17, 21, 27, 33, 36, 38, 42, 43,50, 52,53, 55, 57, 61, 65, 67, 70, 77, 81))) { // 21 ?>
            <div class="control-group">
                <label for="img" class="control-label">图片：</label>
                <div class="controls">
                    <div class="btn-group">
                    <span class="btn btn-success">
                        <i class="fa fa-upload"></i>
                        <span> <?php echo lang('upload_file'); ?> </span>
                        <input class="fileupload" type="file" accept="" data-for="photo" multiple="multiple">
                    </span>
                        <input type="hidden" name="photo" class="form-upload" data-more="1" value="<?php echo $it['photo']; ?>">
                        <input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo $it['thumb']; ?>">
                    </div>
                    <?php if (in_array($cid, array(70))) { ?>
                        <!--<span class="help-inline">最佳大小: 1920 * 900 像素</span>-->
                        <span class="help-inline">最佳大小: 1920 * 1080 像素</span>
                    <?php } else if (in_array($cid, array(6, 14, 17, 21, 65, 67))) { ?>
                        <!--<span class="help-inline">最佳大小: 1920 * 400 像素</span>-->
                        <span class="help-inline">最佳大小: 1920 * 960 像素</span>
                    <?php } else if (in_array($cid, array(57, 61))) { ?>
                        <!--<span class="help-inline">最佳大小: 1920 * 400 像素</span>-->
                        <span class="help-inline">最佳大小: 1920 * 560 像素</span>
                    <?php } else if (in_array($cid, array(36))) { ?>
                        <!--<span class="help-inline">最佳大小: 1920 * 400 像素</span>-->
                        <span class="help-inline">最佳大小: 1920 * 360 像素</span>
                    <?php } else if (in_array($cid, array(10))) { ?>
                        <span class="help-inline">最佳大小: 840 * 630 像素</span>
                    <?php } else if (in_array($cid, array(42))) { ?>
                        <span class="help-inline">最佳大小: 660 * 500 像素</span>
                    <?php } else if (in_array($cid, array(42))) { ?>
                        <span class="help-inline">最佳大小: 660 * 500 像素</span>
                    <?php } else if (in_array($cid, array(43))) { ?>
                        <span class="help-inline">最佳大小: 250 * 570 像素</span>
                    <?php } else if (in_array($cid, array(50, 53))) { ?>
                        <span class="help-inline">最佳大小: 600 * 500 像素</span>
                    <?php } else { ?>
                        <!--<span class="help-inline">最佳大小: 840 * 630 像素</span>-->
                    <?php } ?>
                </div>
            </div>
            <div id="js-photo-show" class="js-img-list-f">
            </div>
            <div class="clear"></div>
        <?php } ?>
    </div>
    <div class="boxed-footer">
        <input type="hidden" name="cid" value="<?php echo $this->cid; ?>">
        <input type="hidden" name="id" value="<?php echo $it['id']; ?>">
        <input type="submit" value="<?php echo lang('submit'); ?>" class="btn btn-primary">
        <input type="reset" value="<?php echo lang('reset'); ?>" class="btn btn-danger">
    </div>
    </form>
</div>

<?php include_once 'inc_ui_media.php'; ?>

<script type="text/javascript">
    require(['jquery', 'adminer/js/ui', 'adminer/js/media'], function ($, ui, media) {
        ui.editor_create('content');
        var page_photos = <?php echo json_encode(list_upload($it['photo'])); ?>;
        media.init();
        media.show(page_photos, 'photo');
        media.sort('photo');
        $("#js-photo-show").sortable().disableSelection();
    });
</script>

