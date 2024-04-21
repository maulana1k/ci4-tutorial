<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container p-5">
    <form action="/note/new" method="POST">
        <?= csrf_field(); ?>
        <input name="title" type="text" class="display-3" style="outline: none;border: none;" placeholder="unitled">
        <div class="container mt-3 d-flex justify-content-between">
            <div class="text-secondary ">Created now</div>
            <div>
                <button type="submit" class="btn btn-success rounded-pill btn-sm"> <i data-feather="check"></i> Save</button>
            </div>
        </div>
        <div class="mt-3">
            <textarea autofocus="true" id="text" name="text" class="form w-100 control border-0  fs-5" style="resize: none;height:500px; outline:none;"></textarea>
        </div>
    </form>

</div>
<?= $this->endSection(); ?>