<div class="col-12 mt-5">
  @if (session()->has('success'))
  <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
  @elseif (session()->has('error'))
  <div class="alert alert-danger text-center">{{ session()->get('error') }}</div>
  @endif
</div>