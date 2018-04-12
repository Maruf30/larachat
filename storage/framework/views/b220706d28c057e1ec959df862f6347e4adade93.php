<?php
$recever=Route::input('id');	
?>

<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Secret chat</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="<?php echo e(asset('public/css/bootstrap.css')); ?>" rel="stylesheet">   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script> 
      
//  setInterval(soundCheck,1000); 
//  var first_run=0;
// function soundCheck() {
  

//    var oldMessage=$('#sound_check').val();
//     $.ajax({
//         type:'get',
//         url:'<?php echo e(URL::to('/sound')); ?>',
//         datatype:'html',
//         success:function(response){
//             $('#sound_check').val(response);
       
           
//             if (response != oldMessage) {
//                 response=oldMessage;
//                             if(first_run===0) {
//                                 first_run = 1; //if the user just loaded the page, we want to acknowledge that so the chime will play next time if there is a new chat
//                             } else {
//                              var audio = document.getElementById("audio");
//                              audio.play();
//                             }
                   
//                }
           
           
            
//            }
//         });
// }
  
  </script>
<script> 
 setInterval(seenMessage,1000); 
 setInterval(allMessageView,1000); 

function seenMessage() {
   

    $.ajax({
        type:'get',
        url:'<?php echo e(URL::to('/seen')); ?>',
        datatype:'html',
        success:function(response){
            
            if(response > 0){
                $('#smsnum').show();
                $('#smsnum').html(response);

            }else{
                $('#smsnum').hide();
            }
             
           }
        });
}
function allMessageView() {
   

    $.ajax({
        type:'get',
        url:'<?php echo e(URL::to('/allmessageview')); ?>',
        datatype:'html',
        success:function(response){
           $('#all-chat-message').html(response);
           }
        });
}

function seenUpdate() {

    $.ajax({
        type:'get',
        url:'<?php echo e(URL::to('/seenUpdate')); ?>',
        datatype:'html'
        });
}
function singleSeenUpdate(id) {
 var sender=id;
    $.ajax({
        type:'get',
        url:'<?php echo e(URL::to('/singleSeenUpdate')); ?>/'+sender,
        datatype:'html'
        });
}




</script>

</head>

<body>
<input type="hidden"id="sound_check">
<audio id="audio" src="https://notificationsounds.com/soundfiles/a86c450b76fb8c371afead6410d55534/file-sounds-1108-slow-spring-board.mp3" ></audio>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                      SecretMessage
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>
    </div>




</body>
</html>
