<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>simplelightbox-master/dist/simple-lightbox.css?v2.10.3" />
<link rel="stylesheet" href="<?php echo base_url() ?>simplelightbox-master/demo/demo.css" />
<title>SimpleLightbox by André Rinas</title>
</head>
<body>
<header>
	<div class="gradient"></div>
	<div class="header-container">
		<div class="container demo-container">
			<div class="info">
				<h1>SimpleLightbox <sup>v2.10.3</sup></h1>
				<span class="subline">Touch-friendly image lightbox</span>
				<nav>
					<a class="btn donate" target="_blank" href="https://www.paypal.me/anrinas">Donate</a>
					<a class="btn wordpress" target="_blank" href="https://wordpress.org/plugins/simplelightbox/">Wordpress</a>
					<a class="btn typo3" target="_blank" href="https://extensions.typo3.org/extension/simplelightbox/">TYPO3</a><br><br>
					<a class="btn accent-color scrolllink" href="#documentation">Documentation</a>
					<a class="btn accent-color" target="_blank" href="https://github.com/andreknieriem/simplelightbox/archive/master.zip">Download</a>
					<a class="btn github" target="_blank" href="https://github.com/andreknieriem/simplelightbox">Github</a>
				</nav>
			</div>
			<div class="small-demo">
				<a href="img/full/01.jpg"><img src="img/thumb/01.jpg" title="Drone Photography" alt="" /></a>
				<a rel="rel2" href="img/full/02.jpg"><img src="img/thumb/02.jpg" alt="" /></a>
				<a rel="rel3" href="img/full/03.jpg"><img src="img/thumb/03.jpg" alt="" /></a>
				<a rel="rel2" href="img/full/04.jpg"><img src="img/thumb/04.jpg" alt="" /></a>
				<a rel="rel2" href="img/full/05.jpg"><img src="img/thumb/05.jpg" alt="" title="Lego Heads" /></a>
				<a rel="rel1" href="img/full/06.jpg"><img src="img/thumb/06.jpg" alt="" /></a>
				<div class="clearing"></div>
				<div class="caption">
					Click on an image to see it in action. Note, that the lightbox is grouped by rel attribute.
				</div>
			</div>
			<div class="clearing"></div>
		</div>
		<a class="scroll-hint scrolllink" href="#documentation"><span class="scrollwheel"></span></a>
	</div>
</header>
<div class="flyin-navi sl-fixed">
	<div class="container">
		<ul>
			<li><a class="scrolllink" href="#install">Install</a></li>
			<li><a class="scrolllink" href="#usage">Usage</a></li>
			<li><a class="scrolllink" href="#options">Options</a></li>
			<li><a class="scrolllink" href="#events">Events</a></li>
			<li><a class="scrolllink" href="#publicmethods">Public Methods</a></li>
			<li><a class="scrolllink" href="#multiple">Multiple</a></li>
			<li><a class="scrolllink" href="#customization">Customization</a></li>
		</ul>
	</div>
</div>
<section>
	<div class="container" id="documentation">
		<h1>Documentation</h1>
		<div class="row">
			<div class="col-left" id="install">
				<h2>Install</h2>
			</div>
			<div class="col-right">
				<p>
					To install SimpleLightbox you can do the following:
				</p>
				<pre>
<code class="language-bash">// YARN
yarn add simplelightbox

//Bower
bower install simplelightbox

//NPM
npm install simplelightbox</code>
				</pre>
				<p>
					Simple include <strong>simplelight-box.css</strong> and <strong>simple-lightbox.js</strong> to your page and use:
				</p>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-left" id="usage">
				<h2>Usage</h2>
			</div>
			<div class="col-right">
				<h3>Standalone Plugin</h3>
				<p>
					When using the standalone variant (`simple-lightbox(.min).js`)
				</p>
				<pre class="language-javascript"><code class="language-javascript">var lightbox = new SimpleLightbox('.gallery a', { /* options */ });</code></pre>
				<p>
					When using the standalone variant (`simple-lightbox(.min).js`)
				</p>
				<pre class="language-javascript"><code class="language-javascript">var lightbox = $('.gallery a').simpleLightbox({ /* options */ });</code></pre>

				<h3>With Webpack/Browserify/Parcel etc...</h3>
				<p>Choose the module file you want do import or require.</p>
				<strong>Module with Babel tranformation</strong><br>
				<pre class="language-javascript"><code class="language-javascript">import SimpleLightbox from "simplelightbox";</code></pre>
				<br>
				<strong>Plain ES Module without Babel</strong><br>
				<pre class="language-javascript"><code class="language-javascript">import SimpleLightbox from "simplelightbox/dist/simple-lightbox.esm";</code></pre>
			</div>
		</div>
		<div class="row">
			<div class="col-left" id="usage">
				<h2>Markup</h2>
			</div>
			<div class="col-right">
				<p>For the default setup, you just need links that are pointing to images.</p>
				<pre class="language-markup"><code class="language-markup">&lt;div class="gallery"&gt;
    &lt;a href="images/image1.jpg"&gt;&lt;img src="images/thumbs/thumb1.jpg" alt="" title=""/&gt;&lt;/a&gt;
    &lt;a href="images/image2.jpg"&gt;&lt;img src="images/thumbs/thumb2.jpg" alt="" title="Beautiful Image"/&gt;&lt;/a&gt;
&lt;/div&gt;</code></pre>
				<p>
				The markup inside the A-Tags can be whatever you want. In this example thumbnails of the big images. The Title Tag is by default used to show a caption.
				For a whole example just look at the demo folder.
				</p>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-left" id="options">
				<h2>JavaScript Options</h2>
			</div>
			<div class="col-right">
				<table>
					<thead>
					<tr>
					<th>Property</th>
					<th>Default</th>
					<th>Type</th>
					<th>Description</th>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td>sourceAttr</td>
					<td>href</td>
					<td>string</td>
					<td>the attribute used for large images</td>
					</tr>
					<tr>
					<td>overlay</td>
					<td>true</td>
					<td>bool</td>
					<td>show an overlay or not</td>
					</tr>
					<tr>
					<td>overlayOpacity</td>
					<td>0.7</td>
					<td>float</td>
					<td>the opacity of the overlay</td>
					</tr>
					<tr>
					<td>spinner</td>
					<td>true</td>
					<td>bool</td>
					<td>show spinner or not</td>
					</tr>
					<tr>
					<td>nav</td>
					<td>true</td>
					<td>bool</td>
					<td>show arrow-navigation or not</td>
					</tr>
					<tr>
					<td>navText</td>
					<td>['←','→']</td>
					<td>array</td>
					<td>text or html for the navigation arrows</td>
					</tr>
					<tr>
					<td>captions</td>
					<td>true</td>
					<td>bool</td>
					<td>show captions if availabled or not</td>
					</tr>
					<tr>
					<td>captionSelector</td>
					<td>'img'</td>
					<td>string or function</td>
					<td>set the element where the caption is. Set it to "self" for the A-Tag itself or use a callback which returns the element</td>
					</tr>
					<tr>
					<td>captionType</td>
					<td>'attr'</td>
					<td>string</td>
					<td>how to get the caption. You can choose between attr, data or text</td>
					</tr>
					<tr>
					<td>captionsData</td>
					<td>title</td>
					<td>string</td>
					<td>get the caption from given attribute</td>
					</tr>
					<tr>
					<td>captionPosition</td>
					<td>'bottom'</td>
					<td>string</td>
					<td>the position of the caption. Options are top, bottom or outside (note that outside can be outside the visible viewport!)</td>
					</tr>
					<tr>
					<td>captionDelay</td>
					<td>0</td>
					<td>int</td>
					<td>adds a delay before the caption shows (in ms)</td>
					</tr>
					<tr>
					<td>captionClass</td>
					<td>''</td>
					<td>string</td>
					<td>adds an additional class to the sl-caption</td>
					</tr>
					<tr>
					<td>close</td>
					<td>true</td>
					<td>bool</td>
					<td>show the close button or not</td>
					</tr>
					<tr>
					<td>closeText</td>
					<td>'×'</td>
					<td>string</td>
					<td>text or html for the close button</td>
					</tr>
					<tr>
					<td>swipeClose</td>
					<td>true</td>
					<td>bool</td>
					<td>swipe up or down to close gallery</td>
					</tr>
					<tr>
					<td>showCounter</td>
					<td>true</td>
					<td>bool</td>
					<td>show current image index or not</td>
					</tr>
					<tr>
					<td>fileExt</td>
					<td>'png|jpg|jpeg|gif'</td>
					<td>regexp or false</td>
					<td>list of fileextensions the plugin works with or false for disable the check</td>
					</tr>
					<tr>
					<td>animationSpeed</td>
					<td>250</td>
					<td>int</td>
					<td>how long takes the slide animation</td>
					</tr>
					<tr>
					<td>animationSlide</td>
					<td>true</td>
					<td>bool</td>
					<td>weather to slide in new photos or not, disable to fade</td>
					</tr>
					<tr>
					<td>preloading</td>
					<td>true</td>
					<td>bool</td>
					<td>allows preloading next und previous images</td>
					</tr>
					<tr>
					<td>enableKeyboard</td>
					<td>true</td>
					<td>bool</td>
					<td>allow keyboard arrow navigation and close with ESC key</td>
					</tr>
					<tr>
					<td>loop</td>
					<td>true</td>
					<td>bool</td>
					<td>enables looping through images</td>
					</tr>
					<tr>
					<td>rel</td>
					<td>false</td>
					<td>mixed</td>
					<td>This can be used as an anchor rel alternative for Simplelightbox. This allows the user to group any combination of elements together for a gallery, or to override an existing rel so elements are not grouped together. Note: The value can also be set to 'nofollow' to disable grouping.</td>
					</tr>
					<tr>
					<td>docClose</td>
					<td>true</td>
					<td>bool</td>
					<td>closes the lightbox when clicking outside</td>
					</tr>
					<tr>
					<td>swipeTolerance</td>
					<td>50</td>
					<td>int</td>
					<td>how much pixel you have to swipe, until next or previous image</td>
					</tr>
					<tr>
					<td>className</td>
					<td>'simple-lightbox'</td>
					<td>string</td>
					<td>adds a class to the wrapper of the lightbox</td>
					</tr>
					<tr>
					<td>widthRatio</td>
					<td>0.8</td>
					<td>float</td>
					<td>Ratio of image width to screen width</td>
					</tr>
					<tr>
					<td>heightRatio</td>
					<td>0.9</td>
					<td>float</td>
					<td>Ratio of image height to screen height</td>
					</tr>
					<td>scaleImageToRatio</td>
					<td>false</td>
					<td>bool</td>
					<td>scales the image up to the defined ratio size</td>
					</tr>
					<tr>
					<td>disableRightClick</td>
					<td>false</td>
					<td>bool</td>
					<td>disable rightclick on image or not</td>
					</tr>
					<tr>
					<td>disableScroll</td>
					<td>true</td>
					<td>bool</td>
					<td>stop scrolling page if lightbox is opened</td>
					</tr>
					<tr>
					<td>alertError</td>
					<td>true</td>
					<td>bool</td>
					<td>show an alert, if image was not found. If false error will be ignored</td>
					</tr>
					<tr>
					<td>alertErrorMessage</td>
					<td>'Image not found, next image will be loaded'</td>
					<td>string</td>
					<td>the message displayed if image was not found</td>
					</tr>
					<tr>
					<td>additionalHtml</td>
					<td>false</td>
					<td>string</td>
					<td>Additional HTML showing inside every image. Usefull for watermark etc. If false nothing is added</td>
					</tr>
					<tr>
					<td>history</td>
					<td>true</td>
					<td>bool</td>
					<td>enable history back closes lightbox instead of reloading the page</td>
					</tr>
					<tr>
					<td>throttleInterval</td>
					<td>0</td>
					<td>int</td>
					<td>time to wait between slides</td>
					</tr>
					<tr>
					<td>doubleTapZoom</td>
					<td>2</td>
					<td>int</td>
					<td>zoom level if double tapping on image</td>
					</tr>
					<tr>
					<td>maxZoom</td>
					<td>10</td>
					<td>int</td>
					<td>maximum zoom level on pinching</td>
					</tr>
					<tr>
					<td>htmlClass</td>
					<td>has-lightbox</td>
					<td>string</td>
					<td>adds class to html element if lightbox is open. If empty or false no class is set</td>
					</tr>
					<tr>
					<td>rtl</td>
					<td>false</td>
					<td>bool</td>
					<td>change direction to rigth-to-left</td>
					</tr>
					<tr>
					<td>fixedClass</td>
					<td>sl-fixed</td>
					<td>string</td>
					<td>elements with this class are fixed and get the right padding when lightbox opens</td>
					</tr>
					<tr>
					<td>fadeSpeed</td>
					<td>300</td>
					<td>int</td>
					<td>the duration for fading in and out in milliseconds. Used for caption fadein/out too. If smaller than 100 it should be used with animationSlide:false</td>
					</tr>
					<tr>
					<td>uniqueImages</td>
					<td>true</td>
					<td>bool</td>
					<td>whether to uniqualize images or not</td>
					</tr>
					<tr>
					<td>focus</td>
					<td>true</td>
					<td>bool</td>
					<td>focus the lightbox on open to enable tab control</td>
					</tr>
					<tr>
					<td>scrollZoom</td>
					<td>true</td>
					<td>bool</td>
					<td>Can zoom image with mousewheel scrolling</td>
					</tr>
					<tr>
					<td>scrollZoomFactor</td>
					<td>0.5</td>
					<td>float</td>
					<td>How much zoom when scrolling via mousewheel</td>
					</tr>
					</tbody>
					</table>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-left" id="events">
				<h2>Events</h2>
			</div>
			<div class="col-right">
				<table>
				<thead>
				<tr>
				<th>Name</th>
				<th>Description</th>
				</tr>
				</thead>
				<tbody>
				<tr>
				<td>show.simplelightbox</td>
				<td>this event fires before the lightbox opens</td>
				</tr>
				<tr>
				<td>shown.simplelightbox</td>
				<td>this event fires after the lightbox was opened</td>
				</tr>
				<tr>
				<td>close.simplelightbox</td>
				<td>this event fires before the lightbox closes</td>
				</tr>
				<tr>
				<td>closed.simplelightbox</td>
				<td>this event fires after the lightbox was closed</td>
				</tr>
				<tr>
				<td>change.simplelightbox</td>
				<td>this event fires before image changes</td>
				</tr>
				<tr>
				<td>changed.simplelightbox</td>
				<td>this event fires after image was changed</td>
				</tr>
				<tr>
				<td>next.simplelightbox</td>
				<td>this event fires before next image arrives</td>
				</tr>
				<tr>
				<td>nextDone.simplelightbox</td>
				<td>this event fires after next image was arrived</td>
				</tr>
				<tr>
				<td>prev.simplelightbox</td>
				<td>this event fires before previous image arrives</td>
				</tr>
				<tr>
				<td>prevDone.simplelightbox</td>
				<td>this event fires after previous image was arrived</td>
				</tr>
				<tr>
				<td>nextImageLoaded.simplelightbox</td>
				<td>this event fires after next image was loaded (if preload activated)</td>
				</tr>
				<tr>
				<td>prevImageLoaded.simplelightbox</td>
				<td>this event fires after previous image was loaded (if preload activated)</td>
				</tr>
				<tr>
				<td>error.simplelightbox</td>
				<td>this event fires on image load error</td>
				</tr>
				</tbody>
				</table>
				<h4>Examples</h4>
				<pre><code class="language-javascript">let gallery = new SimpleLightbox('.gallery a');
gallery.on('show.simplelightbox', function () {
	// do something…
});

gallery.on('error.simplelightbox', function (e) {
	console.log(e); // some usefull information
});

// with jQuery nearly the same
let gallery = $('.gallery a').simpleLightbox();
gallery.on('show.simplelightbox', function () {
	// do something…
});</code></pre>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-left" id="publicmethods">
				<h2>Public Methods</h2>
			</div>
			<div class="col-right">
				<table>
<thead>
<tr>
<th>Name</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>open</td>
<td>Opens the lightbox with an given Element</td>
</tr>
<tr>
<td>close</td>
<td>Closes current openend Lightbox</td>
</tr>
<tr>
<td>next</td>
<td>Go to next image</td>
</tr>
<tr>
<td>prev</td>
<td>Go to previous image</td>
</tr>
<tr>
<td>destroy</td>
<td>Destroys the instance of  the lightbox</td>
</tr>
<tr>
<td>refresh</td>
<td>Destroys and reinitilized the lightbox, needed for eg. Ajax Calls, or after dom manipulations</td>
</tr>
<tr>
<td>getLighboxData</td>
<td>Get some useful lightbox data</td>
</tr>
</tbody>
</table>
<h4>Example</h4>
<pre>
<code class="language-javascript">var gallery = $('.gallery a').simpleLightbox();

gallery.next(); // Next Image</code>
</pre>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-left" id="multiple">
				<h2>Multiple Lightboxes on one page</h2>
			</div>
			<div class="col-right">
				<p>
					You can have multiple lightboxes on one page, if you give them different selectors. Here is a small example:
				</p>
<pre>
<code class="language-javascript">var lightbox1 = $('.lighbox-1 a').simpleLightbox();
var lightbox2 = $('.lighbox-2 a').simpleLightbox();</code>
</pre>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-left" id="customization">
				<h2>Customization</h2>
			</div>
			<div class="col-right">
				<p>
					You can customize Simplelightbox by changing the style in simplelightbox.css.
				</p>
				<p>
					If you are using SASS, you can customize Simplelightbox with the following variables
				</p>
<pre>
<code class="language-css">$sl-font-family: Arial, Baskerville, monospace;
$sl-overlay-background: #fff;
$sl-navigation-color: #000;
$sl-caption-color: #fff;
$sl-caption-background: #000;

$sl-counter-fontsize: 1rem;
$sl-caption-fontsize: 1rem;
$sl-close-fontsize: 3rem;

$sl-breakpoint-medium: 35.5em; // 568px, when 1rem == 16px
$sl-breakpoint-large:  50em;   // 800px, when 1rem == 16px

$sl-arrow-fontsize-small:  2rem;
$sl-arrow-fontsize-medium: 3rem;
$sl-arrow-fontsize-large:  3rem;
$sl-img-border-small:  0 none;
$sl-img-border-medium: 0 none;
$sl-img-border-large:  0 none;
$sl-iframe-border-small:  0 none;
$sl-iframe-border-medium: 0 none;
$sl-iframe-border-large:  0 none;

$add-vendor-prefixes: true !default;</code>
</pre>
			</div>
		</div>
	</div>
</section>
<section class="changelog">
	<div class="container">
		<div class="row">
			<div class="col-left">
				<h2>Changelog</h2>
			</div>
			<div class="col-right">
				<strong>2.10.3</strong> - Fixed #264 - Fixed wrong mouse-zoom when the page is scrolled<br />
				<strong>2.10.2</strong> - Fixed #258 with opacity flicker on overlay. For this, moved style option captionOpacity to js plugin<br />
				<strong>2.10.1</strong> - Fixed #255 fast switching photos and #256 for hiding back and next buttons on loop: false<br />
				<strong>2.10.0</strong> - Fixed #254 - Nav Buttons disappear and adding new method getLighboxData so get some useful data for #251<br />
				<strong>2.9.0</strong> - Added mousescroll function with new options mouseScroll and mouseScrollFactor<br />
				<strong>2.8.1</strong> - Fixed #250 - No closing if image load fails. #249 Disable scroll on Mac works now<br />
				<strong>2.8.0</strong> - Fixed #235 - legacy file too big. #236 bad package.json and added support for passive event listeners #240. Thanks to @coderars for the issues and some code<br />
				<strong>2.7.3</strong> - Fixed #232 - sourceAttr does not work. Thanks to @bivisual for the issue<br />
				<strong>2.7.2</strong> - Fixed #231 - disableRightClick doesn't. Thanks to @DrMint for the fix<br />
				<strong>2.7.1</strong> - Fixed #228 - no mouse swiping in firefox. Thanks to @DrMint for the fix<br />
				<strong>2.7.0</strong> - Merged #206 which fixes #205. Thanks to @ocean90 for the idea and PR<br />
				<strong>2.6.0</strong> - Added new option uniqueImages for #156, focus for #190 and fixed bug #200 issue closing during animation.<br />
				<strong>2.5.0</strong> - Added new option fadeSpeed. This will fix #147.<br />
				<strong>2.4.1</strong> - Added new simple-lightbox.legacy.js with IE 11 Support<br />
				<strong>2.4.0</strong> - Added new option for fixed elements class #195<br />
				<strong>2.3.0</strong> - Merged Feature for ESM Modules. Thanks to Serafin Lichtenhahn #173<br />
				<strong>2.2.1</strong> - Fixed bug #174 and problem with ES Modules<br />
				<strong>2.2.0</strong> - Added ES Modules support, thanks to @seralichtenhahn for the PR. This fixed #164<br />
				<strong>2.1.5</strong> - Fixed bug #169 open method and #171 error while pan on mobile devices<br />
				<strong>2.1.4</strong> - Fixed bug #168 doubletap zoom on touch devices<br />
				<strong>2.1.3</strong> - Fixed bug in destroy method #167 and big with html in  navText #165<br />
				<strong>2.1.2</strong> - Fixed additionalHtml bug #163<br />
				<strong>2.1.1</strong> - Fixed captions bug #162<br />
				<strong>2.1.0</strong> - Added rel grouping feature #16<br />
				<strong>2.0.0</strong> - Complete rewrite. Now uses modern ES6 javascript, without the need of jQuery. Can use jQuery anyway. Developers can use gulp with babel to contribute. Thanks to Mtillmann #129 for the implementation <br />
				<strong>1.17.3</strong> - Fixed new chrome passive error #155<br />
				<strong>1.17.2</strong> - Fixed caption keeps disappeared on double click #139 and added better close symbol #133<br />
				<strong>1.17.1</strong> - Added webp in fileExt list #135, removed hardcoded a-tag in isValidLink function #134<br />
				<strong>1.17.0</strong> - Merged pull request #132. Added double click to zoom for desktop browsers - Thanks to coderkan<br />
				<strong>1.16.3</strong> - Merged pull request #126,#127 - Thanks to jieter<br />
				<strong>1.16.2</strong> - Added featured #124 - Add a class to html element if lightbox is open<br />
				<strong>1.16.1</strong> - Fixed pinch to zoom offset error on scrolling #123<br />
				<strong>1.16.0</strong> - Pinch to Zoom feature for touch devices with new options doubleTapZoom and maxZoom #79<br />
				<strong>1.15.1</strong> - Merged pull request #113,#114,#115 - Thanks to RaphaelHaettich and celsius-jochen<br />
				<strong>1.15.0</strong> - Merged pull request #111, fixed #101 and added possibility to close lightbox on load #74<br />
				<strong>1.14.0</strong> - Merged pull request #107 and #108. Thanks to RaphaelHaettich<br />
				<strong>1.13.0</strong> - Added featured #92 and merged pull request #98 and #99. Thankt to RaphaelHaettich<br />
				<strong>1.12.2</strong> - Bugfix for #89<br />
				<strong>1.12.1</strong> - Bugfix for #88,#87 and remove bind/unbind #84<br />
				<strong>1.12.0</strong> - New option captionClass #81, bugfix for #82<br />
				<strong>1.11.1</strong> - Merged pull request #76. Thanks to walterebert, added support for images with parameters and file extension check #59<br />
				<strong>1.11.0</strong> - New option for src of image. e.g data attribute #70<br />
				<strong>1.10.7</strong> - Added Bootstrap compatibility #69<br />
				<strong>1.10.6</strong> - Merged pull requests #65. Thanks to mstaniuk<br />
				<strong>1.10.5</strong> - Merged pull requests #60 and #61. Thanks to slavanga<br />
				<strong>1.10.4</strong> - Bugfix von #58<br />
				<strong>1.10.3</strong> - Merged pull requests #55, #56 and #57. Thanks to karland<br />
				<strong>1.10.2</strong> - Aligned navigation and close buttons #51, fixed image error bug #52<br />
				<strong>1.10.1</strong> - Added support for jQuery 3.x #50<br />
				<strong>1.10.0</strong> - Implemented feature-request #48, history back, some bugfixing and code styling<br />
				<strong>1.9.0</strong> - Implemented feature-request #16, added rel option for grouping images<br />
				<strong>1.8.6</strong> - Implemented feature-request #46, added refresh method<br />
				<strong>1.8.5</strong> - Implemented feature-request #44<br />
				<strong>1.8.4</strong> - Bugfix for #41 and added option for additional html inside images #40<br />
				<strong>1.8.3</strong> - Bugfix for #38 and small other fix for loop false option<br />
				<strong>1.8.2</strong> - Better bugfix for #33, finally fixing multiple lightbox on one page slowness issues!<br />
				<strong>1.8.1</strong> - Bugfix for #31, #32 and #33<br />
				<strong>1.8.0</strong> - New API Events (changed open to show) and little fix in function open() brought by Geoffrey Crofte and some other small bugfixes<br />
				<strong>1.7.2</strong> - Bugfix von #25 and #27<br />
				<strong>1.7.1</strong> - Bugfix von #22 with new option alertError and merged pull request #23<br />
				<strong>1.7.0</strong> - Add support for fading between photos, Bugfix for single image navigation, option for caption delay<br />
				<strong>1.6.0</strong> - Option for caption position. Disable prev or next arrow if loop is false and position is first or last.<br />
				<strong>1.5.1</strong> - Bugfix for multiple lightboxes on one page<br />
				<strong>1.5.0</strong> - Added options for disabling rightclick and scrolling, changed default prev- and next-button text<br />
				<strong>1.4.6</strong> - Option for fileExt can now be false to enable pictures like example.com/pic/200/100<br />
				<strong>1.4.5</strong> - Bugfix lightbox opening does not work on mobile devices<br />
				<strong>1.4.4</strong> - Bugfix no drag&amp;drop in FF, changed default close text, only output data if lightbox is opened<br />
				<strong>1.4.3</strong> - Bugfix z-index for spinner to low, added sass files<br />
				<strong>1.4.2</strong> - Bugfix for issue #2 - Drop Event does not fire when mouse leaves window<br />
				<strong>1.4.1</strong> - The whole caption Selector is rewritten. You can now select an element and get its text, use data or attribute<br />
				<strong>1.4.0</strong> - Caption Attribute can now be what, you want, or data-title. Fixed some small issues<br />
				<strong>1.3.1</strong> - Bugfix: disable keyboard control if lightbox is closed<br />
				<strong>1.3.0</strong> - Added current index indicator/counter<br />
				<strong>1.2.0</strong> - Added option for captions attribute (title or data-title)<br />
				<strong>1.1.2</strong> - Bugfix for looping images<br />
				<strong>1.1.1</strong> - Bugfix for loading indicator and removed a log-event<br />
				<strong>1.1.0</strong> - Added classname for lightbox wrapper and width/height ratio<br />
				<strong>1.0.0</strong> - Initial Release
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-left">
				<h2>Author/<br />Contributors</h2>
			</div>
			<div class="col-right">
				<p>
					<a target="_blank" href="https://andrerinas.de/">Andre Rinas</a> - <a target="_blank" href="https://github.com/andreknieriem/">Github</a>
				</p>
				<p>
					<a target="_blank" href="https://github.com/Mtillmann">Martin Tillmann</a><br>
					<a target="_blank" href="https://github.com/nicekiwi">nicekiwi</a><br>
					<a target="_blank" href="https://github.com/helloilya">helloilya</a><br>
					<a target="_blank" href="https://github.com/bitstarr">bitstarr</a><br>
					<a target="_blank" href="http://geoffrey.crofte.fr/">Geoffrey Crofte</a> - <a target="_blank" href="https://github.com/creativejuiz/">Github</a><br>
					<a target="_blank" href="http://webseiten-anders.de/">Karl Anders</a> - <a target="_blank" href="https://github.com/karland/">Github</a><br>
					<a target="_blank" href="https://github.com/RaphaelHaettich">Raphael Hättich</a><br>
					<a target="_blank" href="https://github.com/seralichtenhahn">Serafin Lichtenhahn</a><br>
					<a target="_blank" href="https://www.celcius.be">Jochen Sengier</a> - <a target="_blank" href="https://github.com/celcius-jochen/">Github</a><br>
					<a target="_blank" href="https://github.com/dmh">Dmytro Hrynevych</a><br>
					<a target="_blank" href="https://dominikschilling.de/">Dominik Schilling</a>  - <a target="_blank" href="https://github.com/ocean90/">Github</a><br>
					<a target="_blank" href="https://github.com/DrMint">DrMint</a><br>
				</p>
			</div>
		</div>
	</div>
</section>
<footer>
	<div class="container">
		Images from <a href="https://unsplash.com/" target="_blank">Unsplash</a> &middot; Thanks to <a target="_blank" href="http://prismjs.com/">PrismJS</a> for syntax highlighting.
	</div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>simplelightbox-master/dist/simple-lightbox.js?v2.10.3"></script>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-22248575-1', 'auto');
	ga('set', 'anonymizeIp', true);
	ga('send', 'pageview', '/#simplelightbox')

	
	(function() {
		$('header').css('min-height',Math.max($(window).height(),620));

		$('body').fadeIn(200);

		let $gallery = new SimpleLightbox('.small-demo a', {});

		interval = window.setInterval(function(){
			$('.scrollwheel').animate({
				top: 14
			},400, function(){
				$('.scrollwheel').animate({
					top: 10
				},400);
			})
		},1000);

		$('.flyin-navi a').each(function(i,item){
			var elem = $(this),
			item = {
				refElement: $(elem.attr('href')),
				parent: elem.parent()
			}
			inPageItems.push(item);
		});

		$(window).resize(function(){
			$('header').height(Math.max($(window).height(),620));
		});

		$('.scrolllink').click(function(e){
			e.preventDefault();
			var target = $(this).attr('href');
			$('html, body').animate({ scrollTop: ($(target).offset().top -50 )}, 'slow');
		});

		$(window).scroll(function(){
			var top = $( document ).scrollTop(),
			inpageNav = $('.flyin-navi');
			docStart = $('#documentation').offset().top;

			if(top > docStart) {
				inpageNav.fadeIn('fast');
			} else {
				inpageNav.fadeOut('fast');
			}

			$.each(inPageItems, function(i,item){
				if(top > item.refElement.offset().top -52){
					if(!item.parent.hasClass('active')){
						$('.flyin-navi li').removeClass('active');
						item.parent.addClass('active');
					}
				}
				else{
					item.parent.removeClass('active');
				}
			});
		});

		// set all github links
		var res = $('section.changelog').html().replace(/(#\d{1,})/gi, function (x) {
			var num = x.substr(1);
			return '<a target="_blank" href="https://github.com/andreknieriem/simplelightbox/issues/'+num+'">'+x+'</a>';
		});
		$('section.changelog').html(res);
	})();
</script>
</body>
</html>
