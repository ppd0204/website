<?php
$root = "..";
require_once("$root/_base.php");
?>

<?pageHeader("Examples")?>

<link rel="stylesheet" href="<?=ROOT?>/js/highlight-7.3/styles/github-code.css">
<script src="<?=ROOT?>/js/highlight-7.3/highlight.pack.js"></script>

<h1>Building shadows</h1>

<style>
.datetime {
  position: relative;
  bottom: 140px;
  width: 300px;
  margin: auto;
  background-color: rgba(255,255,255,0.4);
  font-size: 10pt;
  font-family: Helvetica, Arial, sans-serif;
  padding: 10px;
}
.datetime label {
  display: block;
  width: 100%;
  height: 20px;
}
.datetime input {
  width: 100%;
  height: 30px;
  margin-bottom: 10px;
  background-color: transparent;
}

@media screen and (orientation: portrait) and (max-device-width: 960px) {
  .datetime {
    -webkit-transform: scale(2);
    bottom: 320px;
  }
  .datetime input {
    height: 50px;
  }
}
</style>

<div class="datetime">
  <label for="time">Time: </label>
  <input id="time" type="range" min="0" max="95">

  <label for="date">Date: </label>
  <input id="date" type="range" min="0" max="23">
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var timeRange = document.querySelector('#time');
  var timeRangeLabel = document.querySelector('*[for=time]');

  var dateRange = document.querySelector('#date');
  var dateRangeLabel = document.querySelector('*[for=date]');

  time = new Date();

  var timeScale = 4,
    dateScale = 2,
    Y = time.getFullYear(),
    M = time.getMonth(),
    D = time.getDate() < 15 ? 1 : 15,
    h = time.getHours(),
    m = time.getMinutes() % 4 * 15;

  timeRange.value = h * timeScale;
  dateRange.value = M * dateScale;
  changeDate();

  function pad(v) {
    return (v < 10 ? '0' : '') + v;
  }

  function changeDate() {
    timeRangeLabel.innerText = 'Time: ' + pad(h) + ':' + pad(m);
    dateRangeLabel.innerText = 'Date: ' + Y + '-' + pad(M+1) + '-' + pad(D);
    osmb.setDate(new Date(Y, M, D, h, m));
    saveState();
  }

  timeRange.addEventListener('change', function () {
    h = this.value / timeScale <<0;
    m = this.value % timeScale * 15;
    changeDate();
  }, false);

  dateRange.addEventListener('change', function () {
    M = this.value / dateScale <<0;
    D = this.value % dateScale ? 15 : 1;
    changeDate();
  }, false);


  hljs.highlightBlock(getElement('CODE'));
});
</script>

<?pageFooter()?>