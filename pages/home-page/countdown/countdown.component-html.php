
<div class="count-down-timer" id="slide-countdown">
  <p id="weddingDate">Lásku si sľúbime </p>
  <div class="wrapper">
    <div class="times">
      <p id="monthsLeft"></p>
      <p id="daysLeft"></p>
      <p id="hoursLeft"></p>
      <p id="minutesLeft"></p>
      <p id="secondsLeft"></p>
    </div>
    <div class="description">
      <p id="monthsLeftDescription"></p>
      <p id="daysLeftDescription"></p>
      <p id="hoursLeftDescription"></p>
      <p id="minutesLeftDescription"></p>
      <p id="secondsLeftDescription"></p>
    </div>
    <?php if(isMobileDevice()) : ?>
      <div class="icon">
        <a href="https://toystory.disney.com/" target="_blank" style="all: inherit;">
          <i class="fa fa-map-marker" aria-hidden="true"></i>
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>