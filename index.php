<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Dhaka Stock Exchange Real Time Share Tracking - Open Source Script</title>
    <meta name="author" content="G. M. Shaharia Azam">
    <meta name="keywords" content="markdown editor"/>
    <meta name="description" content="Dhaka Stock Exchange Share update real time tracking API for PHP application. Get real time DSE trade data on web application and mobile"/>
    <!-- HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="online_documentation/resource/bootstrap.min.css">
    <link rel="stylesheet" href="online_documentation/resource/static/css/style.css">
    <link rel="stylesheet" href="online_documentation/resource/static/css/code.css">

    <script type="text/javascript" src="online_documentation/resource/jquery-1.7.1.min.1.js"></script>
    <script type="text/javascript" src="online_documentation/resource/jquery.markdown-0.2.js"></script>

    <style type="text/css">
        body {
            margin-left: 20%;
            margin-top: 50px;
            margin-right: 20%;
        }

        p {
            line-height: 30px;
        }
    </style>

</head>
<body>
<h1 id="dse-share-market-update">DSE-Share-Market-Update</h1>

<p>Real time Share Market Update Data of Dhaka Stock Exchange, Bangladesh.</p>

<h3 id="primary-feature">Primary Feature</h3>

<p>This project is enough to scrap the latest share market data of Dhaka Stock Exchange and build array to make it
    flexible for other data format.</p>

<h3 id="usage">Usage</h3>

<p>After cloning this Git repo you can use it directly.
    Run <code>DSE-Share-Market-Update/debug.php</code>....</p>
<pre><code class="php">  &lt;?php

    include(&quot;library/Scraper.php&quot;);

    $scraper = new Scraper();
    $scrapData = $scraper-&gt;scrapData('https://www.dsebd.org');

    var_dump($scrapData);
</code></pre>

<p>The above code is written in <code>debug.php</code>. So you can run by yourself easily by copy/page the above code to
    any file in your root director.</p>

<h3 id="output">Output</h3>

<p>When you will run <code>debug.php</code> file then the output should be like the following:</p>
<pre><code class="php"> array (size=288)
    0 =&gt;
    array (size=4)
    0 =&gt; string '1JANATAMF' (length=9)
    1 =&gt; string '6.60' (length=4)
    2 =&gt; string '-0.10' (length=5)
    6 =&gt; string '-1.49%' (length=6)
    1 =&gt;
    array (size=4)
    0 =&gt; string '1STBSRS' (length=7)
    1 =&gt; string '96.00' (length=5)
    2 =&gt; string '-2.50' (length=5)
    6 =&gt; string '-2.54%' (length=6)
    2 =&gt;
    array (size=4)
    0 =&gt; string '1STPRIMFMF' (length=10)
    1 =&gt; string '17.30' (length=5)
    2 =&gt; string '-1.10' (length=5)
    6 =&gt; string '-5.98%' (length=6)
    3 =&gt;
    array (size=4)
    0 =&gt; string '2NDICB' (length=6)
    1 =&gt; string '307.00' (length=6)
    2 =&gt; string '-1.10' (length=5)
    6 =&gt; string '-0.36%' (length=6)
    4 =&gt;
    array (size=4)
    0 =&gt; string '4THICB' (length=6)
    1 =&gt; string '190.10' (length=6)
    2 =&gt; string '-5.50' (length=5)
    6 =&gt; string '-2.81%' (length=6)
    5 =&gt;
    array (size=4)
    0 =&gt; string '5THICB' (length=6)
    1 =&gt; string '180.00' (length=6)
    2 =&gt; string '-6.50' (length=5)
    6 =&gt; string '-3.49%' (length=6)
    more elements....
</code></pre>

<h3 id="intercept-of-the-element-of-array">Intercept of the Element of Array</h3>

<p><code>1st element</code> of the array is <code>The Trading Code</code>
    <code>2nd element</code> of the array is <code>Last Trade Price</code>
    <code>3rd element</code> of the array is <code>Change value</code>
    <code>4th element</code> of the array is <code>Change in percentage</code></p>

<h3 id="how-to-contribute">How to Contribute</h3>

<p><a href="https://github.com/shahariaazam/DSE-Share-Market-Update/fork">Fork</a> this repo and send pull request of
    your modification.</p>

<h3 id="license">License</h3>

<p>The <code>DSE-Share-Market-Update</code> is open-sourced software licensed under the <a
        href="http://opensource.org/licenses/MIT">MIT license</a></p>

<h1 id="contributors">Contributors</h1>

<p>G. M. Shaharia Azam
    <a href="http://www.shahariaazam.com">http://www.shahariaazam.com</a></p>

<p>To view more contributors <a href="https://github.com/shahariaazam/DSE-Share-Market-Update/contributors">click
    here</a></p>
</body>
</html>
