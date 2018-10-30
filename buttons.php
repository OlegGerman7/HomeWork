<?php 

//Кнопки редактона Tiny MCE

if( !function_exists('_add_my_quicktags') ){
function _add_my_quicktags()
{ ?>
<script type="text/javascript">
QTags.addButton( 'fivepost', 'fivepost', '[sc]', '[/sc]' );

QTags.addButton( 'onepost', 'onepost', '[sc1]', '[/sc1]' );
</script>
<?php }
add_action('admin_print_footer_scripts', '_add_my_quicktags');
}

?>