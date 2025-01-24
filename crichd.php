<html>

<head>
<title>LOKIIPTV</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="shortcut icon" type="image/x-icon" href="https://yt3.googleusercontent.com/sUDQclcyAsURdktbo4pLiPDBHGLwqJX5aZUupaDzWH-gy3q0UOTQGZmOvOEppuT_FcmAluAWUA=s88-c-k-c0x00ffffff-no-rj">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/plyr@3.6.2/dist/plyr.css" />
<script src="https://cdn.jsdelivr.net/npm/plyr@3.6.12/dist/plyr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/hls.js@1.1.4/dist/hls.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<style>
html {
  font-family: Poppins;
  background: #000;
  margin: 0;
  padding: 0
}

.loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #000;
        z-index: 9999;
    }
    
    .loading-text {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        text-align: center;
        width: 100%;
        height: 100px;
        line-height: 100px;
    }
    
    .loading-text span {
        display: inline-block;
        margin: 0 5px;
        color: #fb3ea2;
        font-family: 'Quattrocento Sans', sans-serif;
    }
    
    .loading-text span:nth-child(1) {
        filter: blur(0px);
        animation: blur-text 1.5s 0s infinite linear alternate;
    }
    
    .loading-text span:nth-child(2) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.2s infinite linear alternate;
    }
    
    .loading-text span:nth-child(3) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.4s infinite linear alternate;
    }
    
    .loading-text span:nth-child(4) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.6s infinite linear alternate;
    }
    
    .loading-text span:nth-child(5) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.8s infinite linear alternate;
    }
    
    .loading-text span:nth-child(6) {
        filter: blur(0px);
        animation: blur-text 1.5s 1s infinite linear alternate;
    }
    
    .loading-text span:nth-child(7) {
        filter: blur(0px);
        animation: blur-text 1.5s 1.2s infinite linear alternate;
    }
    
    @keyframes blur-text {
        0% {
            filter: blur(0px);
        }
        100% {
            filter: blur(4px);
        }
    }

    .plyr__video-wrapper::before {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 10;
        content: '';
        height: 35px;
        width: 65px;
        background: url('https://i.ibb.co/yNHyBGT/Pics-Art-01-06-06-44-52.png') no-repeat;
        background-size: 65px auto, auto;
    }

    .plyr__video-wrapper::after {
        position: absolute;
        top: 15px;
        left: 15px;
        z-index: 10;
        content: '';
        height: 35px;
        width: 35px;
        background: url('') no-repeat;
        background-size: 35px auto, auto;
    }

</style>

</head>
<body>
  

<video autoplay controls crossorigin poster="img/dhoom.png" playsinline>
<?php
  
  ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
printf("<source type=\"application/vnd.apple.mpegurl\" src=\"api.php/?id=%s\">", $_REQUEST["id"]);
?>
</video>

</body>
<script>
setTimeout(videovisible, 3000)

function videovisible() {
    document.getElementById('loading').style.display = 'none'
}
document.addEventListener("DOMContentLoaded", () => {
    const e = document.querySelector("video"),
        n = e.getElementsByTagName("source")[0].src,
        o = {};
    if (Hls.isSupported()) {
        var config = {
            maxMaxBufferLength: 100,
        };
        const t = new Hls(config);
        t.loadSource(n), t.on(Hls.Events.MANIFEST_PARSED, function(n, l) {
            const s = t.levels.map(e => e.height);
            o.quality = {
                default: s[0],
                options: s,
                forced: !0,
                onChange: e => (function(e) {
                    window.hls.levels.forEach((n, o) => {
                        n.height === e && (window.hls.currentLevel = o)
                    })
                })(e)
            };
            new Plyr(e, o)
        }), t.attachMedia(e), window.hls = t
    } else {
        new Plyr(e, o)
    }
});
</script>


</body>
</html>
