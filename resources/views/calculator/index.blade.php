
@extends('posts.layout')
@section('content')

<form method="POST" action="/calculator">
@csrf  
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Entfernung (km)</label>
    <input type="number" class="form-control" step="0.1" name="Entfernung" id="Entfernung">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Preis pro Liter (€)</label>
    <input type="number" class="form-control" step="0.01" name="Preis" id="Preis">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Benzinverbrauch (l/100km)</label>
    <input type="number" class="form-control" step="0.1" name="Verbrauch" id="Verbrauch">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Anzahl der Beteiligten</label>
    <input type="number" class="form-control" step="1" name="Anzahl" id="Anzahl">
  </div>
  <button type="submit" class="btn btn-primary">Speichern</button>
  <div>
      <br></br>
      <h1>Die Spritkosten betragen €. Jeder Person muss € bezahlen!</h1>
      <h1 id="printHere"></h1>
  </div>
</form>
<button class="btn btn-primary" onclick="calculate()">Berechnen</button>

<script>


function calculate() {
  var entfernung = document.getElementById("Entfernung").value;
  var preis = document.getElementById("Preis").value;
  var verbrauch = document.getElementById("Verbrauch").value;
  var anzahl = document.getElementById("Anzahl").value;


  kilometerkosten= verbrauch*preis/100;
  spritpreis=kilometerkosten*entfernung;

  spritpreisAufgeteilt=spritpreis/anzahl;

  console.log(spritpreisAufgeteilt);

  document.getElementById("printHere").innerHTML = spritpreisAufgeteilt;

} 

</script>


@endsection