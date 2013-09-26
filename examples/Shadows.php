<?php
$root = "..";
require_once("$root/_base.php");
?>

<?pageHeader("Examples")?>

<link rel="stylesheet" href="<?=ROOT?>/js/highlight-7.3/styles/github-code.css">
<script src="<?=ROOT?>/js/highlight-7.3/highlight.pack.js"></script>

<style>
label {
  height: 20px;
}
</style>

<h1>Building shadows</h1>

<p>Try out changing sliders for date and time.<br>
Fun task: try to spot the day when daylight saving time starts/ends.<br><br>

<input id="date" type="range" min="1" max="365" step="1"><label for="date"></label><br>
<input id="time" type="range" min="0" max="23" step="1"><label for="time"></label>
</p>

<legend>Example</legend>
<code><?=htmlentities("<script src=\"OSMBuildings-Leaflet.js\"></script>
<script>
var map = new L.Map('map').setView([52.50440, 13.33522], 17);
var osmb = new OSMBuildings(map).loadData();
osmb.setDate(new Date({Y}, {M}, {D}, {h}, {m}));
</script>
")?></code>

<script>
var now,
  date, time,
  timeRange, dateRange,
  timeRangeLabel, dateRangeLabel;

function changeDate() {
  var Y = now.getFullYear(),
    M = now.getMonth(),
    D = now.getDate(),
    h = now.getHours(),
    m = 0;

  timeRangeLabel.innerText = pad(h) + ':' + pad(m);
  dateRangeLabel.innerText = Y + '-' + pad(M+1) + '-' + pad(D);

  osmb.setDate(new Date(Y, M, D, h, m));
// Map.saveState();

  Code.update({ Y:Y, M:M, D:D, h:h, m:m });
}

function pad(v) {
  return (v < 10 ? '0' : '') + v;
}

document.addEventListener('DOMContentLoaded', function() {
  timeRange = getElement('#time');
  dateRange = getElement('#date');
  timeRangeLabel = getElement('*[for=time]');
  dateRangeLabel = getElement('*[for=date]');

  now = new Date;
  changeDate();

  // init with day of year
  var Jan1 = new Date(now.getFullYear(), 0, 1);
  dateRange.value = Math.ceil((now-Jan1)/86400000);

  timeRange.value = now.getHours();

  timeRange.addEventListener('change', function() {
    now.setHours(this.value);
    now.setMinutes(0);
    changeDate();
  }, false);

  dateRange.addEventListener('change', function() {
    now.setMonth(0);
    now.setDate(this.value);
    changeDate();
  }, false);
});
</script>

<?pageFooter()?>