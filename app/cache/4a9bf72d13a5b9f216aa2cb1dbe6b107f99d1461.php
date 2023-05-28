<?php echo $__env->make('template.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="https://kit.fontawesome.com/0e408e02c3.js" crossorigin="anonymous"></script>
<section id="container">
    <?php echo $__env->make('template.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <article class="blog-section">
        <div class="blog-wrapper">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="blog">
                    <h2 class="blog-title">
                        <?php echo e($post->getTitle()); ?>

                    </h2>
                    <h3 class="blog-title">
                        <?php echo e($post->getContent()); ?>

                    </h3>

                    <?php
                        echo $post->getCreatedAt();
                    ?>
                    <div class="blog-body">
                        <a href="/">
                            <img src="/uploads/posts/<?php echo e($post->getImage()); ?>" alt="JavaScript logo" class="blog-image"
                                id="blog-image">
                        </a>

                        <div class="form-buttons">
                            <?php if($post->getAuthor() == $_SESSION['id']): ?>
                                <a href="/edit-post/<?php echo e($post->getId()); ?>"><button class="remove"><i
                                            class="fa fa-refresh" aria-hidden="true"></i></button></a>
                                <form action="delete-post/<?php echo e($post->getId()); ?>" method="POST">
                                    <button class="remove"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            <?php endif; ?>
                        </div>


                    </div>
                    <span">Comments: <?php echo $post->getCommentCount(); ?></span>
                        <div class="blog-comments">
                            <div class="comment-list">

                                <?php $__currentLoopData = $post->getComments(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="single-comment">

                                        <div class="comment-data">
                                            <?php echo $key+1;  ?>
                                            <div class="profile-right">
                                                <div class="profile-wrapper">
                                                    <div style="display:flex; gap:15px; align-items: center">
                                                        <h4 class="name">
                                                            <?php echo e($comment->getAuthorData()['name']); ?>

                                                        </h4>
                                                        <time class="comment-date" datetime="2022-03-03T13:52:00">
                                                            <?php echo e($comment->getCreatedDate()); ?>

                                                        </time>
                                                    </div>
                                                    <p id="comment-text">
                                                        <?php echo e($comment->getText()); ?>

                                                    </p>

                                                </div>
                                            </div>
                                        </div>

                                        <?php if($comment->getUserId() == $_SESSION['id']): ?>
                                            <form action="delete-comment/<?php echo e($comment->getId()); ?>" method="POST">
                                                <button class="remove">Remove</button>
                                            </form>
                                        <?php endif; ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            <div class="new-comment">
                                <form action="/create-comment/<?php echo e($post->getId()); ?>" method="POST"
                                    class="send-comment-form">
                                    <textarea name="text" placeholder="Write your comment" class="comment-textarea" id="comment-textarea" name="message"
                                        rows="5" required></textarea>
                                    <div class="submit-comment-wrapper">
                                        <button type="submit" id="submit-comment">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </article>
</section>

<?php echo $__env->make('template.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /Users/faridrzayev/Desktop/packs 2/app/views/home.blade.php ENDPATH**/ ?>