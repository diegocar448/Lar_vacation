

<?php $__env->startSection('content'); ?>

<div class="bred">
    <a href="<?php echo e(route('panel')); ?>" class="bred">Home  ></a>
    <a href="<?php echo e(route('planes.index')); ?>" class="bred">Planes</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Aviões</h1>
</div>


<div class="content-din bg-white">

    <div class="form-search">        

        
        

        <?php if(isset($dataForm['key_search'])): ?>
            <div class="alert alert-info">
                <p>
                    <a href="<?php echo e(route('planes.index')); ?>"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                    Resultados para: <strong><?php echo e($dataForm['key_search']); ?></strong>
                </p>
            </div>
        <?php endif; ?>
    </div>
 

    <div class="messages">
       <?php echo $__env->make('panel.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="class-btn-insert">
        <a href="<?php echo e(route('planes.create')); ?>" class="btn-insert">
            <span class="glyphicon glyphicon-plus"></span>
            Cadastrar Avião
        </a>
    </div>
    
    <table class="table table-striped">
        <tr>
            <th>#id</th>
            <th>Classe</th>
            <th>Marca</th>
            <th>Total de Passageiros</th>
            <th width="200">Ações</th>
        </tr>

        <?php $__empty_1 = true; $__currentLoopData = $planes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plane): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($plane->id); ?></td>
                <td><?php echo e($plane->classes($plane->class)); ?></td>
                <td><?php echo e($plane->brand->name); ?></td>
                <td><?php echo e($plane->qty_passengers); ?></td>
                <td>
                    <a href="<?php echo e(route('planes.edit', $plane->id)); ?>" class="edit">Edit</a>
                    <a href="<?php echo e(route('planes.show', $plane->id)); ?>" class="delete">View</a>
                    <a href="" class="edit">
                        <i class="fa fa-plane" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="200">Nenhum item cadastrado!</td>
            </tr>
        <?php endif; ?>
    </table>

    <?php if(isset($dataForm)): ?>
        <?php echo $planes->appends($dataForm)->links(); ?>

    <?php else: ?>
        <?php echo $planes->links(); ?>

    <?php endif; ?>

</div><!--Content Dinâmico-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('panel.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/laravel58/resources/views/panel/planes/index.blade.php ENDPATH**/ ?>