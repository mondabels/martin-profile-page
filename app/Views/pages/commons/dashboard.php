<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Dashboard</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Small Box Widgets -->
<div class="row">
  <div class="col-lg-3 col-6">
    <div class="small-box text-bg-primary">
      <div class="inner"><h3>150</h3><p>New Orders</p></div>
      <a href="#" class="small-box-footer link-light">More info <i class="bi bi-link-45deg"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <div class="small-box text-bg-success">
      <div class="inner"><h3>53<sup class="fs-5">%</sup></h3><p>Bounce Rate</p></div>
      <a href="#" class="small-box-footer link-light">More info <i class="bi bi-link-45deg"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <div class="small-box text-bg-warning">
      <div class="inner"><h3>44</h3><p>User Registrations</p></div>
      <a href="#" class="small-box-footer link-dark">More info <i class="bi bi-link-45deg"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <div class="small-box text-bg-danger">
      <div class="inner"><h3>65</h3><p>Unique Visitors</p></div>
      <a href="#" class="small-box-footer link-light">More info <i class="bi bi-link-45deg"></i></a>
    </div>
  </div>
</div>

<!-- Main Row -->
<div class="row">
  <!-- Left Col -->
  <div class="col-lg-7 connectedSortable">
    <!-- Sales Chart Card -->
    <div class="card mb-4">
      <div class="card-header"><h3 class="card-title">Sales Value</h3></div>
      <div class="card-body"><div id="revenue-chart"></div></div>
    </div>

    <!-- Direct Chat Card -->
    <div class="card direct-chat direct-chat-primary mb-4">
      <div class="card-header"><h3 class="card-title">Direct Chat</h3></div>
      <div class="card-body">
        <div class="direct-chat-messages">
          <div class="direct-chat-msg">
            <div class="direct-chat-infos clearfix">
              <span class="direct-chat-name float-start">Alexander Pierce</span>
              <span class="direct-chat-timestamp float-end">23 Jan 2:00 pm</span>
            </div>
            <img class="direct-chat-img" src="./assets/img/user1-128x128.jpg" alt="user image" />
            <div class="direct-chat-text">Is this template really for free? That's unbelievable!</div>
          </div>
          <div class="direct-chat-msg end">
            <div class="direct-chat-infos clearfix">
              <span class="direct-chat-name float-end">Sarah Bullock</span>
              <span class="direct-chat-timestamp float-start">23 Jan 2:05 pm</span>
            </div>
            <img class="direct-chat-img" src="./assets/img/user3-128x128.jpg" alt="user image" />
            <div class="direct-chat-text">You better believe it!</div>
          </div>
          <!-- Add more chat messages here -->
        </div>
      </div>
      <div class="card-footer">
        <form action="#" method="post">
          <div class="input-group">
            <input type="text" name="message" placeholder="Type Message ..." class="form-control" />
            <span class="input-group-append">
              <button type="button" class="btn btn-primary">Send</button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Right Col -->
  <div class="col-lg-5 connectedSortable">
    <div class="card text-white bg-primary bg-gradient border-primary mb-4">
      <div class="card-header"><h3 class="card-title">World Map</h3></div>
      <div class="card-body"><div id="world-map" style="height:220px;"></div></div>
      <div class="card-footer border-0">
        <div class="row">
          <div class="col-4 text-center">
            <div id="sparkline-1" class="text-dark"></div>
            <div class="text-white">Visitors</div>
          </div>
          <div class="col-4 text-center">
            <div id="sparkline-2" class="text-dark"></div>
            <div class="text-white">Online</div>
          </div>
          <div class="col-4 text-center">
            <div id="sparkline-3" class="text-dark"></div>
            <div class="text-white">Sales</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>