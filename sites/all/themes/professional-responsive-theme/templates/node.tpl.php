<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $display_submitted: whether submission information should be displayed.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>
<?php if (!$page) {
	 $itemsVar = 'info_icons_teaser'; 
} else {
	if(!empty($node->field_tour_gallery['und'][0])) {
		$itemsVar = 'info_icons';
	} else {
		$itemsVar = 'info_icons_teaser';
	} 
} ?>
 <?php if(isset($node->field_tour_difficulty['und'][0]['value']) || isset($node->field_symbols['und'][0]['taxonomy_term'])) : ?>
  	<div class="<?php echo $itemsVar; ?>">
    <?php
	$field_symbols = NULL;
	
	if(isset($node->field_tour_difficulty['und'][0]['value'])) {
		echo '<div class="difficulty_level"><h5>Difficulty</h5>';
		$difficultyLevel = $node->field_tour_difficulty['und'][0]['value'];
		switch ($difficultyLevel) {
		  	case 'ReallyEasy':
		        echo '<img src="'. base_path() . path_to_theme() .'/images/difficulty/difficulty-very-easy.png" alt="Difficulty Level - Really Easy" title="Difficulty Level - Really Easy" class="difficulty_icon">';
		        break;
		    case 'Easy':
		        echo '<img src="'. base_path() . path_to_theme() .'/images/difficulty/difficulty-easy.png" alt="Difficulty Level - Easy" title="Difficulty Level - Easy" class="difficulty_icon">';
		        break;
		    case 'Moderate':
		        echo '<img src="'. base_path() . path_to_theme() .'/images/difficulty/difficulty-moderate.png" alt="Difficulty Level - Moderate" title="Difficulty Level - Moderate" class="difficulty_icon">';
		        break;
		    case 'Challenging':
		        echo '<img src="'. base_path() . path_to_theme() .'/images/difficulty/difficulty-hard.png" alt="Difficulty Level - Challenging" title="Difficulty Level - Challenging" class="difficulty_icon">';
		        break;
		    case 'VeryDifficult':
		        echo '<img src="'. base_path() . path_to_theme() .'/images/difficulty/difficulty-very-hard.png" alt="Difficulty Level - Very Difficult" title="Difficulty Level - Very Difficult" class="difficulty_icon">';
		        break;
		}	
		echo '</div>';	
	}

	 // print out the symbols for type of activity based on tax term 
	if(isset($node->field_symbols['und'][0]['taxonomy_term'])) {
		echo '<div class="activity_symbol">';	
		foreach ($node->field_symbols['und'] as $field_symbols) {
		
	   	$SymbolName = $field_symbols['taxonomy_term']->name;
	  	switch ($SymbolName) {
		  	case 'Canyoning':
		        echo '<img src="'. base_path() . path_to_theme() .'/images/symbols/canyoning.png" alt="Canyoning" title="Canyoning" class="symbol_icons">';
		        break;
		    case 'Climbing':
		        echo '<img src="'. base_path() . path_to_theme() .'/images/symbols/climbing.png" alt="Climbing" title="Climbing" class="symbol_icons">';
		        break;
		    case 'Cycling':
		        echo '<img src="'. base_path() . path_to_theme() .'/images/symbols/cycling.png" alt="Cycling" title="Cycling" class="symbol_icons">';
		        break;
			case 'Diving and Snorkelling':
		        echo '<img src="'. base_path() . path_to_theme() .'/images/symbols/diving.png" alt="Diving and Snorkelling" title="Diving and Snorkelling" class="symbol_icons">';
		        break;
		    case 'History and Culture':
		       echo '<img src="'. base_path() . path_to_theme() .'/images/symbols/history.png" alt="History and Culture" title="History and Culture" class="symbol_icons">';
		        break;
		    case 'Relaxing':
		        echo '<img src="'. base_path() . path_to_theme() .'/images/symbols/relaxing.png" alt="Relaxing" title="Relaxing" class="symbol_icons">';
		        break;    
		    case 'Horse Riding':
		        echo '<img src="'. base_path() . path_to_theme() .'/images/symbols/horseriding.png" alt="Horse Riding" title="Horse Riding" class="symbol_icons">';
		        break;
		    case 'Trekking and Hiking':
		        echo '<img src="'. base_path() . path_to_theme() .'/images/symbols/trekking.png" alt="Trekking and Hiking" title="Trekking and Hiking" class="symbol_icons">';
		        break;
	  		}
	  	}	
		echo '</div>';	
	}
	
	echo '</div>';	?>

	<?php endif; ?>	

<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>
    <?php if (!$page): ?>
      <header>
	<?php endif; ?>
      <?php print render($title_prefix); ?>
      <?php if (!$page): ?>
      <h2 class="title" <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
  
      <?php if ($display_submitted): ?>
        <span class="submitted"><?php print $submitted; ?></span>
      <?php endif; ?>

    <?php if (!$page): ?>
      </header>
  <?php endif; ?>
  
<div class="content <?php print $classes_array['1']; ?>"<?php print $content_attributes; ?>>	
			

		
					
    <?php
      // Hide comments, tags, and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_symbols']);
	  hide($content['field_tour_difficulty']);
      print render($content);
    ?>
  </div>

  <?php if (!empty($content['links'])): ?>
    <footer>
      <?php print render($content['links']); ?>
    </footer>
  <?php endif; ?>

  <?php print render($content['comments']); ?>
<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
