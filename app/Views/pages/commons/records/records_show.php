<?= $this->extend('layouts/main'); ?>

<?= $this->section('breadcrumb') ?>
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h2 class="mb-0">Inventory Management System</h2>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">View</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-3">Product Details</h1>

    <dl class="row">
        <dt class="col-sm-3">ID</dt>
        <dd class="col-sm-9"><?= $record['id'] ?></dd>

        <dt class="col-sm-3">Name</dt>
        <dd class="col-sm-9"><?= $record['name'] ?></dd>

        <dt class="col-sm-3">Description</dt>
        <dd class="col-sm-9"><?= $record['description'] ?></dd>

        <dt class="col-sm-3">Category</dt>
        <dd class="col-sm-9"><?= $record['category'] ?></dd>

        <dt class="col-sm-3">Price</dt>
        <dd class="col-sm-9"><?= $record['price'] ?></dd>

        <dt class="col-sm-3">Created At</dt>
        <dd class="col-sm-9"><?= $record['created_at'] ?></dd>

        <dt class="col-sm-3">Updated At</dt>
        <dd class="col-sm-9"><?= $record['updated_at'] ?></dd>
    </dl>

    <a href="<?= base_url('records/edit/' . $record['id']) ?>" class="btn btn-warning">Edit</a>
    <a href="<?= base_url('records') ?>" class="btn btn-secondary">Back</a>
</div>

<?= $this->endSection() ?>