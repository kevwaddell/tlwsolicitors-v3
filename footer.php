		</div>
		
		</div>
		<!-- MAIN CONTENT END -->
		
		</div>
		
		<!-- FOOTER START -->
		<section id="footer-info">
		
			<footer class="container">
				
				<div class="row">
				
					<div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
					<h3>Our Services</h3>
					<?php wp_nav_menu(array( 'container_class' => 'footer-nav', 'theme_location' => 'footer_menu', 'fallback_cb' => false ) ); ?>
					</div>
					
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<h3 class="hidden-xs">General</h3>
					<?php wp_nav_menu(array( 'container_class' => 'footer-nav', 'theme_location' => 'footer_menu_general', 'fallback_cb' => false ) ); ?>
					</div>
					
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<?php wp_nav_menu(array( 'container_class' => 'social-links clearfix', 'theme_location' => 'social_links_menu', 'fallback_cb' => false ) ); ?>
					
					<div id="footer-logo" class="hidden-xs text-hide"><?php bloginfo('name'); ?></div>
					
					<div class="compliance-notice">
						<?php $compliance_notice = get_field('compliance_notice', 'option');?>
						<?php if (isset($compliance_notice)) { ?>
						<?php echo $compliance_notice; ?>
						<?php }  ?>
					</div>
					
					</div>
				
				</div>
				
				<div class="copyright">
					<p>&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. <br>All rights reserved.</p>
				</div>
				
			</footer>
			
		</section>
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('User actions') ) : ?><?php endif; ?>
		
		<noscript>
		
		<?php $no_script_notice = get_field('no_script_notice', 'option'); ?>
		
			<div class="no-script-wrap">
				<div class="no-script-inner-wrap">
			
					<div class="no-script-inner">
						<?php echo $no_script_notice; ?>
						<a href="<?php echo get_option('home'); ?>" title="refresh" class="btn btn-default btn-lg btn-block"><i class="fa fa-refresh fa-lg"></i> Refresh</a>
					</div>
				
				</div>
			</div>
			
		</noscript>
		
		<?php wp_footer(); ?>
		
		<?php if ($_SERVER['SERVER_NAME']=='www.tlwsolicitors.co.uk') { ?>
		<!-- Google Code for Remarketing Tag -->
		<!--------------------------------------------------
		Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
		--------------------------------------------------->
		<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = 969694937;
		var google_custom_params = window.google_tag_params;
		var google_remarketing_only = true;
		/* ]]> */
		</script>
		<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
		</script>
		<noscript>
		<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/969694937/?value=0&amp;guid=ON&amp;script=0"/>
		</div>
		</noscript>
		<?php } ?>

	</body>
</html>