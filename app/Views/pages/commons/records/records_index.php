<?= $this->extend('layouts/main') ?>

<?= $this->section('breadcrumb') ?>
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h2 class="mb-0"><?= $page_header ?></h2>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
          <li class="breadcrumb-item active"><?= $title ?></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3"><?= $title ?></h1>
        <a href="<?= base_url('records/create') ?>" class="btn btn-primary">Add New Item</a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($records as $record): ?>
            <tr>
                <td><?= $record['id'] ?></td>
                <td><a href="<?= base_url('records/' . $record['id']) ?>"><?= $record['name'] ?></a></td>
                <td><?= $record['description'] ?></td>
                <td><?= $record['category'] ?></td>
                <td><?= $record['price'] ?></td>
                <td><?= $record['created_at'] ?></td>
                <td>
                    <a href="<?= base_url('records/edit/' . $record['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form action="<?= base_url('records/delete/' . $record['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?');">
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>
<?= $this->endSection() ?>


    
