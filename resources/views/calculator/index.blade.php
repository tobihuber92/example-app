@extends('posts.layout')
@section('content')

<form method="POST" action="/calculator">
@csrf  
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Entfernung (km)</label>
    <input type="number" class="form-control" step="0.1" name="Entfernung" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Preis pro Liter (€)</label>
    <input type="number" class="form-control" step="0.01" name="Preis">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Benzinverbrauch (l/100km)</label>
    <input type="number" class="form-control" step="0.1" name="Verbrauch">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Anzahl der Beteiligten</label>
    <input type="number" class="form-control" step="1" name="Anzahl">
  </div>
  <button class="btn btn-primary">Berechnen</button>
  <button type="submit" class="btn btn-primary">Speichern</button>

  <div>
      <br></br>
      <h1>Die Spritkosten betragen €. Jeder Person muss € bezahlen!</h1>
  </div>
</form>
@endsection