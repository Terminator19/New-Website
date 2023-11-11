const controlsIn = document.querySelector('.controls');

   // Vloženie HTML kódu do elementu
   controlsIn.innerHTML = `<div class="play_and_pausebtn"  style="opacity: 0;">
            <button type="button" class="play_and_pause"  id="playbtn"><i class="fa-sharp fa-solid fa-pause icon" ></i></button>
           <span class="tool-tip" id="playtitle">Pause</span>
         </div>
        
   
         <div class="player_2" style="opacity: 0;">
            <div class="progres_bar" id="barsys">
               <div id="loading" class="bar loading loading-animated" style="width: 100%;"></div>
               <div id="load" class="bar load" style="width: 0%;" ></div>
               <div class="current-time"> 
                  <div class="seek">
                     <div class="duration"></div>
                  </div>
               </div>
            </div>
            <div class="volume">
                  <span class="tool-tip5">
                     <input type="range" class="volume-range" min="0" max="100" value="75">
                  </span>
               <i id="mute" class="fa-solid fa-volume-high"></i>
            </div>
            <div class="subtitle"><span class="tool-tip4">Subtitle</span><i id="subtitle-icon" class="fa-regular fa-closed-captioning"></i></div>
            <div class="setting">
               <span class="tool-tip3" >Setting</span>
               
               <i id="settingbtn" class="fa-sharp fa-solid fa-gear"></i>
            </div>
            <div class="setting-content" >
               
               <div class="menu-setting">
               <div class="Speed">
                  <div class="Speed-box">
                     <span style="margin-left: 8px;">Speed</span>
                     <span id="Speed-value" style="margin-left: 8px;">normal</span>
                     <span><i style="color:white;float:right;margin-left: 8px;" class="fa-solid fa-angle-right"></i></span>
                  </div>
               </div>
               <div class="Quality">
                  <div class="Quality-box">
                     <span style="margin-left: 8px;">Quality</span>
                     <span id="Quality-value" style="margin-left: 8px;">auto</span>
                     <span><i style="color:white;float: right;margin-left: 8px;" class="fa-solid fa-angle-right"></i></span>
                  </div>
               </div>
               </div>

               <div class="speed-box-set" style="display: none;">
               <div class="Speed2"> 
                  <div class="Speed-box " >
                     <span><i style="color:white;cursor: pointer;" class="fa-solid fa-angle-left"></i></span>
                     <span style="margin-left: 20px;cursor: pointer;">Speed</span>
                  </div>
               </div> 
              <hr>
               <div class="Speed"> 
                  <div class="Speed-box switch-box-speed">
                     <span class="setting-speed-icon"><i style="color:white;" class="fa-solid fa-check"></i></span>
                     <span s-data-value="0.25">0.25</span>
                  </div>
               </div>
               <div class="Speed"> 
                  <div class="Speed-box switch-box-speed">
                     <span class="setting-speed-icon"><i style="color:white;" class="fa-solid fa-check"></i></span>
                     <span s-data-value="0.5">0.5</span>
                  </div>
               </div>
               <div class="Speed"> 
                  <div class="Speed-box switch-box-speed">
                     <span class="setting-speed-icon"><i style="color:white;" class="fa-solid fa-check"></i></span>
                     <span s-data-value="0.75">0.75</span>
                    
                  </div>
               </div>
               <div class="Speed"> 
                  <div class="Speed-box switch-box-speed">
                     <span class="setting-speed-icon visible"><i class="fa-solid fa-check"></i></span>
                     <span s-data-value="normal">normal</span>
                  </div>
               </div>
               <div class="Speed"> 
                  <div class="Speed-box switch-box-speed">
                     <span class="setting-speed-icon"><i style="color:white;" class="fa-solid fa-check"></i></span>
                     <span s-data-value="1.25">1.25</span>
                  </div>
               </div>
               <div class="Speed"> 
                  <div class="Speed-box switch-box-speed">
                     <span class="setting-speed-icon"><i style="color:white;" class="fa-solid fa-check"></i></span>
                     <span s-data-value="1.5">1.5</span>
                  </div>
               </div>
               <div class="Speed"> 
                  <div class="Speed-box switch-box-speed">
                     <span class="setting-speed-icon"><i style="color:white;" class="fa-solid fa-check"></i></span>
                     <span s-data-value="1.75">1.75</span>
                  </div>
               </div>
               <div class="Speed"> 
                  <div class="Speed-box switch-box-speed">
                     <span class="setting-speed-icon"><i style="color:white;" class="fa-solid fa-check"></i></span>
                     <span s-data-value="2">2</span>
                  </div>
               </div>
               </div>
              
               <div class="quality-box-set" style="display: none;">
                   
             <div class="Quality2">
                  <div class="Quality-box">
                     <span ><i  style="color:white;cursor: pointer;" class="fa-solid fa-angle-left"></i></span>
                     <span style="margin-left: 20px;cursor: pointer;">Quality</span>
                   
                  </div>
               </div>
               <hr>
               <div class="Quality">
                  <div class="Quality-box switch-box-quality">
                     <span class="setting-quality-icon"><i style="color:white;" class="fa-solid fa-check"></i></span>
                     <span q-data-value="1080p">1080p</span>
                  </div>
               </div>
               <div class="Quality">
                  <div class="Quality-box switch-box-quality">
                     <span class="setting-quality-icon"><i style="color:white;" class="fa-solid fa-check"></i></span>
                     <span q-data-value="720p">720p</span>
                  </div>
               </div>
               <div class="Quality">
                  <div class="Quality-box switch-box-quality">
                     <span class="setting-quality-icon"><i style="color:white;" class="fa-solid fa-check"></i></span>
                     <span q-data-value="480p">480p</span>
                  </div>
               </div>
               <div class="Quality">
                  <div class="Quality-box switch-box-quality">
                     <span class="setting-quality-icon"><i style="color:white;" class="fa-solid fa-check"></i></span>
                     <span q-data-value="360p">360p</span>
                  </div>
               </div>
               <div class="Quality">
                  <div class="Quality-box switch-box-quality">
                     <span class="setting-quality-icon"><i style="color:white;" class="fa-solid fa-check"></i></span>
                     <span q-data-value="240p">240p</span>
                  </div>
               </div>
               <div class="Quality">
                  <div class="Quality-box switch-box-quality">
                     <span class="setting-quality-icon"><i style="color:white;" class="fa-solid fa-check"></i></span>
                     <span q-data-value="144p">144p</span>
                  </div>
               </div>
               <div class="Quality">
                  <div class="Quality-box switch-box-quality">
                     <span class="setting-quality-icon visible"><i style="color:white;" class="fa-solid fa-check"></i></span>
                     <span q-data-value="auto">auto</span>
                  </div>
               </div>
               </div>
            </div>
           
            <div class="fullscreen" ><span class="tool-tip2">Fullscreen</span><i class="fa-sharp fa-solid fa-expand"></i></div> 
         </div>`;