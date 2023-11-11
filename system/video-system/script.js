var video = document.getElementById("videoplayer");  //hl video
var firstPlayBtn = document.getElementById("FirstPlayBtn");
var playPauseBtn = document.getElementById("playbtn"); // play and pause
var playPauseTitle = document.getElementById("playtitle");//tool tipe play and pause
var fullScreenBtn = document.getElementsByClassName("fullscreen")[0]; //*system fullscreen button
var controls = document.getElementsByClassName("video_player")[0]; //*system fullscreen controls
var volumeRange = document.querySelector('.volume-range'); //volume range
var muteIcon = document.getElementById('mute'); //mute
var settingBtn = document.getElementById("settingbtn"); //setting button
var controlsall =document.getElementById("controls-all")// controls




//Hl system

/*var subtitle_hl_origo = 'bigbunnytitle.vtt';*/

//prve prehratie videa
var controls256 = document.getElementsByClassName("video_player")[0]; //*system fullscreen controls
var con1 = document.getElementsByClassName("play_and_pausebtn");
var con2 = document.getElementsByClassName("player_2");

/*firstPlayBtn.addEventListener("click", function() {

  /*var video_hl_origo = 'video-let/video_1080p.m3u8';*/
 /* var video_hl_origo = 'video-zajac/video.m3u80';
  /* var video_hl_origo = 'video/big_20buck_20bunny.m3u8';*/ 

 /* if (Hls.isSupported()) {
     var hls = new Hls({
       maxBufferSize: 0,
       maxMaxBufferLength: 10,
      

     });
     hls.loadSource(video_hl_origo);
     hls.attachMedia(video);
     hls.on(Hls.Events.ERROR, function(event, data) {
      console.log("status 404.");
      firstPlayBtn.style.display = 'none';
      progressBarAll.style.display = 'none';
      const errorDiv = document.getElementById("error");

      // Pridanie triedy "error" k elementu "error"
          errorDiv.classList.add("errorvideo");
          errorDiv.style.display = '';

      
    });

     hls.on(Hls.Events.MANIFEST_PARSED, function () {
       let currentSegment = null; // uchovávame referenciu na aktuálny segment
       let waitingForSegment = false; // premenná pre kontrolu, či sa čaká na načítanie segmentu
     
       hls.on(Hls.Events.FRAG_CHANGED, function (event, data) {
         console.log('segment seek:', data.frag.sn);
         currentSegment = data.frag; // aktualizujeme referenciu na aktuálny segment
         if (waitingForSegment) { // ak sme predtým čakali na načítanie segmentu, zrušíme zobrazenie loadingu
           loading.style.display = 'none';
           waitingForSegment = false;
         }
       });
     
       function logSelectedQuality() {
         const qualityValue = document.getElementById('Quality-value').innerText;
         console.log(`Selected quality: ${qualityValue}`);
       }
     
       function setQuality(qualityIndex) {
         if (currentSegment !== null) {
           // Ak sa práve prehráva nejaký segment, musíme zrušiť ďalší segment a nastaviť novú kvalitu
           console.log(`Canceling segment ${currentSegment.sn + 1} and setting quality to index ${qualityIndex}...`);
           hls.nextLevel = qualityIndex;
           
           hls.once(Hls.Events.FRAG_BUFFERED, function() {
             logSelectedQuality();
           });
         } else {
           // Inak jednoducho nastavíme novú kvalitu a zalogujeme ju
           hls.currentLevel = qualityIndex;
           logSelectedQuality();
         }
       }
     
       // volanie funkcie pre zmenu zvolenej kvality pri kliknutí na tlačidlá
       qualityBoxes.forEach((qualityBox, index) => {
         qualityBox.addEventListener('click', (event) => {
           const value = qualityBox.querySelector('span[q-data-value]').getAttribute('q-data-value');
           qualityValue.textContent = value;
           setQuality(qualityBoxes.length - 2 - index); // indexy musíme odzadu, pretože v m3u8 sú kvality od najvyššej
         });
       });
     });

  } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
     video.src = video_hl_origo;
     video.addEventListener('loadedmetadata', function() {
     });
  } else  {
     console.log('Error: No compatible source found.');
  }

  video.play();
  firstPlayBtn.style.display = 'none';
  progressBarAll.style.display = 'block';
  playPauseTitle.style.left = '-13px';
});
*/
firstPlayBtn.addEventListener("click", function() {

  /*var video_hl_origo = 'video-let/video_1080p.m3u8';*/
  var video_hl_origo = '../videof/video-segment/video-let/video.m3u8';
  /* var video_hl_origo = 'video/big_20buck_20bunny.m3u8';*/ 


fetch(video_hl_origo)
.then(response => {
if (response.ok) {
 console.log("status 200.");
 if (Hls.isSupported()) {
   var hls = new Hls({
    maxBufferSize: 0,
    maxMaxBufferLength: 10,
    fragLoadingMaxRetry: 10,
    fragLoadingRetryDelay: 1000,
    manifestLoadingMaxRetry: 10,
    manifestLoadingRetryDelay: 1000,
    maxLoadingRetry: 10
   });
   hls.loadSource(video_hl_origo);
   hls.attachMedia(video);
   Hls.DefaultConfig.sourceMap = false;

   hls.on(Hls.Events.MANIFEST_PARSED, function () {
     let currentSegment = null; // uchovávame referenciu na aktuálny segment
     let waitingForSegment = false; // premenná pre kontrolu, či sa čaká na načítanie segmentu
   
     hls.on(Hls.Events.FRAG_CHANGED, function (event, data) {
       console.log('segment seek:', data.frag.sn);
       currentSegment = data.frag; // aktualizujeme referenciu na aktuálny segment
       if (waitingForSegment) { // ak sme predtým čakali na načítanie segmentu, zrušíme zobrazenie loadingu
         loading.style.display = 'none';
         waitingForSegment = false;
       }

     });
   
     function logSelectedQuality() {
       const qualityValue = document.getElementById('Quality-value').innerText;
       console.log(`Selected quality: ${qualityValue}`);
     }
   
     function setQuality(qualityIndex) {
       if (currentSegment !== null) {
         // Ak sa práve prehráva nejaký segment, musíme zrušiť ďalší segment a nastaviť novú kvalitu
         console.log(`Canceling segment ${currentSegment.sn + 1} and setting quality to index ${qualityIndex}...`);
         hls.nextLevel = qualityIndex;
         
         hls.once(Hls.Events.FRAG_BUFFERED, function() {
           logSelectedQuality();
         });
       } else {
         // Inak jednoducho nastavíme novú kvalitu a zalogujeme ju
         hls.currentLevel = qualityIndex;
         logSelectedQuality();
       }
     }
   
     // volanie funkcie pre zmenu zvolenej kvality pri kliknutí na tlačidlá
     qualityBoxes.forEach((qualityBox, index) => {
       qualityBox.addEventListener('click', (event) => {
         const value = qualityBox.querySelector('span[q-data-value]').getAttribute('q-data-value');
         qualityValue.textContent = value;
         setQuality(qualityBoxes.length - 2 - index); // indexy musíme odzadu, pretože v m3u8 sú kvality od najvyššej
       });
     });
   });

   hls.on(Hls.Events.ERROR, function(event, data) {
    if (data.fatal) {
      switch(data.type) {
        case Hls.ErrorTypes.NETWORK_ERROR:
          console.log('Fatal network error encountered, attempting to recover...');
          hls.startLoad(); // opakovaně spusť načítání streamu
          break;
        case Hls.ErrorTypes.MEDIA_ERROR:
          console.log('Fatal media error encountered, attempting to recover...');
          hls.recoverMediaError(); // pokus o obnovení přehrávání po chybě
          break;
        default:
          console.log('Fatal error encountered, reloading video...');
          loadVideo(); // opakovaně načti video
          break;
      }
    }
  });



 } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
   video.src = video_hl_origo;
   video.addEventListener('loadedmetadata', function() {
   });
 } else  {
   console.log('Error: No compatible source found.');
 }

video.play();
 firstPlayBtn.style.display = 'none';
 progressBarAll.style.display = 'block';
 playPauseTitle.style.left = '-13px';


    //zobrazenie rozhrania 


    con1[0].style.opacity = '1'; 
    con2[0].style.opacity = '1';

  //klikanie na obrazovku 
  video.addEventListener("click", function() {
   if (video.paused) {
     video.play();
     playPauseBtn.innerHTML = '<i class="fa-sharp fa-solid fa-pause icon"></i>';
     playPauseTitle.innerText = 'Pause';
     playPauseTitle.style.left = '-13px';
   } else {
     video.pause();
     playPauseBtn.innerHTML = '<i class="fa-sharp fa-solid fa-play icon"></i>';
     playPauseTitle.innerText = 'Play';
     playPauseTitle.style.left = '-6px';
   }
 });


} else {
 console.log("status 404.");
 firstPlayBtn.style.display = 'none';
 progressBarAll.style.display = 'none';

 const errorDiv = document.getElementById("error");

 // Pridanie triedy "error" k elementu "error"
     errorDiv.classList.add("errorvideo");
     errorDiv.style.display = '';

 
}
})
.catch(error => {
console.log("Error[file=NOT Function] ", error);
console.log("status 402.");
firstPlayBtn.style.display = 'none';
progressBarAll.style.display = 'none';

const errorDiv = document.getElementById("error");

// Pridanie triedy "error" k elementu "error"
    errorDiv.classList.add("errorvideo");
    errorDiv.style.display = '';

});

});

//interakcia
video.addEventListener('play', function() {
        //zobrazenie rozhrania 

      var timeout;
      
      function resetTimer() {
        var videoPlayer = document.querySelector('.video_player');
        if (videoPlayer.contains(event.target) ) {

          con1[0].style.opacity = '1';
          con1[0].style.transition = 'opacity 0.3s ease-out';
          con2[0].style.opacity = '1';
          con2[0].style.transition = 'opacity 0.3s ease-out';
          controls.style.cursor = 'default';
      
          // vymazanie časovača
          clearTimeout(timeout);
      
          // nastavenie nového časovača
          timeout = setTimeout(function() {
            if (!video.paused) {
              con1[0].style.opacity = '0';
              con1[0].style.transition = 'opacity 0.3s ease-out';
              con2[0].style.opacity = '0';
              con2[0].style.transition = 'opacity 0.3s ease-out';
              controls.style.cursor = 'none';
            }
          }, 3000); // čas v milisekundách
        }
      }
      
      controls256.addEventListener('mouseenter', function() {
        resetTimer();
      });
      
      controls256.addEventListener('mousemove', function() {
        resetTimer();
      });
      
      controls256.addEventListener('mouseleave', function() {
        if (!video.paused) {
          con1[0].style.opacity = '0';
          con1[0].style.transition = 'opacity 0.3s ease-out';
          con2[0].style.opacity = '0';
          con2[0].style.transition = 'opacity 0.3s ease-out';
          controls.style.cursor = 'default';
        }
      });
      
      video.addEventListener('play', function() {
        con2[0].style.opacity = '1';
      });
      
      video.addEventListener('pause', function() {
        con1[0].style.opacity = '1';
        con2[0].style.opacity = '1';
      });
      
      video.addEventListener('mousemove', function(event) {
        if (video.contains(event.target)) {
          resetTimer();
        }
      });
      
      if (video.paused) {
        con2[0].style.opacity = '0';
      }
  
    
  
});




//loading
const loading = document.getElementById('loading');
const spin = document.getElementById('spin');

video.addEventListener('canplaythrough', function() {
  loading.style.display = 'none';
  spin.style.display = 'none';
});


video.addEventListener('stalled', function() {
  loading.style.display = 'block';
  spin.style.display = 'block';
});

video.addEventListener('stalled', function() {
  loading.style.display = 'block';
  spin.style.display = 'block';
});

video.addEventListener('waiting', function() {
  loading.style.display = 'block';
  spin.style.display = 'block';
});

video.addEventListener('progress', function() {
  if (video.readyState < 4) {
    loading.style.display = 'block';
    spin.style.display = 'block';
  } else {
    loading.style.display = 'none';
    spin.style.display = 'none';
  }
});


loading.style.width = '100%';

//play and pause button (video start)


playPauseBtn.addEventListener("click", function() {
  if (video.paused) {
    video.play();
    playPauseBtn.innerHTML = '<i class="fa-sharp fa-solid fa-pause icon"></i>';
    playPauseTitle.innerText = 'Pause';
    playPauseTitle.style.left = '-13px';
  } else {
    video.pause();
    playPauseBtn.innerHTML = '<i class="fa-sharp fa-solid fa-play icon"></i>';
    playPauseTitle.innerText = 'Play';
    playPauseTitle.style.left = '-6px';
  }
});

document.addEventListener('keydown', function(event) {
  if (event.code === 'Space') {
    event.preventDefault();
    if (video.paused) {
      video.play();
      playPauseBtn.innerHTML = '<i class="fa-sharp fa-solid fa-pause icon"></i>';
      playPauseTitle.innerText = 'Pause';
      playPauseTitle.style.left = '-13px';
    } else {
      video.pause();
      playPauseBtn.innerHTML = '<i class="fa-sharp fa-solid fa-play icon"></i>';
      playPauseTitle.innerText = 'Play';
      playPauseTitle.style.left = '-6px';
    }
  }
});

//progress bar system

const progressFill = document.querySelector(".current-time");
const progressBarAll = document.querySelector("#barsys");
const seekElement = document.querySelector('.seek div');

seekElement.addEventListener('click', function(e) {
  e.stopPropagation(); // zabráni šíreniu udalosti na nadradené elementy, vrátane videa
});

function updateProgressBar() {
  if (!currentTimeDisplay.classList.contains('active')) { // ignorujeme zmeny, keď nie je aktivovaný
    const percent = (video.currentTime / video.duration) * 100;
    progressFill.style.width = `${percent}%`;
  }
}

function handleProgressMove(e) {
  const pos = e.offsetX / progressBarAll.clientWidth;
  const newTime = pos * video.duration;
  progressFill.style.width = `${pos * 100}%`;
  video.currentTime = newTime;
}

function startProgressMove(e) {
  handleProgressMove(e);
  progressBarAll.addEventListener("mousemove", handleProgressMove);
  progressBarAll.addEventListener("mouseup", stopProgressMove);
  progressBarAll.addEventListener("mouseleave", stopProgressMove);
}

function stopProgressMove() {
  progressBarAll.removeEventListener("mousemove", handleProgressMove);
  progressBarAll.removeEventListener("mouseup", stopProgressMove);
  progressBarAll.removeEventListener("mouseleave", stopProgressMove);
}

progressBarAll.addEventListener("mousedown", startProgressMove);
video.addEventListener("timeupdate", updateProgressBar);

//proggress bar timer//

const durationDisplay = document.querySelector('.duration');
const currentTimeDisplay = document.querySelector('.seek');

function formatTime(timeInSeconds) {
  const hours = Math.floor(timeInSeconds / 3600);
  const minutes = Math.floor((timeInSeconds - hours * 3600) / 60);
  const seconds = Math.floor(timeInSeconds - hours * 3600 - minutes * 60);
  const paddedHours = hours.toString().padStart(2, '0');
  const paddedMinutes = minutes.toString().padStart(2, '0');
  const paddedSeconds = seconds.toString().padStart(2, '0');
  if (hours > 0) {
    return `${paddedHours}:${paddedMinutes}:${paddedSeconds}`;
  } else {
    return `${paddedMinutes}:${paddedSeconds}`;
  }
}

video.addEventListener('loadedmetadata', function() {
  const duration = video.duration;
  const durationFormatted = formatTime(duration);
  durationDisplay.textContent = durationFormatted;
});

function updateCurrentTimeDisplay() {
  const currentTime = video.currentTime;
  const duration = video.duration;
  const currentTimeFormatted = formatTime(currentTime);
  const durationFormatted = formatTime(duration);
  
  if (isNaN(currentTime)) {
    // Hide the seek element if current time is not a number
    currentTimeDisplay.style.opacity = '0';
  } else { 
    currentTimeDisplay.style.opacity = '1';
    currentTimeDisplay.textContent = currentTimeFormatted;
    
    if (currentTime >= 3600) {
      currentTimeDisplay.style.marginLeft = '-38px';
    } else {
      currentTimeDisplay.style.marginLeft = '-27px';
    }
  }
  
  durationDisplay.textContent = durationFormatted;

//system load bar
var ranges = video.buffered;
var lastBufferedTime = ranges.length ? ranges.end(ranges.length - 1) : 0;

var percentLoaded = lastBufferedTime / duration * 100;
var loadBar = document.querySelector('#load');
loadBar.style.width = percentLoaded + '%';

}

video.addEventListener('timeupdate', updateCurrentTimeDisplay);

// Listen for left and right arrow keys to move video by 5 seconds
document.addEventListener('keydown', function(event) {
  if (event.keyCode === 37) { // Left arrow
    video.currentTime -= 5;
  } else if (event.keyCode === 39) {
    video.currentTime += 5;
  }});

//volume function
volumeRange.addEventListener('input', function() {
  var newVolume = volumeRange.value / 100;
  video.volume = newVolume;
  savedVolume = newVolume;  // uložíme aktuálnu hodnotu hlasitosti
  if (newVolume == 0) {
    muteIcon.classList.remove('fa-volume-high');
    muteIcon.classList.add('fa-volume-mute');
  } else {
    muteIcon.classList.remove('fa-volume-mute');
    muteIcon.classList.add('fa-volume-high');
  }
});

document.addEventListener('keydown', function(e) {
  if (e.code === 'ArrowUp') { // stlačené klávesa up
    video.volume = Math.min(video.volume + 0.05, 1.0); // zvyšujeme hlasitosť o 0.1, ale maximálne na 1
    volumeRange.value = video.volume * 100; // aktualizujeme hodnotu na range inpute
    if (video.volume > 0) {
      muteIcon.classList.remove('fa-volume-mute');
      muteIcon.classList.add('fa-volume-high'); // meníme ikonu na high
    }
  } else if (e.code === 'ArrowDown') { // stlačené klávesa down
    video.volume = Math.max(video.volume - 0.05, 0.0); // znižujeme hlasitosť o 0.1, ale minimálne na 0
    volumeRange.value = video.volume * 100; // aktualizujeme hodnotu na range inpute
    if (video.volume === 0) {
      muteIcon.classList.remove('fa-volume-high');
      muteIcon.classList.add('fa-volume-mute'); // meníme ikonu na mute
    } else {
      muteIcon.classList.remove('fa-volume-mute');
      muteIcon.classList.add('fa-volume-high'); // meníme ikonu na high
    }
  }
});

muteIcon.addEventListener('click', function() {
  if (video.volume > 0) {
    savedVolume = video.volume;  // uložíme aktuálnu hodnotu hlasitosti pred mutovaním
    video.volume = 0;
    muteIcon.classList.remove('fa-volume-high');
    muteIcon.classList.add('fa-volume-mute');
    volumeRange.value = 0;
  } else {
    if (savedVolume === 0) {
      savedVolume = 0.75;  // ak bola predtým hodnota 0, nastavíme na 75%
    }
    video.volume = savedVolume;  // obnovíme predchádzajúcu hodnotu hlasitosti
    muteIcon.classList.remove('fa-volume-mute');
    muteIcon.classList.add('fa-volume-high');
    volumeRange.value = savedVolume * 100;
  }
});

document.addEventListener('keydown', function(event) {
  if (event.key === 'm') {
    if (video.volume > 0) {
      savedVolume = video.volume;
      video.volume = 0;
      muteIcon.classList.remove('fa-volume-high');
      muteIcon.classList.add('fa-volume-mute');
      volumeRange.value = 0;
    } else {
      video.volume = savedVolume;
      muteIcon.classList.remove('fa-volume-mute');
      muteIcon.classList.add('fa-volume-high');
      volumeRange.value = savedVolume * 100;
    }
  }
});

//subtitile
const subtitleIcon = document.getElementById('subtitle-icon');
const subtitleContainer = document.getElementById('subtitles');
let subtitlesEnabled = false;

subtitleIcon.addEventListener('click', function() {
  if (subtitlesEnabled) {
    subtitleIcon.classList.remove('fa-solid');
    subtitleIcon.classList.add('fa-regular');
    subtitlesEnabled = false;
    subtitleContainer.innerText = '';
    subtitleContainer.style.opacity = '0';
  } else {
    subtitleIcon.classList.remove('fa-regular');
    subtitleIcon.classList.add('fa-solid');
    subtitlesEnabled = true;
  }
});




fetch(subtitle_hl_origo)
  .then(response => response.text())
  .then(subtitleText => {
    // ulozenie titulkov
    let subtitles = parseSubtitles(subtitleText);

    // nastavenie funkcie pre zobrazenie titulkov
    video.addEventListener('timeupdate', () => showSubtitles(video.currentTime, subtitles));
  }).catch(error => {
    console.log('Chyba pri nacitani dat:');
  });

  function parseSubtitles(subtitleText) {
    // rozdelenie textu titulkov podla riadkov
    let subtitleLines = subtitleText.split('\n');
  
    // odstranenie prveho riadka (WEBVTT)
    subtitleLines.shift();
  
    // prevedenie kazdeho dalsieho riadka na objekt s casom a textom titulku
    let subtitles = [];
    let currentSubtitle = null;
    for (let i = 0; i < subtitleLines.length; i++) {
      const subtitleLine = subtitleLines[i].trim();
      if (subtitleLine === '') {
        // ignorovanie prazdnych riadkov
        continue;
      } else if (subtitleLine.indexOf('-->') !== -1) {
        // zaciatok noveho titulku
        if (currentSubtitle) {
          // ulozenie predchadzajuceho titulku
          subtitles.push(currentSubtitle);
        }
        // vytvorenie noveho titulku
        const [timeRange, subtitleText] = subtitleLines.slice(i, i + 2);
        const [startTime, endTime] = timeRange.split(' --> ').map(time => parseTime(time));
        currentSubtitle = { startTime, endTime, subtitleText };
        // preskocenie dalsieho riadku, pretoze sme uz spracovali titulok
        i++;
      } else if (currentSubtitle) {
        // pridanie riadku textu do aktualneho titulku
        currentSubtitle.subtitleText += `<br>${subtitleLine}`;
        
      }
    }
    // ulozenie posledneho titulku
    if (currentSubtitle) {
      subtitles.push(currentSubtitle);
    }
  
    return subtitles;
  }
  
  function parseTime(timeString) {
    let [hours, minutes, secondsAndMillis] = timeString.split(':');
    let [seconds, millis] = secondsAndMillis.split('.');
    return (parseInt(hours) * 3600) + (parseInt(minutes) * 60) + parseInt(seconds) + (parseInt(millis) / 1000);
  }

  function showSubtitles(currentTime, subtitles) {
    // ziskanie titulku pre aktualny cas
    let currentSubtitle = subtitles.find(subtitle => currentTime >= subtitle.startTime && currentTime < subtitle.endTime);
  
    // ziskanie kontajneru pre titulky
    let subtitleContainer = document.getElementById('subtitles');
  
    if (currentSubtitle) {
      // zobrazenie textu titulkov
      subtitleContainer.innerHTML = currentSubtitle.subtitleText;
      subtitleContainer.style.opacity = '1';
    } else {
      // skrytie textu titulkov
      subtitleContainer.innerHTML = '';
      subtitleContainer.style.opacity = '0';
    }
  }

function showSubtitles(currentTime, subtitles) {
  // ziskanie titulku pre aktualny cas
  let currentSubtitle = subtitles.find(subtitle => currentTime >= subtitle.startTime && currentTime < subtitle.endTime);

  if (currentSubtitle && subtitlesEnabled) {
    // zobrazenie textu titulkov
    subtitleContainer.innerHTML = currentSubtitle.subtitleText;
    subtitleContainer.style.opacity = '1';
    const subtitleHeight = subtitleContainer.offsetHeight;
    /*console.log(subtitleHeight);*/
    
    if (subtitleHeight === 23) {   
      subtitleContainer.style.bottom = '40px';
    } else if (subtitleHeight === 42) {
      subtitleContainer.style.bottom = '30px';
    } else if (subtitleHeight === 61) {
      subtitleContainer.style.bottom = '20px';
    }else if (subtitleHeight === 80) {
      subtitleContainer.style.bottom = '12px';
    }



  } else {
    // skrytie textu titulkov
    subtitleContainer.innerHTML = '';
    subtitleContainer.style.opacity = '0';
  }
}
