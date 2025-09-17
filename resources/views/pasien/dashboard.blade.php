<x-layouts.app title="Dashboard Pasien">
  <h1>Hello pasien!</h1>
  <form method="POST" action="/logout">
    @csrf
    <button>Logout</button>
  </form>
</x-layouts.app>
