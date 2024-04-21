<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container pt-5">
    <div class="display-5 fw-medium d-inline ">Not App</div>
    <div class="container  mt-4 d-flex justify-content-between align-items-end">
        <div class="h4">All notes <span class="text-success"><?= count($notes) ?: 0 ?></span> </div>
        <div></div>
        <a href="/note/new" class="btn btn-success rounded-pill btn-lg"> <i data-feather="plus"></i> New Note</a>
    </div>
    <div class="container mt-3">
        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-4">
            <?php foreach ($notes as $note) : ?>
                <div class="col">
                    <a href="/note/<?= $note['id']; ?>" style="text-decoration: none; color: inherit;">
                        <div class="card rounded-5 border-0 bg-body-secondary p-2 h-full ">
                            <div class="card-body">
                                <div class="card-title fs-2"><?= $note['title']; ?></div>
                                <div class="text-secondary "><?php
                                                                $date = new DateTime($note['updated_at']);
                                                                echo $date->format('M d, Y H:i');
                                                                ?></div>
                                <div class="card-text overflow-hidden mt-3" style="height: 200px;"><?= $note['text']; ?></div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>