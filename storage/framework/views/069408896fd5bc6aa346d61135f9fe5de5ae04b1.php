<!------ Include the above in your HEAD tag ---------->
<style>
    textarea.form-control {
    width: 100%;
    height: 200px!important;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
    }
    </style>
<?php $__env->startSection('content'); ?>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Sub Categories Update</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li class="breadcrumb-item active">Sub Categories Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="<?php echo e(route('subcategories')); ?>"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Go Back
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('subcategories.update', $subcategories->id)); ?>"
                          class="form-horizontal form-material" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Sub Categories Name</label>
                                <input type="text" name="subcategories_name" class="form-control" value="<?php echo e($subcategories->subcategories_name); ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Parent Category</label>
                                <select name="categories_id" id="categories" class="form-control">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($row->id); ?>" <?php echo e($row->id == $subcategories->categories_id ? 'selected' : ''); ?>><?php echo e($row->categories_name); ?></option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12" >Short Description</label>
                                <textarea name="short_description" id="description" class="form-control"
                                          placeholder="Write description here *" style="width: 100%; height: 80%;"><?php echo e($subcategories->short_description); ?></textarea>
                            </div>
                        </div>

                        <?php if($subcategories->subcategories_image): ?>
                            <div class="col-md-12">
                                <input type="file" id="logo" class="btn btn-primary" name="image" accept="image/*">
                                <?php if($subcategories->subcategories_image): ?>
                                            <img id="image_preview"
                                                 src="<?php echo e(asset('images/subcategories').'/'.$subcategories->subcategories_image); ?>" height="100px"
                                                 width="100px" style="float:right;"><?php endif; ?>
                            </div>
                            <?php else: ?>
                            <div class="col-md-12">
                                <input type="file" id="logo" class="btn btn-primary" name="image" accept="image/*">
                            </div>
                            <?php endif; ?>
                            <br>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $('#description').ckeditor({})
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\BaseCrave\resources\views/backend/subcategories/edit.blade.php ENDPATH**/ ?>