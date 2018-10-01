<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <p class="text-muted">© PDA Technical - All Rights Reserved | Logged in as: {{ Auth::user()->name }} ({{ Auth::user()->email }}) | IP : {{ request()->ip() }} | User Panel v0.1</p>
      </div>
      <div class="col-sm-3 text-right">
        &nbsp;
      </div>
    </div>
  </div>
</footer>