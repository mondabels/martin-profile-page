<?= $this->extend('layouts/main'); ?>

<?= $this->section('breadcrumb') ?>
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Profile</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Profile</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Profile Information</h3>
                </div>

                <div class="card-body">

                    <form action="<?= base_url('profile/update') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <!-- PROFILE IMAGE -->
                        <div class="mb-4 text-center">
                            <label class="form-label d-block">Profile Image</label>

                            <?php if (!empty($user['profile_image'])): ?>

                                <img id="preview" src="<?= base_url('uploads/profile/' . esc($user['profile_image'])) ?>"
                                    class="img-fluid rounded-circle" style="width:150px;height:150px;object-fit:cover;">

                            <?php else: ?>

                                <div id="placeholder"
                                    class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mx-auto"
                                    style="width:150px;height:150px;">
                                    <i class="fas fa-user fa-5x text-white"></i>
                                </div>

                                <img id="preview" src="" class="img-fluid rounded-circle d-none"
                                    style="width:150px;height:150px;object-fit:cover;">

                            <?php endif; ?>

                        </div>

                        <div class="mb-3">
                            <input type="file" name="profile_image" id="profile_image"
                                class="form-control <?= (session()->getFlashdata('errors')['profile_image'] ?? false) ? 'is-invalid' : '' ?>"
                                accept="image/*">

                            <?php if (session()->getFlashdata('errors')['profile_image'] ?? false): ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashdata('errors')['profile_image'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- STUDENT ID + NAME -->
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Student ID</label>
                                <input type="text" name="student_id" class="form-control"
                                    value="<?= old('student_id', esc($user['student_id'] ?? '')) ?>" readonly>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="fullname"
                                    class="form-control <?= (session()->getFlashdata('errors')['fullname'] ?? false) ? 'is-invalid' : '' ?>"
                                    value="<?= old('fullname', esc($user['fullname'])) ?>" required>

                                <?php if (session()->getFlashdata('errors')['fullname'] ?? false): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['fullname'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>

                        <!-- EMAIL -->
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="username"
                                class="form-control <?= (session()->getFlashdata('errors')['username'] ?? false) ? 'is-invalid' : '' ?>"
                                value="<?= old('username', esc($user['username'])) ?>" required>

                            <?php if (session()->getFlashdata('errors')['username'] ?? false): ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashdata('errors')['username'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- PHONE -->
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="phone"
                                class="form-control <?= (session()->getFlashdata('errors')['phone'] ?? false) ? 'is-invalid' : '' ?>"
                                value="<?= old('phone', esc($user['phone'] ?? '')) ?>">

                            <?php if (session()->getFlashdata('errors')['phone'] ?? false): ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashdata('errors')['phone'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- COURSE / YEAR / SECTION -->
                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Course</label>
                                <input type="text" name="course"
                                    class="form-control <?= (session()->getFlashdata('errors')['course'] ?? false) ? 'is-invalid' : '' ?>"
                                    value="<?= old('course', esc($user['course'])) ?>">

                                <?php if (session()->getFlashdata('errors')['course'] ?? false): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['course'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Year Level</label>
                                <input type="text" name="year_level"
                                    class="form-control <?= (session()->getFlashdata('errors')['year_level'] ?? false) ? 'is-invalid' : '' ?>"
                                    value="<?= old('year_level', esc($user['year_level'] ?? '')) ?>">

                                <?php if (session()->getFlashdata('errors')['year_level'] ?? false): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['year_level'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Section</label>
                                <input type="text" name="section"
                                    class="form-control <?= (session()->getFlashdata('errors')['section'] ?? false) ? 'is-invalid' : '' ?>"
                                    value="<?= old('section', esc($user['section'] ?? '')) ?>">

                                <?php if (session()->getFlashdata('errors')['section'] ?? false): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['section'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>

                        <!-- ADDRESS -->
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" rows="3"
                                class="form-control <?= (session()->getFlashdata('errors')['address'] ?? false) ? 'is-invalid' : '' ?>"><?= old('address', esc($user['address'] ?? '')) ?></textarea>

                            <?php if (session()->getFlashdata('errors')['address'] ?? false): ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashdata('errors')['address'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- BUTTONS -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                            <a href="<?= base_url('profile') ?>" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- IMAGE PREVIEW SCRIPT -->
<script>
    document.getElementById('profile_image').addEventListener('change', function (event) {

        const file = event.target.files[0];

        if (file) {

            const reader = new FileReader();

            reader.onload = function (e) {

                const preview = document.getElementById('preview');
                const placeholder = document.getElementById('placeholder');

                preview.src = e.target.result;
                preview.classList.remove('d-none');

                if (placeholder) {
                    placeholder.classList.add('d-none');
                }

            };

            reader.readAsDataURL(file);

        }

    });
</script>

<?= $this->endSection(); ?>