//setting

const settingContent = document.querySelector('.setting-content');
const tooltipe3 = document.querySelector('.tool-tip3');

let isOpen = false;

settingBtn.addEventListener("click", function(e) {
  e.stopPropagation();
  settingBtn.classList.toggle('rotate');
  
  if (isOpen) {
    settingContent.style.display = 'none';
    tooltipe3.style.display = '';
    isOpen = false;
  } else {
    settingContent.style.display = 'block';
    tooltipe3.style.display = 'none';
    isOpen = true;

    menuSetting.style.display = 'block';
    speedBoxSet.style.display = 'none';
    qualityBoxSet.style.display = 'none';


  }
});

document.addEventListener('click', function(e) {
  if (!settingBtn.contains(e.target) && !document.querySelector('.setting-content').contains(e.target)) {
    settingBtn.classList.remove('rotate');
    settingContent.style.display = 'none';
    tooltipe3.style.display = '';
    isOpen = false;
  }
})

//setting system vyberu menu quality a speed
const speedBox = document.querySelector('.Speed');
const qualityBox = document.querySelector('.Quality');
const menuSetting = document.querySelector('.menu-setting');
const speedBoxSet = document.querySelector('.speed-box-set');
const qualityBoxSet = document.querySelector('.quality-box-set');
const quality2 = document.querySelector('.Quality2');
const speed2 = document.querySelector('.Speed2');



speedBox.addEventListener('click', () => {
  menuSetting.style.display = 'none';
  speedBoxSet.style.display = 'block';
});

qualityBox.addEventListener('click', () => {
  menuSetting.style.display = 'none';
  qualityBoxSet.style.display = 'block';
});


quality2.addEventListener('click', () => {
  menuSetting.style.display = 'block';
  qualityBoxSet.style.display = 'none';
});

speed2.addEventListener('click', () => {
  menuSetting.style.display = 'block';
  speedBoxSet.style.display = 'none';
});

//setting switch speed
const speedBoxes = document.querySelectorAll('.switch-box-speed');
const speedValue = document.getElementById('Speed-value');

speedBoxes.forEach(speedBox => {
  speedBox.addEventListener('click', () => {
   
    const settingSpeedIcons = document.querySelectorAll('.setting-speed-icon');
    settingSpeedIcons.forEach(settingSpeedIcon => {
      settingSpeedIcon.classList.remove('visible');
    });
    
   
    const settingSpeedIcon = speedBox.querySelector('.setting-speed-icon');
    settingSpeedIcon.classList.add('visible');
    //uprava
    menuSetting.style.display = 'block';
    speedBoxSet.style.display = 'none';

    let value = speedBox.querySelector('span[s-data-value]').getAttribute('s-data-value');
    speedValue.textContent = value;
    
    if (value === "normal") {
      value = "1";
    }

   
    video.playbackRate = value;
  });
});

//setting switch quality

const qualityBoxes = document.querySelectorAll('.switch-box-quality');
const qualityValue = document.getElementById('Quality-value');

qualityBoxes.forEach(qualityBox => {
  qualityBox.addEventListener('click', (event) => {
    event.stopPropagation();

    const settingQualityIcons = document.querySelectorAll('.setting-quality-icon');
    settingQualityIcons.forEach(settingQualityIcon => {
      settingQualityIcon.classList.remove('visible');
    });

    const settingQualityIcon = qualityBox.querySelector('.setting-quality-icon');
    settingQualityIcon.classList.add('visible');
    //uprava
    menuSetting.style.display = 'block';
    qualityBoxSet.style.display = 'none';

    const value = qualityBox.querySelector('span[q-data-value]').getAttribute('q-data-value');
    qualityValue.textContent = value;
  
    
 
  });
});

//fullscreen 

fullScreenBtn.addEventListener("click", function() {
  if (document.fullscreenElement) {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    }
    isFullScreen = true;
    fullScreenBtn.innerHTML = '<span class="tool-tip2">Fullscreen</span><i class="fas fa-expand"></i>';
  

  } else {
    if (controls.requestFullscreen) {
      controls.requestFullscreen();
    } else if (controls.mozRequestFullScreen) {
      controls.mozRequestFullScreen();
    } else if (controls.webkitRequestFullscreen) {
      controls.webkitRequestFullscreen();
    } else if (controls.msRequestFullscreen) {
      controls.msRequestFullscreen();
    }
    isFullScreen = false;
    fullScreenBtn.innerHTML = '<span class="tool-tip2">Fullscreen</span><i class="fas fa-compress"></i>'; 
 
  }
});

document.addEventListener('keydown', function(event) {
  if (event.code === 'KeyF') {
    event.preventDefault();
    if (document.fullscreenElement) {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
      }
      isFullScreen = true;
      fullScreenBtn.innerHTML = '<span class="tool-tip2">Fullscreen</span><i class="fas fa-expand"></i>';
   
    } else {
      if (controls.requestFullscreen) {
        controls.requestFullscreen();
      } else if (controls.mozRequestFullScreen) {
        controls.mozRequestFullScreen();
      } else if (controls.webkitRequestFullscreen) {
        controls.webkitRequestFullscreen();
      } else if (controls.msRequestFullscreen) {
        controls.msRequestFullscreen();
      }
      isFullScreen = false;
      fullScreenBtn.innerHTML = '<span class="tool-tip2">Fullscreen</span><i class="fas fa-compress"></i>';
      
    }
  }
});


