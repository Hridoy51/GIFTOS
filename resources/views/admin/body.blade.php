<h2 class="h5 no-margin-bottom">Dashboard</h2>
</div>
</div>
<section class="no-padding-top no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      <!-- Box 1 -->
      <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
        <div class="statistic-block block" style="min-height: 200px;">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-user-1"></i></div><strong>Total Clients</strong>
            </div>
            <div class="number dashtext-1">{{$user}}</div>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
              class="progress-bar progress-bar-template dashbg-1"></div>
          </div>
        </div>
      </div>

      <!-- Box 2 -->
      <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
        <div class="statistic-block block" style="min-height: 200px;">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-contract"></i></div><strong>Total Products</strong>
            </div>
            <div class="number dashtext-2">{{$product}}</div>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
              class="progress-bar progress-bar-template dashbg-2"></div>
          </div>
        </div>
      </div>

      <!-- Box 3 -->
      <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
        <div class="statistic-block block" style="min-height: 200px;">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Total Orders</strong>
            </div>
            <div class="number dashtext-3">{{$order}}</div>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"
              class="progress-bar progress-bar-template dashbg-3"></div>
          </div>
        </div>
      </div>

      <!-- Box 4 -->
      <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
        <div class="statistic-block block" style="min-height: 200px;">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Total Delivered</strong>
            </div>
            <div class="number dashtext-4">{{$delivered}}</div>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"
              class="progress-bar progress-bar-template dashbg-4"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="footer__block block no-margin-bottom">
    <div class="container-fluid text-center">
      <p class="no-margin-bottom">2024 &copy; GIFTOS.</p>
    </div>
  </div>
</footer>