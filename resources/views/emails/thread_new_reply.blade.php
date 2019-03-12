<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cosplay School</title>

    <style>

        .intro {
            width: 800px;
            border: 1px solid #2B373A;
            margin: 0 auto;
        }
        .wrapper{
            width: 100%;
        }
        .header-mail{
            width:800px;
            height: 98px;
            background-color: #2B373A;
            margin: 0 auto;
        }
        h2{
            height: 28px;
            font-size: 35px;
            color: white;
            float: left;
            margin-left: 25px;
        }

        .image{
            width: 69px;
            height: 80px;
            margin-left: 30px;
            padding-top: 8px;
            float: left;
        }

        .body-message{
            width: 725px;
            margin: 0 auto;
        }
        p{
            font-size: 20px;
        }
        h3{
            font-size: 25px;
            margin-top: 50px;
        }
        .button{
            display: block;
            width: 280px;
            height: 49px;
            margin: 0 auto;
            color: white;
            background-color: #EE7429;
            font-size: 20px;
            text-align: center;
            line-height: 50px;
            border-radius:  50px;
            text-decoration: none;
            box-shadow: 1px 1px 12px #2B373A;

        }
        .button:hover{
            width: 280px;
            height: 49px;
            background-color: #EC3409;

        }
        h6{
            font-size: 12px;
            text-align: center;
            margin-top: 50px;
        }
        .footer-message{
            width: 800px;
            height: 77px;
            text-align: center;
            margin: 0 auto;
            background-color: #2B373A;
        }
        .footer-message >p{
            line-height: 77px;
            color: white;
        }
    </style>

</head>
<body>
<div class="wrapper">
    <div class="intro">
        <div class="header-mail">
            <img class="image" src="https://www.cosplayschool.ca/public/images/logo-big-cs.png">
            <h2>Nouvelle réponse sur le forum !</h2>
        </div>
        <div class="body-message">
            <h3>Hello,</h3>
            <p>
                Une nouvelle réponse a été apportée au sujet  <b>{{ $thread_title }}</b> !
            </p>

            <a href="{{ $url_thread }}" class="button">Voir la réponse</a>

            <p>L'équipe de la Cosplay School</p>
            <h6>Ceci est un courriel automatique, merci de ne pas y répondre.</h6>
        </div>

        <div class="footer-message">
            <p>Tous droits réservés © 2019 - L’école du costume Inc</p>

        </div>
    </div>

</div>

</body>
</html>
