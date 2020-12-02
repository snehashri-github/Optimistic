<?php function user_style() {
$plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_style( 'style',  $plugin_url . "/css/style.css");
 }
add_action( 'wp_enqueue_scripts', 'user_style' );

function userform(){ ?>
<div class='wrap'>  
        <h2>User Form</h2>  
        <div class="main-content">  
  
        <!-- You only need this form and the form-basic.css -->  
        <form class="form-basic" method="post" action="#"> 
		<input type="name" placeholder="Your Name" name="Name"><br/>
		<input type="email" placeholder="Email" name="email"><br/>
		<input type="number" placeholder="Number" name="Number">
		<input id="contact-form" type="submit" value="Submit"> 
        </form> 
		<?php echo $name = $_POST['Name']; 
		echo "<br/>";
		echo  $visitor_email = $_POST['email'];
		echo "<br/>";
		echo  $phone = $_POST['Number'];
		?>
	</div>
</div>
<?php } 

add_shortcode('formuser', 'userform');
?>
<script src="http://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
        $("#contact-form").on('submit',function() {		
		var dataString = $(this).serialize();
				$.ajax({
                    type: "POST",
                    url: "init.php",
                    data: dataString,
                    success: function(data){
                        $('#contact-form')[0].reset(); // to reset form data
                    }
                });
            });
</script>