<?php echo $__env->make("template/header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
  <?php echo $__env->make('assets.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</style>

<section id="container">

  <?php echo $__env->make("template/navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <article class="blog-section">
    <div class="blog-wrapper">
      <div class="blog">
        <h2 class="blog-title">Login page</h2>

        <?php if(isset($_SESSION['error_data'])): ?>
          <p class="error">
            <?php echo e($_SESSION['error_data']); ?>

          </p>
        <?php else: ?>
          <?php
            unset($_SESSION['error_data']);
          ?>
        <?php endif; ?>

        <form action="/login" method="post">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required><br>

          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required><br>

          <input type="submit" value="Login">
        </form>
      </div>
    </div>
  </article>
</section>


<?php echo $__env->make("template/footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/faridrzayev/Desktop/packs 2/app/views//login.blade.php ENDPATH**/ ?>