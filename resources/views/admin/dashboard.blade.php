<x-layouts.app title="Dashboard Admin">
  <h1>Hello admin!</h1>
  <form method="POST" action="/logout">
    @csrf
    <button>Logout</button>
  </form>
</x-layouts.app>
