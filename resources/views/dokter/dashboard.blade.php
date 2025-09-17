<x-layouts.app title="Dashboard Dokter">
  <h1>Hello dokter!</h1>
  <form method="POST" action="/logout">
    @csrf
    <button>Logout</button>
  </form>
</x-layouts.app>
