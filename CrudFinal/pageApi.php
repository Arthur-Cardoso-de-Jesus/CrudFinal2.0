<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Radio.co - Example Player</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <style>
        @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css);
        @import url('https://fonts.googleapis.com/css2?family=Hind:wght@500&display=swap');
        
        [class*="fontawesome-"]:before {
            font-family: 'FontAwesome', sans-serif;
        }

       

        #header {
            max-width: 100vw;
            height: 10vh;
            padding: 1em;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-bottom: 1px solid rgba(0, 0, 0, 0.144);
            box-shadow: 0px 0px 5px 5px rgba(0, 0, 0, 0.103);
            text-decoration: nrgba(0, 0, 0, 0.568);
        }

        #menu {
            background-color: transparent;
        }

        h2 {
            font-size: 3em;
        }

        #conteudo {
            background-color: tranparent;
            max-width: 100%;
            height: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: 5em;
            padding: 5em;
        }


        .botoes {
            margin: 1em 0.5em 0.5em 0.5em;
            padding: 0.6em;
            border: 1px solid black;
            transition: 200ms;
            width: 20em;
            height: 3.5em;
        }

        .botoes:hover {
            transform: translatey(-5px);
            box-shadow: 0px 5px 25px rgba(0, 0, 0, 0.26);
        }

        #btnAdicionar {
            margin: 1em 0.5em 0.5em 0.5em;
            padding: 0.6em;
            border: 1px solid black;
            transition: 200ms;
            width: 20em;
            height: 3.5em;
        }

        #btnAdicionar:hover {
            transform: translatey(-5px);
            box-shadow: 0px 5px 25px rgba(0, 0, 0, 0.26);
        }


        .radioco-playButton-playing:before {
            content: "\f04b";
            font-family: 'FontAwesome', sans-serif;
        }

        .radioco-playButton-paused:before {
            content: "\f04c";
            font-family: 'FontAwesome', sans-serif;
        }

        .radioplayer {
            background: #F4F4F4;
            background-position: center center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
            border-radius: 100px;
            box-shadow: 10px 10px 20px;
            height: 109px;
            khtml-user-select: none;
            moz-user-select: none;
            ms-user-select: none;
            overflow: hidden;
            padding: 20px;
            user-select: none;
            webkit-touch-callout: none;
            webkit-user-select: none;
            width: 500px;
        }

        .radioco-playButton {
            box-shadow: #111 1px 1px 10px;
            color: #fff;
            font-size: 50px;
            margin-left: 10.5%;
            position: relative;
            text-align: left;
            top: 30px;
            z-index: 2;
        }

        .radioco-playButton:active {
            color: #ccc;
        }

        .radioco-playButton-playing {
            color: rgba(255, 255, 255, 1);
            position: absolute;
            text-shadow: black 2px 2px 50px;
            text-size: 150%;
        }

        .radioco-playButton-paused {
            position: absolute;
            text-shadow: black 2px 2px 50px;
            text-size: 150%;
        }

        .radioco-image {
            display: none;
        }

        .radioco-bg {
            left: 0px;
            margin-left: -29px;
            margin-top: -79px;
            overflow: hidden;
            position: relative;
            top: -100px;
            width: 600px;
        }

        .radioco-information {
            color: #fff;
            display: block;
            float: right;
            font-family: 'Open Sans', sans-serif;
            margin-top: 14px;
            position: relative;
            top: 5px;
            width: 340px;
            z-index: 1;
            
        }

        .radioco-information span {
            border-bottom: 1px dashed rgba(255, 255, 255, 0.3);
            display: block;
            font-weight: bold;
            letter-spacing: 0px;
            padding-bottom: 15px;
        }

        .radioco-information input[type="range"] {
            background: rgba(255, 255, 255, 0.3);
            cursor: -webkit-grab;
            display: block;
            height: 4px;
            margin-bottom: 20px;
            margin-left: 0px;
            margin-top: 20px;
            outline: 0;
            webkit-appearance: none;
            webkit-border-radius: 8px;
            width: 100px;
        }

        .radioco-information input[type=range]::-webkit-slider-thumb {
            background: #ffffff;
            border: none;
            border-radius: 10px;
            height: 15px;
            webkit-appearance: none;
            webkit-transition: box-shadow 0.2s;
            width: 15px;
        }

        .radioco-nowPlaying {
            color: white;
            font-size: 18px;
            text-align: left;
            text-shadow: black 0px 0px 5px;
        }

        .radioco-information input[type=range]::-webkit-slider-thumb:hover {
            box-shadow: #fff 2px 1px 20px;
        }

        .radioco-information input[type=range]:active,
        .information input[type=range]:focus {
            outline: 0;
        }


    </style>
</head>

<body>
    <div id="header">
        <div id="menu">
            <input class="botoes" id="Menu" type="button" onclick="location.href='index.php'" value="Menu">
            <input class="botoes" id="logout" type="button" onclick="location.href='logout.php'" value="Deslogar">
        </div>
    </div>

    <div id="conteudo">
        <h2>Radio dos Xirus!</h2>
        <!-- The player decleration -->
        <div class="radioplayer" data-src="http://streaming.radio.co/sced7c0e79/listen" data-autoplay="false" data-playbutton="true" data-volumeslider="true" data-elapsedtime="false" data-nowplaying="true" data-showplayer="true" data-volume="50" data-bg="images/bg.png" data-image="images/image.png"></div>
</body>
</div>
<!-- Include the libraries -->
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://public.radio.co/playerapi/jquery.radiocoplayer.min.js"></script>
<script>
    //initialise the plugin with the element
    $('.radioplayer').radiocoPlayer();
</script>

</html>