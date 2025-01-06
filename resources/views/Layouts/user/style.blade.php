<style>
    .font-poppins {
        font-family: 'Poppins', sans-serif;
        color: #ffffff;
    }

    .font-poppins-light {
        font-family: 'Poppins', sans-serif;
        font-weight: 300;
        color: #ffffff;
    }

    .font-poppins-regular {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        color: #ffffff;
    }

    .font-poppins-semibold {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: #ffffff;
    }

    .font-poppins-bold {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #ffffff;
    }


    body {
        background: linear-gradient(-45deg,
                #000000,
                #121212,
                #1a1a1a,
                #373737,
                #515050,
                #636363,
                #f1c40f);
        background-size: 400% 400%;
        animation: gradient 9s ease infinite;
        height: 100vh;
        margin: 0;
        padding: 0;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .coin {
        width: 40px;
        height: auto;
    }

    .coinlimit {
        width: 30px;
        height: 30px;
    }

    /* Animasi bouncing */
    @keyframes bounce {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-30px);
        }

        60% {
            transform: translateY(-15px);
        }
    }

    /* .card {
        background: rgba(255, 255, 255, 0.217);
        height: 80px;
        backdrop-filter: blur(100px);
        -webkit-backdrop-filter: blur(100px);
        position: relative;
        z-index: 1;
        border: none;
        box-shadow: 0 4px 8px rgba(56, 55, 55, 0.2);
        animation: popIn 0.5s ease-in-out;
    } */

    .card-proof {
        background: rgba(255, 255, 255, 0.217);
        height: 100%;
        backdrop-filter: blur(100px);
        -webkit-backdrop-filter: blur(100px);
        position: relative;
        z-index: 1;
        border: none;
        box-shadow: 0 4px 8px rgba(56, 55, 55, 0.2);
        animation: popIn 0.5s ease-in-out;
    }

    .card-profile {
        background: rgba(255, 255, 255, 0.217);
        height: 100%;
        backdrop-filter: blur(100px);
        -webkit-backdrop-filter: blur(100px);
        position: relative;
        z-index: 1;
        border: none;
        box-shadow: 0 4px 8px rgba(56, 55, 55, 0.2);
        animation: popIn 0.5s ease-in-out;
    }

    .card-ton {
        background: white;
        height: 40px;
        width: 150px;
        padding-top: 8px;
        border-radius: 8px;
        text-align: center;
        position: relative;
        z-index: 1;
        border: none;

    }

    .btn-ton {
        background: linear-gradient(90deg, rgba(34, 39, 43, 0.47) 27%, #FFD036 100%);
        border-Radius: 21px;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        margin: 10px;
    }

    @keyframes popIn {
        0% {
            transform: scale(0.5);
            opacity: 0;
        }

        80% {
            transform: scale(1.05);
            opacity: 1;
        }

        100% {
            transform: scale(1);
        }
    }

    .account {
        width: 60px;
        height: 60px;
        border-radius: 8px;
    }


    .circletap {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100%;
        margin-top: -170px;
        animation: popIn 0.5s ease-in-out;
    }

    #imgTap {
        cursor: pointer;
    }

    /* Heartbeat animation */
    .heartbeat {
        animation: heartbeat 0.2s ease-in-out;
    }

    @keyframes heartbeat {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    .logo {
        width: 280px;
        height: auto;
    }

    .spin {
        animation: spin 1s linear forwards;
    }

    @keyframes spin {
        0% {
            transform: rotateY(0deg);
        }

        100% {
            transform: rotateY(360deg);
        }
    }

    .text-gold {
        color: #ffc400;
    }

    .typing-demo {
        width: 11ch;
        animation: typing 2s steps(22), blink .5s step-end infinite alternate;
        white-space: nowrap;
        overflow: hidden;
        border-right: 3px solid;
    }

    @keyframes typing {
        from {
            width: 0
        }
    }

    @keyframes blink {
        50% {
            border-color: transparent
        }
    }

    /* +1 animation */
    .plus-one {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 30px;
        font-weight: 10px;
        color: rgb(255, 255, 255);
        opacity: 0;
        animation: moveUp 1s ease-in-out forwards;
    }

    @keyframes moveUp {
        0% {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
        }

        100% {
            transform: translate(-50%, -150%) scale(1.5);
            opacity: 0;
        }
    }

    .progress {
        animation: popIn 0.5s ease-in-out;
    }

    .TapHere {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0% {
            transform: translatey(0px);
        }

        50% {
            transform: translatey(-20px);
        }

        100% {
            transform: translatey(0px);
        }
    }

    .svgProfile svg:hover path {
        fill: white;
    }
</style>