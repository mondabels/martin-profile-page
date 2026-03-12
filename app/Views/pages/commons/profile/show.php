<?= $this->extend('layouts/main'); ?>

<?= $this->section('breadcrumb') ?>
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Student Profile</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Students</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Student Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Profile Image Section -->
                        <div class="col-md-4 text-center mb-4">
                            <?php if (!empty($user['profile_image'])): ?>
                                <img src="<?= base_url('uploads/profile/' . $user['profile_image']) ?>" alt="Profile Image"
                                    class="img-fluid rounded-circle mb-3"
                                    style="width:150px;height:150px;object-fit:cover;">
                            <?php else: ?>
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mx-auto mb-3"
                                    style="width:150px;height:150px;">
                                    <i class="fas fa-user fa-5x text-white"></i>
                                </div>
                            <?php endif; ?>
                            <h4 class="mb-0"><?= esc($user['fullname']) ?></h4>
                            <p class="text-muted"><?= esc($user['course']) ?></p>
                        </div>

                        <!-- Student Details Section -->
                        <div class="col-md-8">
                            <dl class="row">
                                <dt class="col-sm-4">Student ID:</dt>
                                <dd class="col-sm-8"><?= esc($user['student_id'] ?? 'N/A') ?></dd>

                                <dt class="col-sm-4">Full Name:</dt>
                                <dd class="col-sm-8"><?= esc($user['fullname']) ?></dd>

                                <dt class="col-sm-4">Email Address:</dt>
                                <dd class="col-sm-8"><?= esc($user['username']) ?></dd>

                                <dt class="col-sm-4">Phone Number:</dt>
                                <dd class="col-sm-8"><?= esc($user['phone'] ?? 'N/A') ?></dd>

                                <dt class="col-sm-4">Course:</dt>
                                <dd class="col-sm-8"><?= esc($user['course']) ?></dd>

                                <dt class="col-sm-4">Year Level:</dt>
                                <dd class="col-sm-8"><?= esc($user['year_level'] ?? 'N/A') ?></dd>

                                <dt class="col-sm-4">Section:</dt>
                                <dd class="col-sm-8"><?= esc($user['section'] ?? 'N/A') ?></dd>

                                <dt class="col-sm-4">Address:</dt>
                                <dd class="col-sm-8"><?= esc($user['address'] ?? 'N/A') ?></dd>

                                <dt class="col-sm-4">Account Created:</dt>
                                <dd class="col-sm-8">
                                    <?= !empty($user['created_at']) ? date('F d, Y h:i A', strtotime($user['created_at'])) : 'N/A' ?>
                                </dd>

                                <dt class="col-sm-4">Last Updated:</dt>
                                <dd class="col-sm-8">
                                    <?= !empty($user['updated_at']) ? date('F d, Y h:i A', strtotime($user['updated_at'])) : 'N/A' ?>
                                </dd>
                            </dl>

                            <div class="mt-4">
                                <a href="<?= base_url('profile/edit') ?>" class="btn btn-primary">
                                    <i class="fas fa-edit me-2"></i>Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>