<?php $__env->startSection('content'); ?>
<?php 
$users = DB::table('users')->get();


?>
<link href="<?php echo e(asset('public/css/style.css')); ?>" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
               
               
                <a onclick="seenUpdate()" style="color:#fff;text-decoration:none; margin-left: 12px;" href="<?php echo e(URL::to('/')); ?>"> 
                     <span class="glyphicon glyphicon-comment"> 
                     
                     
                     </span> <b class="smsnum"id="smsnum"></b> Message
                </a>
               
               
                <a style="color:#fff;text-decoration:none; margin-left: 12px;" href="<?php echo e(URL::to('/users')); ?>"> 
                     <span class="glyphicon glyphicon-user"></span> User
                </a>
                </a>
                <a style="color:#fff; text-decoration:none;    margin-left: 12px;" href="<?php echo e(URL::to('/')); ?>"> 
                     <span class="glyphicon glyphicon-search"></span> Search 
                </a>
                   
                    
                </div>
                <div class="panel-body">
                    
               
                    <ul class="chat">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($user->id != Auth::id()): ?>
                        <a href="<?php echo e(URL::to('/message/'.$user->id)); ?>"> 
                        <li class="left clearfix">
                                <span class="chat-img pull-left">
                                <img alt="User Avatar" class="img-circle" src="http://placehold.it/25/55C1E7/fff&amp;text=U"></span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font"><?php echo e($user->name); ?></strong>
                                    </div>
                                </div>
                            </li>                   
                        </a>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  
                </div>
               
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>