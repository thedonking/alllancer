<?php
	global $user_ID;
	$profile_id = get_user_meta($user_ID, 'user_profile_id', true);
?>
<div class="modal fade" id="modal_add_portfolio">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<i class="fa fa-times"></i>
				</button>
				<h4 class="modal-title"><?php _e("Add item for your Portfolio", ET_DOMAIN) ?></h4>
			</div>
			<div class="modal-body">
				<form role="form" id="create_portfolio" class="auth-form create_portfolio">
                	<div id="portfolio_img_container">
                		<input type="hidden" name="post_thumbnail" id="post_thumbnail" value="0" />
                		<span class="image" id="portfolio_img_thumbnail">
                			<!-- IMG UPLOAD GO HERE -->
                		</span>
                		<span class="et_ajaxnonce hidden" id="<?php echo wp_create_nonce( 'portfolio_img_et_uploader' ); ?>"></span>
                		<p class="add-file"><?php _e('ADD FILES', ET_DOMAIN) ?></p>
                		<p class="drag-drop"><?php _e('Simply Drag & Drop', ET_DOMAIN) ?></p>
                		<p class="browser-image">
                			<input type="button" id="portfolio_img_browse_button" class="btn btn-default btn-submit" value="Browse" />
                		</p>
                	</div>
                	<div class="clearfix"></div>
                	<div class="form-group">
                		<label><?php _e('Portfolio Title', ET_DOMAIN) ?></label>
                		<p><input type="text" name="post_title" id="post_title" /></p>
                	</div>
                	<div class="clearfix"></div>
                	<div class="form-group portfolio-skills">
                		<label><?php _e('Select Skill', ET_DOMAIN) ?></label>
                		<p>
	                		<select id="skills" name="skill">
		                		<?php

		                			if($profile_id) {
		                				$skills = wp_get_object_terms( $profile_id, 'skill' );
		                			} else {
		                				$skills = get_terms( 'skill', array('hide_empty' => false) );
		                			}
		                			if(!empty($skills)){
		                				$value = 'slug';
		                				if( ae_get_option('switch_skill', false ) )
		                				{
		                					$value = 'term_id';
		                				}
			                			foreach ($skills as $skill) {
			                				echo '<option value="'.$skill->$value.'">'.$skill->name.'</option>';
			                			}
			                		}
		                		?>
		                	</select>
		                </p>
                	</div>
                	<div class="clearfix"></div>
					<button type="submit" class="btn-submit btn-sumary btn-sub-create">
						<?php _e('Add item', ET_DOMAIN) ?>
					</button>
				</form>	
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->