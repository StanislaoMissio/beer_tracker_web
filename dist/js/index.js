
function chamarTela(tela){
  $("#main").load(tela+".php");
}

$(document).ready(function(){
var value; 

  $.ajax({
    type: "POST",
    url: "../list/report.php",
    data: { },
    async: false
  }).done(function( json ) {
    value = json;
  });

  var myChart = new Chart($("#myChart"), {
    type: 'pie',
    data: {
      labels: ["Sunday", "Monday", "Tuesday"],
      datasets: [{
        data: [value],
        backgroundColor: [
          'red',
          'blue',
          'black'
        ],
      }]
    },
  });
});