<?php $cid = $this->cid; ?>
<?php include_once 'inc_modules_path.php'; ?>

<h3>  <i class="fa fa-pencil"></i>  <?php echo $title; ?></h3>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<?php echo form_open(site_urlc($this->class.'/edit'), array('class' => 'form-horizontal', 'id' => 'frm-edit')); ?>

	<input class="hide" type="text" id="p-title" name="title" value="<?php echo set_value('title',$seo['title']) ?>">
	<input class="hide" type="text" id="p-title_seo" name="title_seo" value="<?php echo set_value('title_seo',$seo['title_seo']) ?>">
	<input class="hide" type="text" id="p-tags" name="tags" value="<?php echo set_value('tags',$seo['tags']) ?>">
	<textarea class="hide" id='p-intro' name="intro" rows='8' class='span4'><?php echo set_value('intro',$seo['intro']) ?></textarea>

	<div class="boxed-inner seamless">

		<?php if(in_array($cid,array(1))):?>
			<div class="control-group">
				<label for="title" class="control-label">文字</label>
				<div class="controls">
					<input type="text" name="text" id="text" class='span5' value="<?php echo set_value('text',$it['text']); ?>" >
				</div>
			</div>
		<?php endif;?>

		<?php if (in_array($cid, array(16))): ?>
			<div class="control-group">
				<label for="title" class="control-label">PC版内容</label>
			</div>
			<div class="control-group uefull">
				<textarea id="content" name="content"> <?php echo set_value('content', $it['content']); ?></textarea>
			</div>
		<?php endif; ?>

		<?php if (in_array($cid, array(1))): ?>
			<div class="control-group">
				<label for="title" class="control-label">
					手机版内容:
				</label>
			</div>
			<div class="control-group uefull">
				<textarea id="content_m" name="content_m"> <?php echo set_value('content_m', $it['content_m']); ?></textarea>
			</div>
		<?php endif; ?>

		<!-- 图片上传 -->
		<?php if (in_array($cid, array(15))): ?>
			<div class="control-group">
				<label for="img" class="control-label">图片：</label>
				<div class="controls">
					<div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>
						<input class="fileupload" type="file" accept="" data-for="photo" multiple="multiple">
					</span>
						<input type="hidden" name="photo" class="form-upload" data-more="1"
							   value="<?php echo $it['photo'] ?>">
						<input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo $it['thumb'] ?>">
					</div>
					<?php if (in_array($cid, array(15))): ?>
                        <span class="help-inline">最佳大小: 1920 * 900 像素</span>
                    <?php else: ?>
                        <span class="help-inline">最佳大小: 1920 * 400 像素</span>
                    <?php endif; ?>
				</div>
			</div>


			<div id="js-photo-show" class="js-img-list-f">
			</div>

			<div class="clear"></div>
		<?php endif; ?>


	</div>

	<div class="boxed-footer">
		<input type="hidden" name="cid" value="<?php echo $this->cid ?>">
		<input type="hidden" name="id" value="<?php echo $it['id']?>">
		<input type="submit" value="<?php echo lang('submit') ?>" class="btn btn-primary">
		<input type="reset" value="<?php echo lang('reset') ?>" class="btn btn-danger">
	</div>
</form>
</div>

<?php include_once 'inc_ui_media.php'; ?>

<script type="text/javascript">
	require(['jquery','adminer/js/ui','adminer/js/media'],function($,ui,media){
		ui.editor_create('content');
		var page_photos = <?php echo json_encode(list_upload($it['photo'])) ?>;

		media.init();
		media.show(page_photos,'photo');
		media.sort('photo');
		$("#js-photo-show" ).sortable().disableSelection();
		
	});
</script>

