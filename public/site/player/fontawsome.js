    function showPla(){
		var play = document.getElementById("show_play");
        var pause = document.getElementById("show_pause");
        var show = document.getElementById("show");
        var replay = document.getElementById("replay");
        var mplay = document.getElementById("main_play");
        var mpause = document.getElementById("main_pause");
        var mreplay = document.getElementById("main_replay");
        const video = player.querySelector('.vid');
        
        show.style.display = "none";
        replay.style.display = "none";
		if(play.style.display === "inline"){
            play.style.display = "none";
            pause.style.display = "inline";
            mplay.style.display = "inline";
            mpause.style.display = "none";
            mreplay.style.display = "none";
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }
		}else{
			play.style.display = "inline";
            pause.style.display = "none";
            mplay.style.display = "none";
            mpause.style.display = "inline";
            mreplay.style.display = "none";
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }
		}
	}
    function showPlay(){
		var play = document.getElementById("show_play");
        var pause = document.getElementById("show_pause");
        var show = document.getElementById("show");
        var replay = document.getElementById("replay");
        var mplay = document.getElementById("main_play");
        var mpause = document.getElementById("main_pause");
        const video = player.querySelector('.vid');
        
        show.style.display = "none";
        replay.style.display = "none";
		if(play.style.display === "inline"){
            play.style.display = "none";
            pause.style.display = "inline";
            mplay.style.display = "inline";
            mpause.style.display = "none";
		}else{
			play.style.display = "inline";
            pause.style.display = "none";
            mplay.style.display = "none";
            mpause.style.display = "inline";
		}
	}
    function showReplay(){
		var show = document.getElementById("replay");
        var sr = document.getElementById("show_replay");
        var mplay = document.getElementById("main_play");
        var mpause = document.getElementById("main_pause");
        var mreplay = document.getElementById("main_replay");

		if(show.style.display === "inline"){
			show.style.display = "none";
            sr.style.display = "inline";
            mplay.style.display = "none";
            mpause.style.display = "none";
            mreplay.style.display = "none";
		}else{
			show.style.display = "inline";
            sr.style.display = "none";
            mplay.style.display = "none";
            mpause.style.display = "none";
            mreplay.style.display = "inline";
		}
	}
    function replay(){
		var show = document.getElementById("show_replay");
        var replay = document.getElementById("replay");

        replay.style.display = "none";
		if(show.style.display === "inline"){
			show.style.display = "none";
		}else{
			show.style.display = "inline";
		}
	}
    function volume(){
		var volume = document.getElementById("volume");

		if(volume.style.display === "inline"){
			volume.style.display = "none";
		}else{
			volume.style.display = "inline";
		}
	}
    function mute(){
		var mvolume = document.getElementById("mute");
        var volume = document.getElementById("unmute");
        var mute = document.getElementById("volume");
        
        mute.value = 0;
        const sliderValue = mute.value;
        mute.setAttribute('title', sliderValue);
        video[mute.name] = sliderValue;
        console.log(mute.event);
		if(mvolume.style.display === "inline"){
			mvolume.style.display = "none";
            volume.style.display = "inline";
		}else{
			mvolume.style.display = "inline";
            volume.style.display = "none";
		}
	}
    function unmute(){
        var mvolume = document.getElementById("mute");
		var volume = document.getElementById("unmute");
        var mute = document.getElementById("volume");
        
        mute.value = 1;
        const sliderValue = mute.value;
        mute.setAttribute('title', sliderValue);
        video[mute.name] = sliderValue;
        console.log(mute.event);
		if(volume.style.display === "inline"){
			volume.style.display = "none";
            mvolume.style.display = "inline";
            
		}else{
			volume.style.display = "inline";
            mvolume.style.display = "none";
		}
	}
    function stop(){
		var play = document.getElementById("show_play");
        var pause = document.getElementById("show_pause");
        var show = document.getElementById("show");
        var replay = document.getElementById("replay");
        var mplay = document.getElementById("main_play");
        var mpause = document.getElementById("main_pause");
        var mreplay = document.getElementById("main_replay");
        const video = player.querySelector('.vid');
        
        video.currentTime = 0;
        showPlay();
        video.pause();
        show.style.display = "inline";
	}
    function remove(){
		var show = document.getElementById("show_replay");
        var replay = document.getElementById("replay");

        replay.style.display = "none";
        show.style.display = "none";
	}