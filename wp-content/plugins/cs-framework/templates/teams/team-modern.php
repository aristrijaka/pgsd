<?phpglobal $post,$wpdb,$cs_theme_options,$cs_counter_node,$column_attributes,$cs_team_post_description,$cs_team_post_excerpt,$pageSidebar;extract($wp_query->query_vars);$width = '350';$height = '350';$title_limit = 1000;$cs_layout = '';/*if($pageSidebar <> "" && $pageSidebar > 0){	$column_size= 'col-md-4';	}else{ 	$column_size= 'col-md-3';	}*/if ( is_single() ) {		$column_size= 'col-md-4';			}else{	 if($pageSidebar <> "" && $pageSidebar > 0){ 		$column_size= 'col-md-4';		     }else{		 		$column_size= 'col-md-3';	 		 	 }}?>   <div class="cs-team team-box-grid">        <?php        $query = new WP_Query($args);        $post_count = $query->post_count;        if ($query->have_posts()) {            $postCounter = 0;            while ($query->have_posts()) : $query->the_post();                $thumbnail = cs_get_post_img_src($post->ID, $width, $height);                $cs_postObject = get_post_meta($post->ID, "cs_full_data", true);				$cs_layout 				= get_post_meta( $post->ID, 'cs_page_layout' ,true);				$cs_position_color = get_post_meta($post->ID, 'cs_position_color', true);				$cs_team_title_color = get_post_meta($post->ID, 'cs_team_title_color', true);			 								$cs_team_position = get_post_meta($post->ID, 'cs_team_position', true);				$cs_team_email = get_post_meta($post->ID, 'cs_team_email', true);				$cs_team_specs_desc = get_post_meta($post->ID, 'cs_team_specs_desc', true);				$cs_team_phone = get_post_meta($post->ID, 'cs_team_phone', true);				$cs_team_facebook = get_post_meta($post->ID, 'cs_team_facebook', true);				$cs_team_twitter = get_post_meta($post->ID, 'cs_team_twitter', true);				$cs_team_google = get_post_meta($post->ID, 'cs_team_google', true);				$cs_team_linkedin = get_post_meta($post->ID, 'cs_team_linkedin', true);                ?>                <article class="col-sm-6 <?php echo esc_html($column_size);?>">                                        <div class="overlayslide custom-fig">                                        <?php if($thumbnail <> '') { ?>                                        <figure>                                     <a href="<?php esc_url(the_permalink()); ?>"><img alt="<?php echo cs_get_post_img_title($post->ID); ?>" src="<?php echo esc_url($thumbnail); ?>"></a>                                            <figcaption>									 <a href="<?php esc_url(the_permalink()); ?>" title=""><i class="icon-plus8"></i></a>								</figcaption>                                            </figure>                                            <?php } ?>                                         <div class="overlaytext">                                                <h4>                                                <a href="<?php esc_url(the_permalink()); ?>" style="color:<?php echo esc_html($cs_team_title_color); ?> !important">												<?php the_title(); ?></a></h4>                                                <?php if($cs_team_position <> '' ) { ?>                                                <h3><a href="<?php esc_url(the_permalink()); ?>" style="color:<?php echo cs_allow_special_char($cs_position_color);?> !important"><?php echo cs_allow_special_char($cs_team_position);?></a></h3>                                                <?php } ?>                                                <div class="viewstudent">                                                <i class="icon-plus8 customcolor"></i>                                                <a href="<?php esc_url(the_permalink()); ?>">                                                <?php _e('View Profile','');?></a>                                                </div>                                            </div>                                        </div>                                    </article>                             <?php            endwhile;        } else {            _e('No team found.','cs_frame');        }        ?>           </div>