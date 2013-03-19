<?php
$root = ".";
require_once("$root/base.php");

pageHeader("Questions & Answers", "faq");
?>

<style>
dt {
    font-weight: bold;
    margin-bottom: 10px;
}

dd {
    margin-left: 0;
    margin-bottom: 20px;
}
</style>

<p>Most of these questions would come to my mind. But it's totally up to you, feel free to ask more.</p>

<ul>
    <li><a href="#browser">What browser do I need to run it?</a></li>
    <li><a href="#extended">Is this supporting extended building attributes, i.e. roof shapes?</a></li>
    <li><a href="#data">Are you planning to provide world wide data coverage?</a></li>
    <li><a href="#webgl">Isn't this like WebGL Google Maps on my desktop browser?</a></li>
    <li><a href="#mobile">But it is like Google Maps on my Android mobile phone?</a></li>
    <li><a href="#photorealistic">But now, aren't Google's and Apple's new 3D Maps much more realistic?</a></li>
    <li><a href="#opensource">Will your engine stay open source?</a></li>
</ul>

<dl>
    <dt><a name="browser"></a>What browser do I need to run it?</dt>
    <dd>It's tested on respective latest versions of Firefox, Chrome and Safari. As it uses canvas to draw, it's not running properly on IE Versions prior 9.
    Opera 12 and Mobile Safari on iOS 5 devices are fine as well. If you can confirm other platforms running/not running, please report in.</dd>

    <dt><a name="extended"></a>Is this supporting extended building attributes, i.e. roof shapes?</dt>
    <dd>You are referring to this <a href="http://wiki.openstreetmap.org/wiki/Simple_3D_Buildings">OSM Simple 3D Buildings</a>.
    The engine doesn't support it yet but it will quite soon. It' might turn out it requires WebGL to implement it.</dd>

    <dt><a name="data"></a>Are you planning to provide world wide data coverage?</dt>
    <dd>This is primarily a frontend engine. Therefore the data is just an exerpt and at the moment it will be up to you to import data.</dd>

    <dt><a name="webgl"></a>Isn't this like WebGL Google Maps on my desktop browser?</dt>
    <dd>Talking about the version which looks pretty much like this (not the photorealistic one): the idea is the same.
    Although they are using powerful WebGL it's almost unusable on my desktop machine. And it wouldn't run on many mobile devices.
    Anyway, this library will support WebGL in the future too, and it will do it right.</dd>

    <dt><a name="mobile"></a>But it is like Google Maps on my Android mobile phone?</dt>
    <dd>Yes it's similar, but you have to install an app on other platforms than Android.</dd>

    <dt><a name="photorealistic"></a>But now, aren't Google's and Apple's new 3D Maps much more realistic?</dt>
    <dd>First: credits to Nokia Maps, they did the same thing one year ahead of all the competition. And indeed, such visualizations are great eye catchers.
    But that comes with a huge amount of data (~50GB per city), which I'd also call "dumb" data because it can't distinguish between a tree or a building (i.e. unlike CityGML).
    Let's see how that will work on upcoming mobile devices. At least right now on desktop it requires state of the art hardware to run smoothly.</dd>

    <dt><a name="opensource"></a>Will your engine stay open source?</dt>
    <dd>Yes, it will. There are no charges, nothing.</dd>
</dl>

<?php pageFooter()?>