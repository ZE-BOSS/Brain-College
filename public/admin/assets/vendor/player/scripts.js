// get elements
const player = document.querySelector('.player');
const video = player.querySelector('.viewer');
const progress = player.querySelector('.progres');
const progressBar = player.querySelector('.progress__filled');
const fullscreen = player.querySelector('.fullscreen');
const exitscreen = player.querySelector('.exitscreen');
const skipButtons = player.querySelectorAll('[data-skip]');
const ranges = player.querySelectorAll('.player__slider');
const current = player.querySelector('.current');
const duration = player.querySelector('.duration');
const sound = player.querySelector('.sound');

// build functions
function togglePlay() {
    if (video.paused) {
        video.play();
    } else {
        video.pause();
    }
    // alternatively this can be written with a ternary operator
    /*
    const method = video.paused ? 'play' : 'pause';
    video[method]();
    */
}

function spaceBarTogglePlay(e) {
    if (e.keyCode == 32){
        togglePlay();
        showPlay();
    }
}

function skip() {
    video.currentTime += parseFloat(this.dataset.skip);
}

function handleRangeUpdate() {
    const sliderValue = this.value;
    const sliderVal = this.value * 200;
    this.setAttribute('title', sliderVal);
    video[this.name] = sliderValue;
    console.log(this.event);
}

function handleProgress() {
    const percent = (video.currentTime / video.duration) * 100;
    progressBar.style.flexBasis = `${percent}%`;
    
    var curhours = Math.floor(video.currentTime / 3600);
    var curmins = Math.floor((video.currentTime % 3600) / 60);
    var cursecs = Math.floor(video.currentTime % 60);
    
    var durhours = Math.floor(video.duration / 3600);
    var durmins = Math.floor((video.duration % 3600) / 60);
    var dursecs = Math.floor(video.duration % 60);
        
    var curtime = curmins+':'+cursecs;
    var durtime = durmins+':'+dursecs;
    
    if(durhours < 1){
        if(durmins < 10){    
            if(dursecs < 10){
                duration.innerHTML = '0'+durmins+':'+'0'+dursecs;
            }else{
                duration.innerHTML = '0'+durmins+':'+''+dursecs;
            }
        }else{
            if(dursecs < 10){
                duration.innerHTML = ''+durmins+':'+'0'+dursecs;
            }else{
                duration.innerHTML = ''+durmins+':'+''+dursecs;
            }      
        } 
    }else if(durhours < 10){
        if(durmins < 10){    
            if(dursecs < 10){
                duration.innerHTML = '0'+durhours+':'+'0'+durmins+':'+'0'+dursecs;
            }else{
                duration.innerHTML = '0'+durhours+':'+'0'+durmins+':'+''+dursecs;
            }
        }else{
            if(dursecs < 10){
                duration.innerHTML = '0'+durhours+':'+''+durmins+':'+'0'+dursecs;
            }else{
                duration.innerHTML = '0'+durhours+':'+''+durmins+':'+''+dursecs;
            }      
        } 
    }else{
        if(durmins < 10){    
            if(dursecs < 10){
                duration.innerHTML = ''+durhours+':'+'0'+durmins+':'+'0'+dursecs;
            }else{
                duration.innerHTML = ''+durhours+':'+'0'+durmins+':'+''+dursecs;
            }
        }else{
            if(dursecs < 10){
                duration.innerHTML = ''+durhours+':'+''+durmins+':'+'0'+dursecs;
            }else{
                duration.innerHTML = ''+durhours+':'+''+durmins+':'+''+dursecs;
            }      
        }
    }
    
    if(curhours < 1){
        if(curmins < 10){    
            if(cursecs < 10){
                current.innerHTML = '0'+curmins+':'+'0'+cursecs;
            }else{
                current.innerHTML = '0'+curmins+':'+''+cursecs;
            }
        }else{
            if(cursecs < 10){
                current.innerHTML = ''+curmins+':'+'0'+cursecs;
            }else{
                current.innerHTML = ''+curmins+':'+''+cursecs;
            }      
        }
    }else if(curhours < 10){
        if(curmins < 10){    
            if(cursecs < 10){
                current.innerHTML = '0'+curhours+':'+'0'+curmins+':'+'0'+cursecs;
            }else{
                current.innerHTML = '0'+curhours+':'+'0'+curmins+':'+''+cursecs;
            }
        }else{
            if(cursecs < 10){
                current.innerHTML = '0'+curhours+':'+''+curmins+':'+'0'+cursecs;
            }else{
                current.innerHTML = '0'+curhours+':'+''+curmins+':'+''+cursecs;
            }      
        } 
    }else{
       if(curmins < 10){    
            if(cursecs < 10){
                current.innerHTML = ''+curhours+':'+'0'+curmins+':'+'0'+cursecs;
            }else{
                current.innerHTML = ''+curhours+':'+'0'+curmins+':'+''+cursecs;
            }
        }else{
            if(cursecs < 10){
                current.innerHTML = ''+curhours+':'+''+curmins+':'+'0'+cursecs;
            }else{
                current.innerHTML = ''+curhours+':'+''+curmins+':'+''+cursecs;
            }      
        } 
    }
        
}

function scrub(e) {
    const scrubTime = (e.offsetX / progress.offsetWidth) * video.duration;
    video.currentTime = scrubTime;
}

function toggleFullscreen() {
    var expand = document.getElementById("expand");
    var collapse = document.getElementById("collapse");
    player.requestFullscreen();
    expand.style.display = "none";
    collapse.style.display = "inline";
    video.style.width = "100%";
    video.style.height = "100%";
    video.style.display = "block";
}

function removeFullscreen() {
    document.exitFullscreen();

    expand.style.display = "inline";
    collapse.style.display = "none";
    video.style.width = "100%";
    video.style.height = "370px";
    video.style.display = "block"; 
    video.style.position = "inherit";
}

function Fullscreen() {
    var expand = document.getElementById("expand");
    var collapse = document.getElementById("collapse");
    if (document.fullscreenElement) {
        video.style.position = "absolute";
    }else{
        video.style.position = "inherit";
        expand.style.display = "inline";
        collapse.style.display = "none";
        video.style.width = "100%";
        video.style.height = "370px";
    }
}

// event listeners
video.addEventListener('click', togglePlay);
video.addEventListener('timeupdate', handleProgress);


fullscreen.addEventListener('click', toggleFullscreen);
exitscreen.addEventListener('click', removeFullscreen);
video.addEventListener('dblclick', toggleFullscreen);

player.addEventListener('fullscreenchange', Fullscreen);
player.addEventListener('mozfullscreenchange', Fullscreen);
player.addEventListener('webkitfullscreenchange', Fullscreen);

document.addEventListener('keypress', spaceBarTogglePlay);
skipButtons.forEach(button => button.addEventListener('click', skip));
ranges.forEach(range => range.addEventListener('change', handleRangeUpdate));
ranges.forEach(range => range.addEventListener('mousemove', handleRangeUpdate));

let mousedown = false;
progress.addEventListener('click', scrub);
progress.addEventListener('mousemove', (e) => mousedown && scrub(e));
progress.addEventListener('mousedown', () => mousedown = true);
progress.addEventListener('mouseup', () => mousedown = false);