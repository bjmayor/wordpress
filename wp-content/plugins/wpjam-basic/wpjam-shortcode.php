<?php
add_shortcode( 'list', 'wpjam_list_shortcode' );
function wpjam_list_shortcode( $atts, $content='' ) {
	extract( shortcode_atts( array(
		'type' => '',
		'class' =>  ''
	), $atts ) );

	$output = '';

	$lists = explode("\r\n", $content);

	foreach($lists as $li){
		$li = trim($li);
		if($li) {
			$output .= "<li>".do_shortcode($li)."</li>\n";			
		}
	}

	if($class){ $class = ' class="'.$class.'"'; }

	if($type=="order"){
		$output = "<ol".$class.">\n".$output."</ol>\n";
	}else{
		$output = "<ul".$class.">\n".$output."</ul>\n";
	}

	return $output;
}

add_shortcode( 'table', 'wpjam_table_shortcode' );
function wpjam_table_shortcode( $atts, $content='' ) {
	extract( shortcode_atts( array(
		'border'		=> '1',
		'cellpading'	=> '0',
		'cellspacing'   => '0',
		'width'			=> '',
		'class'			=> '',
		'th'			=> '0',  // 0-无，1-横向，2-纵向，4-横向并且有 footer 
	), $atts ) );

	$output = $thead = $tbody = '';

	$trs = explode("\r\n\r\n", $content);

	$tr_counter = 0;
	foreach($trs as $tr){
		$tr = trim($tr);

		if($tr){
			$tds = explode("\r\n", $tr);
			if(($th == 1 || $th == 4) && $tr_counter == 0){
				foreach($tds as $td){
					$td = trim($td);
					if($td){
						$thead .= "\t\t\t".'<th>'.$td.'</th>'."\n";
					}
				}
				$thead = "\t\t".'<tr>'."\n".$thead."\t\t".'</tr>'."\n";
			}else{
				$tbody .= "\t\t".'<tr>'."\n";
				$td_counter = 0;
				foreach($tds as $td){
					$td = trim($td);
					if($td){
						if($th == 2 && $td_counter ==0){
							$tbody .= "\t\t\t".'<th>'.$td.'</th>'."\n";
						}else{
							$tbody .= "\t\t\t".'<td>'.$td.'</td>'."\n";
						}
						$td_counter++;
					}
				}
				$tbody .= "\t\t".'</tr>'."\n";
			}
			$tr_counter++;
		}
	}
	if($th == 1 || $th == 4){ $output .=  "\t".'<thead>'."\n".$thead."\t".'</thead>'."\n"; }

	if($th == 4){ $output .=  "\t".'<tfoot>'."\n".$thead."\t".'</tfoot>'."\n"; }
	
	$output .= "\t".'<tbody>'."\n".$tbody."\t".'</tbody>'."\n";
	
	if($class){ $class = ' class="'.$class.'"'; }
	
	if($width){ $width = ' width="'.$width.'"'; }

	$output = "\n".'<table border="'.$border.'" cellpading="'.$cellpading.'" cellspacing="'.$cellspacing.'" '.$width.' '.$class.' >'."\n".$output.'</table>'."\n";

	return $output;
}


add_shortcode( 'email', 'wpjam_email_shortcode' );
function wpjam_email_shortcode( $atts, $content='' ) {
	extract( shortcode_atts( array(
		'mailto' => '0'
	), $atts ) );

	return antispambot( $content, $mailto );
}

add_shortcode( 'youku', 'wpjam_youku_shortcode' );
function wpjam_youku_shortcode( $atts, $content='' ) {
	extract( shortcode_atts( array(
		'width'	 => '510',
		'height'	=> '498',
	), $atts ) );

	if(preg_match('#http://v.youku.com/v_show/id_(.*?).html#i',$content,$matches)){
		return '<iframe class="wpjam_video" height='.esc_attr($height).' width='.esc_attr($width).' src="http://player.youku.com/embed/'.esc_attr($matches[1]).'" frameborder=0 allowfullscreen></iframe>';
	}
}

add_shortcode( 'tudou', 'wpjam_tudou_shortcode' );
function wpjam_tudou_shortcode( $atts, $content='' ) {
	extract( shortcode_atts( array(
		'width'	 => '480',
		'height'	=> '400',
	), $atts ) );

	if(preg_match('#http://www.tudou.com/programs/view/(.*?)#i',$content,$matches)){
		return '<iframe class="wpjam_video" width='. esc_attr($width) .' height='. esc_attr($height) .' src="http://www.tudou.com/programs/view/html5embed.action?code='. esc_attr($matches[1]) .'" frameborder=0 allowfullscreen></iframe>';
	}
}

wp_embed_register_handler( 'youku', '#http://v.youku.com/v_show/id_(.*?).html#i', 'wpjam_embed_youku_handler' );
function wpjam_embed_youku_handler( $matches, $attr, $url, $rawattr ) {
	if ( !empty($rawattr['width']) && !empty($rawattr['height']) ) {
		$width  = (int) $rawattr['width'];
		$height = (int) $rawattr['height'];
	} else {
		list( $width, $height ) = wp_expand_dimensions( 480, 400, $attr['width'], $attr['height'] );
	}
	return '<iframe class="wpjam_video" width='. esc_attr($width) .' height='. esc_attr($height) .' src="http://player.youku.com/embed/'. esc_attr($matches[1]) .'" frameborder=0 allowfullscreen></iframe>';
 
}

wp_embed_register_handler( 'tudou', '#http://www.tudou.com/programs/view/(.*?)/#i', 'wpjam_embed_tudou_handler' );
function wpjam_embed_tudou_handler( $matches, $attr, $url, $rawattr ) {
	if ( !empty($rawattr['width']) && !empty($rawattr['height']) ) {
		$width  = (int) $rawattr['width'];
		$height = (int) $rawattr['height'];
	} else {
		list( $width, $height ) = wp_expand_dimensions( 480, 400, $attr['width'], $attr['height'] );
	}
	return '<iframe class="wpjam_video" width='. esc_attr($width) .' height='. esc_attr($height) .' src="http://www.tudou.com/programs/view/html5embed.action?code='. esc_attr($matches[1]) .'" frameborder=0 allowfullscreen></iframe>';
}


