<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<?php

$jsopions = array('type' => 'inline', 'scope' => 'footer');

drupal_add_js("jQuery( '#choose_tour' ).click(function() {
					jQuery( '#mini-break-view-content' ).show( 'slow' ); 
					jQuery( '.chooseoption.mixmatchtour' ).css( 'background', 'gray' );
					
							jQuery( '#webform-component-select-activity' ).hide( 'slow' );
					
					jQuery( '.chooseoption.byactivity' ).css( 'background', '#9c9c9c' );
			   });
			   jQuery( '#choose_activity' ).click(function() {
			   	
			   	 			jQuery( '#webform-component-select-activity' ).show( 'slow' ); 
			   	 			
			   	 	jQuery( '.chooseoption.byactivity' ).css( 'background', 'gray' );
					jQuery( '#mini-break-view-content' ).hide( 'slow' );
					jQuery( '.chooseoption.mixmatchtour' ).css( 'background', '#9c9c9c' );
			   });
			   jQuery( '#choose_next_step' ).click(function() {
			   	 	jQuery( '.chooseoption.nextstep' ).css( 'background', 'gray' );
					jQuery( '.view-mini-breaks #edit-actions' ).toggle( 'slow' );
					jQuery( '#webform-component-your-details' ).toggle( 'slow' );
					jQuery( '#webform-component-mini-break-details' ).toggle( 'slow' );
					jQuery( '.chooseoption.mixmatchtour' ).css( 'background', '#9c9c9c' );
					jQuery( '.chooseoption.byactivity' ).css( 'background', '#9c9c9c' );
			   });", $jsopions);
	

?>
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>
    <div class="chooseoption-wrap">
		<div id="choose_tour" class="chooseoption mixmatchtour">
		  Mix & Match Tours
		</div>
		<div id="choose_activity" class="chooseoption byactivity">
		  Activity Type
		</div>
	</div>
	<div id="mini-break-view-content" class="mini_break_view_content">
	  <?php if ($exposed): ?>
	    <div class="view-filters">
	      <?php print $exposed; ?>
	    </div>
	  <?php endif; ?>
	
	  <?php if ($attachment_before): ?>
	    <div class="attachment attachment-before">
	      <?php print $attachment_before; ?>
	    </div>
	  <?php endif; ?>
	
	  <?php if ($rows): ?>
	    <div class="view-content">
	      <?php print $rows; ?>
	    </div>
	  <?php elseif ($empty): ?>
	    <div class="view-empty">
	      <?php print $empty; ?>
	    </div>
	  <?php endif; ?>
    </div>

	<?php $block = module_invoke('webform', 'block_view', 'client-block-22');
	print render($block['content']); ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>