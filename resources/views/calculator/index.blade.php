
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
  <div id="liveAlertPlaceholder"></div>
<button type="button" class="btn btn-primary" id="liveAlertBtn" onclick="calculate()">Berechnen</button>

  <button type="submit" class="btn btn-primary">Speichern</button>
</form>





<script>
var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
var alertTrigger = document.getElementById('liveAlertBtn')

function calculate() {
  var entfernung = document.getElementById("Entfernung").value;
  var preis = document.getElementById("Preis").value;
  var verbrauch = document.getElementById("Verbrauch").value;
  var anzahl = document.getElementById("Anzahl").value;


  kilometerkosten= verbrauch*preis/100;
  
  spritpreis= kilometerkosten*entfernung;
  spritpreisAufgeteilt=spritpreis/anzahl;

}


function alert(message, type) {
  var wrapper = document.createElement('div')
  wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

  alertPlaceholder.append(wrapper)
}

if (alertTrigger) {
  alertTrigger.addEventListener('click', function () {
    alert('Spritpreis insgesamt: ' + spritpreis.toFixed(2) +'€', 'success')
    alert('Spritpreis pro Person: ' + spritpreisAufgeteilt.toFixed(2) +'€', 'success')
    
  })
}

</script>


@endsection