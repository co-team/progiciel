<?php
?>
<meta http-equiv="refresh" content="5;URL=home.php">
<div class='text-pop-up-top'><b style="color: #8b1014">Burkina</b> ⭐ <b style="color: green">Faso</b></div>
<style>
    body {
        background: #cccccc;
        overflow: hidden;
        height: 100vh;
        display: flex;
        align-items: center; /* Correção aqui */
        justify-content: center;
        margin: 0; /* Removendo a margem padrão do corpo */
    }

    .ctn {
        position: relative; /* Adicionando position: relative para alinhar o texto em relação a isso */
    }

    .text-pop-up-top {
        color: #fff;
        position: absolute;
        font: normal 90pt Arial; /* Aumentando o tamanho do texto */
        width: 100%;
        text-align: center;
        animation: text-pop-up-top 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) both,
        tracking-in-expand 3s cubic-bezier(0.215, 0.61, 0.355, 1) both;
    }

    @-webkit-keyframes text-pop-up-top {
        0% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            text-shadow: none;
        }
        100% {
            -webkit-transform: translateY(-50px);
            transform: translateY(-50px);
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            text-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc,
            0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc,
            0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3);
        }
    }
    @keyframes text-pop-up-top {
        0% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            text-shadow: none;
        }
        100% {
            -webkit-transform: translateY(-50px);
            transform: translateY(-50px);
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            text-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc,
            0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc,
            0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3);
        }
    }
    @-webkit-keyframes tracking-in-expand {
        0% {
            letter-spacing: -0.5em;
            opacity: 0;
        }
        40% {
            opacity: 0.6;
        }
        100% {
            opacity: 1;
        }
    }
    @keyframes tracking-in-expand {
        0% {
            letter-spacing: -0.5em;
            opacity: 0;
        }
        40% {
            opacity: 0.6;
        }
        100% {
            opacity: 1;
        }
    }

</style>