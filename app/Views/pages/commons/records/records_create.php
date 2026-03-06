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
          <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-3">Add New Product</h1>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('records/store') ?>" method="POST">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?= old('name') ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required><?= old('description') ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" value="<?= old('category') ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" step="0.01" value="<?= old('price') ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Record</button>
        <a href="<?= base_url('records') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>