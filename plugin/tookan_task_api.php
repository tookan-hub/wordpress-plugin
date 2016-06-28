<?php 
 /*
Plugin Name: tookan_task_api
*/
?>
<style type="text/css">
  .wrap label{width: 6%;float: left;}


</style>
<?php
if ( !session_id() ) {
	session_start();
}

if(isset($_POST['start_task'])) {
$access_token = $_POST['get_access_tookan'];
$get_user_id = $_POST['get_user_id'];
 $table_name = $wpdb->prefix . 'tookan_api';

     $_SESSION['access_token'] = $access_token;
          $_SESSION['user_id'] = $get_user_id;
     //$_COOKIE['access_token'] = $access_token;
     // echo $_SESSION['access_token'];
     // exit;

  $sql1 = "INSERT INTO $table_name (access_token, user_id) VALUES ('".$access_token."', '".$get_user_id."')";
//  echo $sql1 ;

               if($wpdb->query($sql1)) 
               {
              
               //echo "success";
               }
}

add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu() {
	add_menu_page('Tookan Task api', 'Tookan api', 'administrator', 'tookan_api', 'my_plugin_settings_page', 'dashicons-admin-generic');


}

function my_plugin_settings_page() {

global $wpdb;

    $table_name = $wpdb->prefix . 'tookan_api';

    $sql = "CREATE TABLE $table_name (
      id int(11) NOT NULL AUTO_INCREMENT,
      access_token varchar(255),
     user_id varchar(255),
      UNIQUE KEY id (id) 
    );";
   // echo $sql;
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );


?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<script type="text/javascript">
	
$(document).ready(function() {
    $("input#start_task").click(function(event) {

      //alert("hiii");

var access_token = $('input#get_access').val();
var user_id = $('input#get_user_id').val();
	jQuery.ajax({
		type: 'post',
		url: 'https://api.tookanapp.com/user_login_via_access_token',
		data: {
			access_token: access_token
			},
		dataType: 'JSON',
		success: function(data) {
		console.log(data);
      if (data['status'] == 200){
     $('.success_msg').css('display','block');
      $('.final_succes,.error_msg_user,.error_msg').css('display','none');
   

     if(data.data['user_id'] == user_id) {

     $('.final_succes').css('display','block');
     $('.success_msg,.error_msg_user,.error_msg').css('display','none');
        

     }
     else {
      $('.error_msg_user').css('display','block');
      $('.success_msg,.final_succes,.error_msg').css('display','none');
        return false;
     }
    }
    else {
       $('.error_msg').css('display','block');
       $('.success_msg,.final_succes,.error_msg_user').css('display','none');
             return false;
    }
		},
	});

    });

});

</script>

    <?php    echo "<h2>" . __( 'Tookan Task Api' ) . "</h2>"; ?>

<div class="error_msg" style="display: none;color:#FF0000;font-size: 14px;transition: 1s all ease;">Wrong credentials.</div>
<div class="error_msg_user" style="display: none; font-size: 14px;transition: 1s all ease;color:#FF0000;">Please enter user id.</div>
<div class="success_msg" style="display: none;color: #008000;font-size: 14px;transition: 1s all ease;">Logged in successfully.</div>
<div class="final_succes" style="display: none;font-size: 14px;transition: 1s all ease;color: #008000;">Saved Successfully</div>
 
<div class="wrap">

     
    <form name="oscimp_form" method="post" action="">
        <input type="hidden" name="oscimp_hidden" value="Y">
        <p><label><?php _e("Access Tookan : " ); ?></label><input type="text" name="get_access_tookan" value="<?php echo $dbhost; ?>" size="20" id="get_access" placeholder="Access Tookan"></p>
        <p><label><?php _e("User Id: " ); ?></label><input type="text" name="get_user_id" value="<?php echo $dbname; ?>" size="20" id="get_user_id" placeholder="User id"></p>
      
     
        <p class="submit">
        <input type="submit" name="start_task" value="<?php _e('Get started') ?>" id="start_task"/>
        </p>
    </form>
</div>


	<?php
 //echo $_SESSION['access_token']; 

}



?>