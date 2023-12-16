<?php $__env->startSection('css'); ?>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/css/pages/app-academy.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/css/pages/question-style.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/css/pages/app-chat.css')); ?>">

<style>
        .custom-btn {
            padding: 10px 20px;
            background-color: #666CFF;
            color: #fff;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .custom-btn:hover {
            background-color: #0056b3;
        }
    </style>

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="card mt-5 border rounded">
    <div class="card-body  rounded p-4">



        <div class="row">
            <div class=" col-12 ">
                <ul class="list-group review-list">

                    <?php $__currentLoopData = $forums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <li class="list-group-item border-3 shadow rounded">
                        <div class="d-flex">
                            <img width="50px" src="<?php echo e(asset('assets/images/ask-icon.png')); ?>" class="avatar rounded" >
                            <div class="review-right col-sm-9">
                                <span class="author-name"><?php echo e($forum->student->name); ?></span>
                                <div class="time">
                                    <a href="#"><?php echo e(\Carbon\Carbon::parse($forum->created_at)->diffForHumans()); ?></a>
                                </div>
                                <?php if(!empty($forum->picture)): ?>
                                <img src="<?php echo e($forum->picture); ?>" class="ques-img img-fluid" >
                                <?php endif; ?>
                                <div class="review-des">
                                    <p> <?php echo e($forum->question); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="your-comments-container" id="comments-container-<?php echo e($forum->id); ?>">
                        <?php $__currentLoopData = $forum->forumcomments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <hr>

                        <div class="d-flex my-replay-1">
                            <div class="line-img-con">
                                <img src="<?php echo e($comment->commentor == 1 ? asset('assets/images/faces/face8.jpg') : asset('assets/images/ask-icon.png')); ?>" alt class="your-imag">
                            </div>
                            <div class="replay-img-info col-sm-9">
                                <div class="your-replay-con">
                                    <h1 class="stud-name"><?php echo e($comment->commentor == 1 ? 'استاذ محمد خيرى' : $forum->student->name); ?></h1>
                                    <p class="your-replay">
                                        <?php if(!empty($comment->picture)): ?>
                                        <?php if($comment->comment_type == 1): ?>
                                        <img src="<?php echo e($comment->picture); ?>" class="ques-img img-fluid" >
                                        <?php endif; ?>
                                        <br>
                                        <?php endif; ?>
                                        <?php echo e($comment->comment); ?></p>
                                </div>
                                <img src alt class="your-img-2 img">
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                        <div class="chat-history-footer card border-3 shadow">
                            <form class="form-send-message d-flex justify-content-between align-items-center" id="comment-form-<?php echo e($forum->id); ?>">
                                <input type="hidden" name="forum_id" value="<?php echo e($forum->id); ?>">
                                <textarea class="form-control message-input shadow-none" name="comment" placeholder="اشرح هنا" cols="25" rows="2"></textarea>
                                <div class="message-actions d-flex align-items-center">
                                    <label for="attach-doc-<?php echo e($forum->id); ?>" class="form-label mb-0">
                                        <i class="mdi mdi-paperclip mdi-20px cursor-pointer btn btn-text-secondary btn-icon rounded-pill me-2 ms-1"></i>
                                        <input type="file" id="attach-doc-<?php echo e($forum->id); ?>" name="picture" hidden>
                                    </label>
                                    <button type="button" class="btn btn-primary d-flex send-msg-btn" onclick="submitForm(<?php echo e($forum->id); ?>)">
                                        <span class="align-middle">ارسل</span>
                                    </button>
                                </div>
                            </form>
                        </div>


                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- Repeat the structure for additional questions -->
                </ul>
            </div>
        </div>

        <br>
        <center>
              <nav aria-label="Page navigation">
                <ul class="pagination pagination-outline-primary">
                    <?php echo $forums -> links(); ?>

                </ul>
                </nav>
            </center>

    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>


    <script src="<?php echo e(asset('admin/assets/vendor/libs/jstree/jstree.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/js/extended-ui-treeview.js')); ?>"></script>


    <script src="<?php echo e(asset('admin/assets/js/app-chat.js')); ?>"></script>

    <script>


    function submitForm(forumId) {
        var formData = new FormData($(`#comment-form-${forumId}`)[0]);
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        formData.append('_token', csrfToken);

        $.ajax({
            type: 'POST',
            url: '<?php echo e(route("postadmin.comment")); ?>',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                var commentText = formData.get('comment');
                var picture = formData.get('picture');

                var newCommentHtml = `
                    <hr>
                    <div class="d-flex my-replay-1">
                        <div class="line-img-con">
                            <img src="<?php echo e(asset('assets/images/faces/face8.jpg')); ?>" alt class="your-imag">
                        </div>
                        <div class="replay-img-info col-sm-9">
                            <div class="your-replay-con">
                                <h1 class="stud-name">الاستاذ محمد خيرى</h1>
                                <p class="your-replay">${commentText || ''}</p>
                            </div>
                            ${picture ? `<img src="${URL.createObjectURL(picture)}" alt class="your-img-2 img">` : ''}
                        </div>
                    </div>
                `;

                $(`#comments-container-${forumId}`).append(newCommentHtml);

                $(`#comment-form-${forumId} textarea[name="comment"]`).val('');
                $(`#comment-form-${forumId} #attach-doc`).val('');
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.new-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web-Development\Khairy\Khairy\resources\views/admin/new/allforums.blade.php ENDPATH**/ ?>