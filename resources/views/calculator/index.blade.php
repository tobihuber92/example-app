@extends('posts.layout')
@section('content')

<script>

function calculateAjax(){
$.ajax({
        method:'GET',
        url: '/calculate-function',
        beforeSend: function(xhr){
          $("#liveAlertPlaceholder").empty();
        }
        ,data: { 
          Entfernung:$("#Entfernung").val(), 
          Preis:$("#Preis").val(),
          Verbrauch:$("#Verbrauch").val(),
          Anzahl:$("#Anzahl").val(),
        }})
        .done(function( result ) {
          $("#liveAlertPlaceholder").append('<div id="success" class="alert alert-success alert-dismissible" role="alert">');
          $("#success").append('Spritpreis insgesamt: ');
          $("#success").append(result.SpritpreisGesamt);
          $("#success").append('€');
          $("#success").append('<br>');
          $("#success").append('Spritpreis pro Person: ');
          $("#success").append(result.SpritpreisAufgeteilt);
          $("#success").append('€');
          $("#liveAlertPlaceholder").append('</div>');

        });
      }

      var alertPlaceholder = document.getElementById('liveAlertPlaceholder')

        function alert(message, type){
          var wrapper = document.createElement('div');
          wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          alertPlaceholder.append(wrapper);
        }

</script>


<form method="POST" action="/calculator">
@csrf  
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Entfernung (km)</label>
    <input type="number" class="form-control" step="0.1" name="Entfernung" id="Entfernung" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Preis pro Liter (€)</label>
    <input type="number" class="form-control" step="0.01" name="Preis" id="Preis" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Benzinverbrauch (l/100km)</label>
    <input type="number" class="form-control" step="0.1" name="Verbrauch" id="Verbrauch" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Anzahl der Beteiligten</label>
    <input type="number" class="form-control" step="1" name="Anzahl" id="Anzahl" required>
  </div>
  <div id="liveAlertPlaceholder"></div>
    <button type="button" class="btn btn-primary" id="liveAlertBtn" onclick="calculateAjax()">Berechnen</button>
    <button type="submit" class="btn btn-primary">Speichern</button>
</form>

@endsection