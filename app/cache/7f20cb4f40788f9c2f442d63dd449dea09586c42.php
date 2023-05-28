<?php echo $__env->make('template.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    <?php echo $__env->make('assets.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</style>
<script src="https://kit.fontawesome.com/0e408e02c3.js" crossorigin="anonymous"></script>
<section id="container">
    <?php echo $__env->make('template.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <article class="blog-section">
        <div class="blog-wrapper">

            <h2 class="blog-title">Update Post</h2>

            <?php if(!empty($_SESSION['error_data'])): ?>
                <ul class="error-list">
                    <?php $__currentLoopData = $_SESSION['error_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="error">
                            <?php echo e($error); ?>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        unset($_SESSION['error_data']);
                    ?>
                </ul>
            <?php endif; ?>

            <form action="/update-post" method="POST" enctype="multipart/form-data">
                <input name="id" type="hidden" value="<?php echo e($post->getId()); ?>" />
                <label>Title:</label>
                <input value="<?php echo e($post->getTitle()); ?>" type="text" id="title" name="title" required></br>

                <label>Description:</label>
                <textarea name="content" class="comment-textarea" rows="5" required><?php echo e($post->getContent()); ?></textarea>

                <label>Profile image:</label>
                <input type="file" id="img" name="image" accept="image/*"></br>

                <input type="submit" value="Submit">
            </form>

        </div>
    </article>


</section>

<?php echo $__env->make('template.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /Users/faridrzayev/Desktop/packs 2/app/views/post_edit.blade.php ENDPATH**/ ?>