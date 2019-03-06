<html>
<head>
<?php
if(!$_GET['uid']){
	echo 'Missing params';
	return;
}
$uid=$_GET['uid'];
?>
	<meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@prizepigs">
    <meta name="twitter:creator" content="@prizepigs">
    <meta name="twitter:title" content="My #GE16 Prediction, what's yours?">
    <meta name="twitter:description" content="My #GE16 Prediction via @sidarcy">
    <meta name="twitter:url" content="https://www.prizepigs.ie/imgservice/sharer.php?uid=<? echo $uid ?>">
    <meta name="twitter:image:src" content="https://www.prizepigs.ie/imgservice/decoder.php?uid=<? echo $uid ?>&si=<? echo(rand(1,10000)); ?>"> 
    
    <meta property="fb:app_id" content="212765848759773" />
    <meta property="og:title" content="My #GE16 Prediction, what's yours?" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://www.prizepigs.ie/imgservice/sharer.php?uid=<? echo $uid ?>" />
    <meta property="og:image" content="https://www.prizepigs.ie/imgservice/decoder.php?uid=<? echo $uid ?>&si=<? echo(rand(1,10000)); ?>" />
    <meta property="og:description" content="Check out my #GE16 prediction. Create and Share your own!"/> 
    <style type="text/css">
    div{
        text-align: center;
        margin: 1rem;
    }
    img{
        width: 100%;
        max-width: 800px;
    }
    .text{
        display: block;
        color: #000000;
        font-size: 18px;
        text-decoration: none;

    }
    </style>
</head>

<body>

    <div class="">
        <a href="" class="text">Make your preciction here.</a><br/>
        <a href="" class="img-container">
            <img src="decoder.php?uid=<? echo $uid ?>"/>
        </a>
    </div>
</body>
</html>