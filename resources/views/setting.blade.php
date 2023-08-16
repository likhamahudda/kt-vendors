<head> 
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous" type="text/javascript" charset="utf-8"></script>
      
 </head>
 
 
 <?php if(isset($social) && $social == 'linkedin'){  ?> 

  <script> 
    const url = `{{ url('auth/linkedin') }}?shop=<?php echo $shop; ?>`;  
    location.href = url; 
  </script>

<?php } ?> 

<?php if(isset($social) && $social == 'gmail'){  ?> 

<script> 
  const url = `{{ url('auth/google') }}?shop=<?php echo $shop; ?>`;  
  location.href = url; 
</script>

<?php } ?>

<?php if(isset($social) && $social == 'facebook'){  ?> 

<script> 
  const url = `{{ url('auth/facebook') }}?shop=<?php echo $shop; ?>`;  
  location.href = url; 
</script>

<?php } ?>

<?php if(isset($social) && $social == 'github'){  ?> 

<script> 
  const url = `{{ url('auth/github') }}?shop=<?php echo $shop; ?>`;  
  location.href = url; 
</script>

<?php } ?>

 
 <?php if(isset($social) && $social == 'social_login'){  ?>

  <script>
    window.open('','_self').close();
    const email = '<?php echo $email; ?>';
    const name = '<?php echo $name; ?>';
    const encodedEmail = encodeURIComponent(email);
    const url = `https://<?php echo $shop; ?>/account/login?email=${encodedEmail}&name=${name}`; 
    window.opener.location.href=url;  
</script>
 

<?php }  ?>
  

 


 
 

 
 
