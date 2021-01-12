<?php 
/**
 *Plugin name: Example form plugin
 */

function example_form_plugin()
{
    $content = '';
    $content .= '<h2>Contact Us!/<h2>';
    $content ='<form method ="post" action ="http://localhost/simplon/thanks-you/">';

    $content .= '<label>Name</label>';
    $content .='<input type="text" name ="your_name"  class ="form-control" placeholder = "Enter your name"/>';

    $content .= '<label for="your_email">Email</label>';
    $content .= '<input type ="Email" name="your_email" placeholder ="Enter your Email"/>';

    $content .= '<label for="your_comments">Questions or Comments</label>';
    $content .= '<texterea name ="your_comments" placeholder ="Enter Your Questions or Comments"/>';

    $content .= '<br/><input type ="submit" name ="example_form_submit" class ="btn btn-primary" value =" Send Your Information"/>';
    $content .= '</form';    
    return $content;
}
add_shortcode('example_form', 'example_form_plugin');

function example_form_capture()
{
    if (isset($_POST['example_form_submit'])) 
    {
      $name =sanitize_text_field($_POST['your_name']);
      $email =sanitize_text_field($_POST['your_email']);
      $comments =sanitize_textarea_field($_POST['your_comments']);

      $to ="fallmena09@gmail.com";
      $subject = "submission";
      $message = ''.$name. '-'.$email .'-'.$comments;


      wp_mail($to,$subject,$message);



    }
}

add_action('wp_head' ,'example_form_capture');
?>