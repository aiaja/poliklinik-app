@if(session('success'))
  <div class="alert alert-success" id="alert{{ session('success') }}">
  </div>
@endif

<script>
  setTimeout(() => {
    const alert = document.getElementById('alert');
    if (alert) alert.remove();
  }, 3000);
</script>
