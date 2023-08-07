function validate() {
    if ($('#user_id').val() == 0) {
        alert("Đăng nhập để bình luận");
        return false;
    }
}


//Audio
const jpcontainer = document.getElementById('jp_container_1');
const playBtn = document.getElementById('btn_play');
const prevBtn = document.getElementById('btn_prev');
const nextBtn = document.getElementById('btn_next');

const audio = document.getElementById('jp_audio');
const progress = document.getElementById('progress');
const progressContainer = document.getElementById('progress-container');
const currTime = document.querySelector('#currTime');
const durTime = document.querySelector('#durTime');

//First Play
playBtn.addEventListener("click", playFistSong);

function playFistSong(e) {
    var audio = $('.jp-playlist-item').first().data("audio");
    var title = $('.jp-playlist-item').first().data("title");
    $('.jp-playlist-item').first().addClass('jp-playlist-current')
    $('#jp_audio').attr('src', audio);
    $('#jp_audio').attr('title', title);
    playBtn.removeEventListener("click", playFistSong);
}


//Choose
function choosesong(e) {
    $('.jp-playlist-item').removeClass('jp-playlist-current');
    var audio = $(e).data("audio");
    var title = $(e).data("title");
    $('#jp_audio').attr('src', audio);
    $('#jp_audio').attr('title', title);
    $(e).addClass('jp-playlist-current');
    playBtn.removeEventListener("click", playFistSong);
    playSong()
}



// Play & Pause
function playSong() {
    jpcontainer.classList.add('jp-state-playing');
    audio.play();
}

function pauseSong() {
    jpcontainer.classList.remove('jp-state-playing');
    audio.pause();
}


// Change: Previous & Next
function prevSong() {
    if ($('.jp-playlist-item').first().hasClass('jp-playlist-current')) {
        return false;
    } else {
        $('.jp-playlist-current').removeClass('jp-playlist-current').prev().addClass('jp-playlist-current');
        var audio = $('.jp-playlist-current').data("audio");
        $('#jp_audio').attr('src', audio);
        playSong();
    }
}
prevBtn.addEventListener('click', prevSong);

function nextSong() {
    if ($('.jp-playlist-item').last().hasClass('jp-playlist-current')) {
        return false;
    } else {
        $('.jp-playlist-current').removeClass('jp-playlist-current').next().addClass('jp-playlist-current');
        var audio = $('.jp-playlist-current').data("audio");
        $('#jp_audio').attr('src', audio);
        playSong();
    }
}

nextBtn.addEventListener('click', nextSong);

playBtn.addEventListener('click', () => {
    const isPlaying = jpcontainer.classList.contains('jp-state-playing');

    if (isPlaying) {
        pauseSong();
    } else {
        playSong();
    }
});

// Song ends
audio.addEventListener('ended', nextSong);



// Update progress bar
function updateProgress(e) {
    const { duration, currentTime } = e.srcElement;
    const progressPercent = (currentTime / duration) * 100;
    progress.style.width = `${progressPercent}%`;
}
// Time/song update
audio.addEventListener('timeupdate', updateProgress);

// Set progress bar
function setProgress(e) {
    const width = this.clientWidth;
    const clickX = e.offsetX;
    const duration = audio.duration;

    audio.currentTime = (clickX / width) * duration;
}
// Click on progress bar
progressContainer.addEventListener('click', setProgress);


// Update progress bar
function updateProgress(e) {
    const { duration, currentTime } = e.srcElement;
    const progressPercent = (currentTime / duration) * 100;
    progress.style.width = `${progressPercent}%`;
}
// Time/song update
audio.addEventListener('timeupdate', updateProgress);

// Set progress bar
function setProgress(e) {
    const width = this.clientWidth;
    const clickX = e.offsetX;
    const duration = audio.duration;

    audio.currentTime = (clickX / width) * duration;
}
// Click on progress bar
progressContainer.addEventListener('click', setProgress);



//get duration & currentTime
function DurTime(e) {
    //currentTime
    var currentHours = Math.floor(audio.currentTime / 3600);
    var currentMinutes = Math.floor(audio.currentTime / 60 % 60);
    var currentSeconds = Math.floor(audio.currentTime % 60);
    if ((audio.currentTime >= 600) && (currentMinutes < 10)) {
        currentMinutes = '0' + currentMinutes;
    }
    currTime.innerHTML = `${currentHours ? currentHours+':' : ''}${currentMinutes}:${currentSeconds >= 10 ? currentSeconds : '0'+currentSeconds}`;

    //duration

    var durationhours = Math.floor(audio.duration / 3600);
    var durationminutes = Math.floor(audio.duration / 60 % 60);
    var durationseconds = Math.floor(audio.duration % 60);
    if ((audio.duration >= 600) && (durationminutes < 10)) {
        durationminutes = '0' + durationminutes;
    }

    if (!isNaN(durationhours)) {
        durTime.innerHTML = `${durationhours ? durationhours+':' : ''}${durationminutes}:${durationseconds >= 10 ? durationseconds : '0'+durationseconds}`;
    }


};
// Time of song
audio.addEventListener('timeupdate', DurTime);


function speed05(e) {
    $('.btnspeed').removeClass('choosespeed');
    audio.playbackRate = 0.5;
    $(e).addClass('choosespeed');
}


function speed1(e) {
    $('.btnspeed').removeClass('choosespeed');
    audio.playbackRate = 1;
    $(e).addClass('choosespeed');
}

function speed15(e) {
    $('.btnspeed').removeClass('choosespeed');
    audio.playbackRate = 1.5;
    $(e).addClass('choosespeed');
}

function speed2(e) {
    $('.btnspeed').removeClass('choosespeed');
    audio.playbackRate = 2;
    $(e).addClass('choosespeed');
}