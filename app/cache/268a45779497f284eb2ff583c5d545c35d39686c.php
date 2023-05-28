<?php echo $__env->make("template/header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
  <?php echo $__env->make('assets.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</style>

<section id="container">

  <?php echo $__env->make("template/navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <article class="blog-section">
    <div class="blog-wrapper">
      <div style="padding:30px" class="blog">
      Author:
      <?php
            echo $_SESSION['user'];
      ?>
        <br><br><br>
        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
      </div>
      <div>
      
      </div>
    </div>
  </article>
</section>


<?php echo $__env->make("template/footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/faridrzayev/Desktop/packs 2/app/views/imprint.blade.php ENDPATH**/ ?>