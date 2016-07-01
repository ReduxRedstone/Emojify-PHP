<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="emoji.css">
	<!--link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css">
	<link rel="stylesheet" type="text/css" href="http://jakiestfu.github.com/Mention.js/recommended-styles.css">

	<script src="files/js/jquery-2.1.4.min.js"></script>
	<script src="files/js/bootstrap-typeahead.js"></script>
	<script src="files/js/mention.js"></script>
	<script src="files/js/main.js"></script-->
</head>
<body>

</body>
</html>
<textarea id="test"></textarea>
<br>
<?php

include("emoji.class.php");

$test = new Emojify;
echo $test->emoji(":copyright :trade :!! :!? :tm :i :arrow-side-side :arrow-up-down :arrow-top-left :arrow-top-right :arrow-bottom-right :arrow-bottom-left :arrow-loop-left :arrow-loop-right :watch :hourglass-half :keyboard :arrow-double-right :arrow-double-left :arrow-double-up :arrow-double-down :arrow-forward :arrow-backward :arrow-pause-play :alarm-clock :stopwatch :timer :hourglass-full :pause :square :circle :m-blue :square-black-small :square-white-small :> :< :square-black :square-white :square-black-medium :square-white-medium :sun <br> :cloud :umbrella :snowman-snow :comet :phone :black-check :umbrella-rain :coffee :clover :palm-point-1 :palm-point-2 :palm-point-3 :palm-point-4 :palm-point-5 :palm-point-6 :skull-crossbones :radioactive :bio-hazard :orthodox-cross :star-crescent :peace :ying-yang :dharma-wheel :( :) :aries :taurus :gemini :cancer :leo :virgo :libra :scorpius :sagittarius :capricorn :aquarius :pisces :card-spade :card-heart :card-diamond :card-club <br> :hot-spring :recycle :wheelchair-symbol :hammer-and-pick :anchor :crossed-swords :scales :crystal-ball :gear :atom-symbol :fleur-de-lis :warning-sign :high-voltage :circle-white-medium :circle-black-medium :coffin :funeral-urn :soccer-ball :baseball :snowman :sun-behind-cloud-medium :thunder-cloud-and-rain :ophiuchus :pick :helmet-with-white-cross :chains :no-entry :shinto-shrine :church :snow-capped-mountain :beach-with-umbrella :fountain :flag-in-hole :ferry :sailboat :skier :ice-skate :person-with-ball-1 :person-with-ball-2 :person-with-ball-3 :person-with-ball-4 <br> :person-with-ball-5 :person-with-ball-6 :camping :fuel-pump :scissors :white-check :airplane :envelope :fist-1 :fist-2 :fist-3 :fist-4 :fist-5 :fist-6 :raised-hand-1 :raised-hand-2 :raised-hand-3 :raised-hand-4 :raised-hand-5 :raised-hand-6 :peace-hand-1 :peace-hand-2 :peace-hand-3 :peace-hand-4 :peace-hand-5 :peace-hand-6 :writing-hand-1 :writing-hand-2 :writing-hand-3 :writing-hand-4 :writing-hand-5 :writing-hand-6 :pencil :fountain-pen-right :heavy-check :heavy-x :latin-cross :star-of-david :sparkles :eight-spoked-asterisk :orange-x <br> :snowflake :sparkle :cross-mark :negative-squared-cross-mark :? :?-white :! :!-white :heart-exclamation-mark :heart :plus :minus :division :arrow-right :curly-loop :double-curly-loop :arrow-loop-up :arrow-loop-down :arrow-left :arrow-up :arrow-down :square-black-large :square-white-large :star :red-circle :wavy-dash :part-alternation-mark :circled-ideograph-congratulation :circled-ideograph-secret :mahjong-tile-red-dragon :joker-card :white-a :white-b :white-o :white-p :white-ab :white-cl :squared-cool :squared-free :squared-id :squared-new <br> :squared-ng :squared-ok :sos :squared-ok :squared-vs :squared-katakana-koko :squared-katakana-sa :squared-cjk-unified-ideograph-7121 :squared-cjk-unified-ideograph-6307 :squared-cjk-unified-ideograph-7981 :squared-cjk-unified-ideograph-7a7a :squared-cjk-unified-ideograph-5408 :squared-cjk-unified-ideograph-6e80 :squared-cjk-unified-ideograph-6709 :squared-cjk-unified-ideograph-6708 :squared-cjk-unified-ideograph-7533 :squared-cjk-unified-ideograph-5272 :squared-cjk-unified-ideograph-55b6 :circled-ideograph-advantage :circled-ideograph-accept :cyclone :foggy :closed-umbrella :night-with-stars :sunrise-over-mountains :sunrise :cityscape-at-dusk :sunset-over-buildings :rainbow");