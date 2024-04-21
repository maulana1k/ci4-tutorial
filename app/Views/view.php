<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container p-5">
    <form action="/note/<?= $notes['id'] ?>" method="post">
        <?php if (session()->has('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif (session()->has('fail')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <input type="text" name="title" class="display-3" style="outline: none;border: none;" placeholder="unitled" value="<?= $notes['title']; ?>">
        <div class="container mt-3 d-flex justify-content-between">
            <div class="text-secondary "><?php
                                            $date = new DateTime($notes['updated_at']);
                                            echo $date->format('M d, Y H:i');
                                            ?></div>
            <div>
            </div>
        </div>
        <div class="mt-3">
            <textarea name="text" class="form w-100 control border-0 fs-5" style="resize: none;height:400px; outline:none;"> <?= $notes['text']; ?> </textarea>
        </div>
        <button type="submit" class="btn btn-success rounded-pill btn-sm"> <i data-feather="check"></i> Save</button>
    </form>
    <form action="/note/delete/<?= $notes['id'] ?>" method="post" class="mt-2">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-danger rounded-pill btn-sm" onclick="confirm('Delete this note?')"> <i data-feather="trash"></i>Delete</button>
    </form>

</div>
<?= $this->endSection(); ?>