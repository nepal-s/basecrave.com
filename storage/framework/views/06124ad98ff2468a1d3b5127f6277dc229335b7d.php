<!------ Include the above in your HEAD tag ---------->
<?php $__env->startSection('content'); ?>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Menu Items Update</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li class="breadcrumb-item active">Menu Items Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="<?php echo e(route('items')); ?>"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Go Back
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('items.update', $items->id)); ?>"
                          class="form-horizontal form-material" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Menu Item Name</label>
                                <input type="text" name="title" class="form-control" value="<?php echo e($items->title); ?>" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Sub Category</label>
                                <select name="subcategories_id" id="subcategories" class="form-control">
                                    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($row->id); ?>" <?php echo e($row->id == $items->subcategory_id ? 'selected' : ''); ?>><?php echo e($row->subcategories_name); ?></option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12" >Description</label>
                                <textarea name="description"  class="form-control"
                                          placeholder="Write description here *" style="width: 100%; height: 80%;"><?php echo e($items->description); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Menu Item Price</label>
                                <input type="text" name="price" class="form-control" value="<?php echo e($items->price); ?>" required>
                            </div>
                        </div>
                        
                        <?php if($items->image): ?>
                            <div class="col-md-12">
                                <input type="file" id="logo" class="btn btn-primary" name="image" accept="image/*">
                                <?php if($items->image): ?>
                                            <img id="image_preview"
                                                 src="<?php echo e(asset('images/items').'/'.$items->image); ?>" height="100px"
                                                 width="100px" style="float:right;"><?php endif; ?>
                            </div>
                            <?php else: ?>
                            <div class="col-md-12">
                                <input type="file" id="logo" class="btn btn-primary" name="image" accept="image/*" required>
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




<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/basecampcafe/public_html/basecrave.com/resources/views/backend/items/edit.blade.php ENDPATH**/ ?>