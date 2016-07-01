<?php
/**
 * Class Emojify
 *
 * @description Intergrate Emoji conversions in your PHP projects.
 * @author Jonathan Barrow (halolink44@gmail.com)
 * @package Emojify
 * @version 1.0
 * @copyright 2016 Jonathan Barrow
 * @link https://github.com/ReduxRedstone/Emojify-PHP
 */
class Emojify {

	/*Converts the text and style into the Emoji*/
	private function convert_replace($item, $style = "") {

		/*extracts and removes the style from the word*/
		if (strpos($item, "-") === false) {
			/*if item has no "-" do nothing*/
			$item = $item;
		} else {
			/*break the item into parts*/
			$break = explode("-", $item);
			$count = sizeof($break);
			$pos = $count-1;
			if ($break[$pos] == "tw" OR $break[$pos] == "an") {
				/*removes style*/
				unset($break[$pos]);
				$item = implode("-", $break);
			} else {
				$item = implode("-", $break);
			}
		}
		/*contains emoji keys and classes*/
		$emojiArr = array(
						':copyright' => "<span class=\"emoji emoji-copyright-circle".$style."\"></span>",
						':trade' => "<span class=\"emoji emoji-rmtrademark-circle".$style."\"></span>",
						':!!' => "<span class=\"emoji emoji-double-exclaim".$style."\"></span>",
						':!?' => "<span class=\"emoji emoji-exclaim-question".$style."\"></span>",
						':tm' => "<span class=\"emoji emoji-trademark".$style."\"></span>",
						':i' => "<span class=\"emoji emoji-i-slant".$style."\"></span>",
						':arrow-side-side' => "<span class=\"emoji emoji-arrow-side-side".$style."\"></span>",
						':arrow-up-down' => "<span class=\"emoji emoji-arrow-up-down".$style."\"></span>",
						':arrow-top-left' => "<span class=\"emoji emoji-arrow-top-left".$style."\"></span>",
						':arrow-top-right' => "<span class=\"emoji emoji-arrow-top-right".$style."\"></span>",
						':arrow-bottom-right' => "<span class=\"emoji emoji-arrow-bottom-right".$style."\"></span>",
						':arrow-bottom-left' => "<span class=\"emoji emoji-arrow-bottom-left".$style."\"></span>",
						':arrow-loop-right' => "<span class=\"emoji emoji-arrow-loop-right".$style."\"></span>",
						':arrow-loop-left' => "<span class=\"emoji emoji-arrow-loop-left".$style."\"></span>",
						':watch' => "<span class=\"emoji emoji-watch".$style."\"></span>",
						':hourglass-half' => "<span class=\"emoji emoji-hourglass-half".$style."\"></span>",
						':keyboard' => "<span class=\"emoji emoji-keyboard".$style."\"></span>",
						':arrow-double-right' => "<span class=\"emoji emoji-arrow-double-right".$style."\"></span>",
						':arrow-double-left' => "<span class=\"emoji emoji-arrow-double-left".$style."\"></span>",
						':arrow-double-up' => "<span class=\"emoji emoji-arrow-double-up".$style."\"></span>",
						':arrow-double-down' => "<span class=\"emoji emoji-arrow-double-down".$style."\"></span>",
						':arrow-forward' => "<span class=\"emoji emoji-arrow-forward".$style."\"></span>",
						':arrow-backward' => "<span class=\"emoji emoji-arrow-backward".$style."\"></span>",
						':arrow-pause-play' => "<span class=\"emoji emoji-arrow-pause-play".$style."\"></span>",
						':alarm-clock' => "<span class=\"emoji emoji-alarm-clock".$style."\"></span>",
						':stopwatch' => "<span class=\"emoji emoji-stopwatch".$style."\"></span>",
						':timer' => "<span class=\"emoji emoji-timer".$style."\"></span>",
						':hourglass-full' => "<span class=\"emoji emoji-hourglass-full".$style."\"></span>",
						':pause' => "<span class=\"emoji emoji-pause".$style."\"></span>",
						':square' => "<span class=\"emoji emoji-square-blue-square".$style."\"></span>",
						':circle' => "<span class=\"emoji emoji-circle-blue-square".$style."\"></span>",
						':m-blue' => "<span class=\"emoji emoji-m-blue-circle".$style."\"></span>",
						':square-black-small' => "<span class=\"emoji emoji-square-black-small".$style."\"></span>",
						':square-white-small' => "<span class=\"emoji emoji-square-white-small".$style."\"></span>",
						':>' => "<span class=\"emoji emoji-arrow-full-forward".$style."\"></span>",
						':<' => "<span class=\"emoji emoji-arrow-full-backward".$style."\"></span>",
						':square-black' => "<span class=\"emoji emoji-square-black".$style."\"></span>",
						':square-white' => "<span class=\"emoji emoji-square-white".$style."\"></span>",
						':square-black-medium' => "<span class=\"emoji emoji-square-black-medium".$style."\"></span>",
						':square-white-medium' => "<span class=\"emoji emoji-square-white-medium".$style."\"></span>",
						':sun' => "<span class=\"emoji emoji-sun".$style."\"></span>",
						':cloud' => "<span class=\"emoji emoji-cloud".$style."\"></span>",
						':umbrella' => "<span class=\"emoji emoji-umbrella".$style."\"></span>",
						':snowman-snow' => "<span class=\"emoji emoji-snowman-snow".$style."\"></span>",
						':comet' => "<span class=\"emoji emoji-comet".$style."\"></span>",
						':phone' => "<span class=\"emoji emoji-phone".$style."\"></span>",
						':black-check' => "<span class=\"emoji emoji-check-black".$style."\"></span>",
						':umbrella-rain' => "<span class=\"emoji emoji-umbrella-rain".$style."\"></span>",
						':coffee' => "<span class=\"emoji emoji-coffee".$style."\"></span>",
						':clover' => "<span class=\"emoji emoji-clover".$style."\"></span>",
						':palm-point-1' => "<span class=\"emoji emoji-palm-point-yellow".$style."\"></span>",
						':palm-point-2' => "<span class=\"emoji emoji-palm-point-white".$style."\"></span>",
						':palm-point-3' => "<span class=\"emoji emoji-palm-point-tan-1".$style."\"></span>",
						':palm-point-4' => "<span class=\"emoji emoji-palm-point-tan-2".$style."\"></span>",
						':palm-point-5' => "<span class=\"emoji emoji-palm-point-black-1".$style."\"></span>",
						':palm-point-6' => "<span class=\"emoji emoji-palm-point-black-2".$style."\"></span>",
						':skull-crossbones' => "<span class=\"emoji emoji-skull-crossbones".$style."\"></span>",
						':radioactive' => "<span class=\"emoji emoji-bio-hazard-1".$style."\"></span>",
						':bio-hazard' => "<span class=\"emoji emoji-bio-hazard-2".$style."\"></span>",
						':orthodox-cross' => "<span class=\"emoji emoji-orthodox-cross".$style."\"></span>",
						':star-crescent' => "<span class=\"emoji emoji-star-crescent".$style."\"></span>",
						':peace' => "<span class=\"emoji emoji-peace".$style."\"></span>",
						':ying-yang' => "<span class=\"emoji emoji-ying-yang".$style."\"></span>",
						':dharma-wheel' => "<span class=\"emoji emoji-dharma-wheel".$style."\"></span>",
						':(' => "<span class=\"emoji emoji-frown".$style."\"></span>",
						':)' => "<span class=\"emoji emoji-smile".$style."\"></span>",
						':aries' => "<span class=\"emoji emoji-aries".$style."\"></span>",
						':taurus' => "<span class=\"emoji emoji-taurus".$style."\"></span>",
						':gemini' => "<span class=\"emoji emoji-gemini".$style."\"></span>",
						':cancer' => "<span class=\"emoji emoji-cancer".$style."\"></span>",
						':leo' => "<span class=\"emoji emoji-leo".$style."\"></span>",
						':virgo' => "<span class=\"emoji emoji-virgo".$style."\"></span>",
						':libra' => "<span class=\"emoji emoji-libra".$style."\"></span>",
						':scorpius' => "<span class=\"emoji emoji-scorpius".$style."\"></span>",
						':sagittarius' => "<span class=\"emoji emoji-sagittarius".$style."\"></span>",
						':capricorn' => "<span class=\"emoji emoji-capricorn".$style."\"></span>",
						':aquarius' => "<span class=\"emoji emoji-aquarius".$style."\"></span>",
						':pisces' => "<span class=\"emoji emoji-pisces".$style."\"></span>",
						':card-spade' => "<span class=\"emoji emoji-spade-card".$style."\"></span>",
						':card-heart' => "<span class=\"emoji emoji-heart-card".$style."\"></span>",
						':card-diamond' => "<span class=\"emoji emoji-diamond-card".$style."\"></span>",
						':card-club' => "<span class=\"emoji emoji-club-card".$style."\"></span>",
						':hot-spring' => "<span class=\"emoji emoji-hot-spring".$style."\"></span>",
						':recycle' => "<span class=\"emoji emoji-recycle".$style."\"></span>",
						':wheelchair-symbol' => "<span class=\"emoji emoji-wheelchair-symbol".$style."\"></span>",
						':hammer-and-pick' => "<span class=\"emoji emoji-hammer-pick".$style."\"></span>",
						':anchor' => "<span class=\"emoji emoji-anchor".$style."\"></span>",
						':crossed-swords' => "<span class=\"emoji emoji-crossed-swords".$style."\"></span>",
						':scales' => "<span class=\"emoji emoji-scales".$style."\"></span>",
						':crystal-ball' => "<span class=\"emoji emoji-crystal-ball".$style."\"></span>",
						':gear' => "<span class=\"emoji emoji-gear".$style."\"></span>",
						':atom-symbol' => "<span class=\"emoji emoji-atom-symbol".$style."\"></span>",
						':fleur-de-lis' => "<span class=\"emoji emoji-fleur-de-lis".$style."\"></span>",
						':warning-sign' => "<span class=\"emoji emoji-warning-sign".$style."\"></span>",
						':high-voltage' => "<span class=\"emoji emoji-high-voltage".$style."\"></span>",
						':circle-white-medium' => "<span class=\"emoji emoji-circle-white-medium".$style."\"></span>",
						':circle-black-medium' => "<span class=\"emoji emoji-circle-black-medium".$style."\"></span>",
						':coffin' => "<span class=\"emoji emoji-coffin".$style."\"></span>",
						':funeral-urn' => "<span class=\"emoji emoji-funeral-urn".$style."\"></span>",
						':soccer-ball' => "<span class=\"emoji emoji-soccer-ball".$style."\"></span>",
						':baseball' => "<span class=\"emoji emoji-baseball".$style."\"></span>",
						':snowman' => "<span class=\"emoji emoji-snowman".$style."\"></span>",
						':sun-behind-cloud-medium' => "<span class=\"emoji emoji-sun-behind-cloud-1".$style."\"></span>",
						':thunder-cloud-and-rain' => "<span class=\"emoji emoji-thunder-cloud-and-1".$style."\"></span>",
						':ophiuchus' => "<span class=\"emoji emoji-ophiuchus".$style."\"></span>",
						':pick' => "<span class=\"emoji emoji-pick".$style."\"></span>",
						':helmet-with-white-cross' => "<span class=\"emoji emoji-helmet-with-white-cross".$style."\"></span>",
						':chains' => "<span class=\"emoji emoji-chains".$style."\"></span>",
						':no-entry' => "<span class=\"emoji emoji-no-entry".$style."\"></span>",
						':shinto-shrine' => "<span class=\"emoji emoji-shinto-shrine".$style."\"></span>",
						':church' => "<span class=\"emoji emoji-church".$style."\"></span>",
						':snow-capped-mountain' => "<span class=\"emoji emoji-snow-capped-mountain".$style."\"></span>",
						':beach-with-umbrella' => "<span class=\"emoji emoji-beach-with-umbrella".$style."\"></span>",
						':fountain' => "<span class=\"emoji emoji-fountain".$style."\"></span>",
						':flag-in-hole' => "<span class=\"emoji emoji-flag-in-hole".$style."\"></span>",
						':ferry' => "<span class=\"emoji emoji-ferry".$style."\"></span>",
						':sailboat' => "<span class=\"emoji emoji-sailboat".$style."\"></span>",
						':skier' => "<span class=\"emoji emoji-skier".$style."\"></span>",
						':ice-skate' => "<span class=\"emoji emoji-ice-skate".$style."\"></span>",
						':person-with-ball-1' => "<span class=\"emoji emoji-person-with-ball-yellow".$style."\"></span>",
						':person-with-ball-2' => "<span class=\"emoji emoji-person-with-ball-white".$style."\"></span>",
						':person-with-ball-3' => "<span class=\"emoji emoji-person-with-ball-tan-1".$style."\"></span>",
						':person-with-ball-4' => "<span class=\"emoji emoji-person-with-ball-tan-2".$style."\"></span>",
						':person-with-ball-5' => "<span class=\"emoji emoji-person-with-ball-black-1".$style."\"></span>",
						':person-with-ball-6' => "<span class=\"emoji emoji-person-with-ball-black-2".$style."\"></span>",
						':camping' => "<span class=\"emoji emoji-camping".$style."\"></span>",
						':fuel-pump' => "<span class=\"emoji emoji-fuel-pump".$style."\"></span>",
						':scissors' => "<span class=\"emoji emoji-scissors".$style."\"></span>",
						':white-check' => "<span class=\"emoji emoji-check-white".$style."\"></span>",
						':airplane' => "<span class=\"emoji emoji-airplane".$style."\"></span>",
						':envelope' => "<span class=\"emoji emoji-envelope".$style."\"></span>",
						':fist-1' => "<span class=\"emoji emoji-fist-yellow".$style."\"></span>",
						':fist-2' => "<span class=\"emoji emoji-fist-white".$style."\"></span>",
						':fist-3' => "<span class=\"emoji emoji-fist-tan-1".$style."\"></span>",
						':fist-4' => "<span class=\"emoji emoji-fist-tan-2".$style."\"></span>",
						':fist-5' => "<span class=\"emoji emoji-fist-black-1".$style."\"></span>",
						':fist-6' => "<span class=\"emoji emoji-fist-black-2".$style."\"></span>",
						':raised-hand-1' => "<span class=\"emoji emoji-raised-hand-yellow".$style."\"></span>",
						':raised-hand-2' => "<span class=\"emoji emoji-raised-hand-white".$style."\"></span>",
						':raised-hand-3' => "<span class=\"emoji emoji-raised-hand-tan-1".$style."\"></span>",
						':raised-hand-4' => "<span class=\"emoji emoji-raised-hand-tan-2".$style."\"></span>",
						':raised-hand-5' => "<span class=\"emoji emoji-raised-hand-black-1".$style."\"></span>",
						':raised-hand-6' => "<span class=\"emoji emoji-raised-hand-black-2".$style."\"></span>",
						':peace-hand-1' => "<span class=\"emoji emoji-peace-hand-yellow".$style."\"></span>",
						':peace-hand-2' => "<span class=\"emoji emoji-peace-hand-white".$style."\"></span>",
						':peace-hand-3' => "<span class=\"emoji emoji-peace-hand-tan-1".$style."\"></span>",
						':peace-hand-4' => "<span class=\"emoji emoji-peace-hand-tan-2".$style."\"></span>",
						':peace-hand-5' => "<span class=\"emoji emoji-peace-hand-black-1".$style."\"></span>",
						':peace-hand-6' => "<span class=\"emoji emoji-peace-hand-black-2".$style."\"></span>",
						':writing-hand-1' => "<span class=\"emoji emoji-writing-hand-yellow".$style."\"></span>",
						':writing-hand-2' => "<span class=\"emoji emoji-writing-hand-white".$style."\"></span>",
						':writing-hand-3' => "<span class=\"emoji emoji-writing-hand-tan-1".$style."\"></span>",
						':writing-hand-4' => "<span class=\"emoji emoji-writing-hand-tan-2".$style."\"></span>",
						':writing-hand-5' => "<span class=\"emoji emoji-writing-hand-black-1".$style."\"></span>",
						':writing-hand-6' => "<span class=\"emoji emoji-writing-hand-black-2".$style."\"></span>",
						':pencil' => "<span class=\"emoji emoji-pencil".$style."\"></span>",
						':fountain-pen-right' => "<span class=\"emoji emoji-fountain-pen-right".$style."\"></span>",
						':heavy-check' => "<span class=\"emoji emoji-heavy-check".$style."\"></span>",
						':heavy-x' => "<span class=\"emoji emoji-heavy-x".$style."\"></span>",
						':latin-cross' => "<span class=\"emoji emoji-latin-cross".$style."\"></span>",
						':star-of-david' => "<span class=\"emoji emoji-star-of-david".$style."\"></span>",
						':sparkles' => "<span class=\"emoji emoji-sparkles".$style."\"></span>",
						':eight-spoked-asterisk' => "<span class=\"emoji emoji-eight-spoked-asterisk".$style."\"></span>",
						':orange-x' => "<span class=\"emoji emoji-orange-x".$style."\"></span>",
						':snowflake' => "<span class=\"emoji emoji-snowflake".$style."\"></span>",
						':sparkle' => "<span class=\"emoji emoji-sparkle".$style."\"></span>",
						':cross-mark' => "<span class=\"emoji emoji-cross-mark".$style."\"></span>",
						':negative-squared-cross-mark' => "<span class=\"emoji emoji-negative-squared-cross-mark".$style."\"></span>",
						':?' => "<span class=\"emoji emoji-question-mark-red".$style."\"></span>",
						':?-white' => "<span class=\"emoji emoji-question-mark-white".$style."\"></span>",
						':!' => "<span class=\"emoji emoji-exclaim-single-red".$style."\"></span>",
						':!-white' => "<span class=\"emoji emoji-exclaim-single-white".$style."\"></span>",
						':heart-exclamation-mark' => "<span class=\"emoji emoji-heart-exclamation-mark".$style."\"></span>",
						':heart' => "<span class=\"emoji emoji-heart".$style."\"></span>",
						':plus' => "<span class=\"emoji emoji-plus".$style."\"></span>",
						':minus' => "<span class=\"emoji emoji-minus".$style."\"></span>",
						':division' => "<span class=\"emoji emoji-division".$style."\"></span>",
						':arrow-right' => "<span class=\"emoji emoji-arrow-right".$style."\"></span>",
						':curly-loop' => "<span class=\"emoji emoji-curly-loop".$style."\"></span>",
						':double-curly-loop' => "<span class=\"emoji emoji-double-curly-loop".$style."\"></span>",
						':arrow-loop-up' => "<span class=\"emoji emoji-arrow-loop-up".$style."\"></span>",
						':arrow-loop-down' => "<span class=\"emoji emoji-arrow-loop-down".$style."\"></span>",
						':arrow-left' => "<span class=\"emoji emoji-arrow-left".$style."\"></span>",
						':arrow-up' => "<span class=\"emoji emoji-arrow-up".$style."\"></span>",
						':arrow-down' => "<span class=\"emoji emoji-arrow-down".$style."\"></span>",
						':square-black-large' => "<span class=\"emoji emoji-square-black-large".$style."\"></span>",
						':square-white-large' => "<span class=\"emoji emoji-square-white-large".$style."\"></span>",
						':star' => "<span class=\"emoji emoji-star".$style."\"></span>",
						':star' => "<span class=\"emoji emoji-star".$style."\"></span>",
						':red-circle' => "<span class=\"emoji emoji-red-circle".$style."\"></span>",
						':wavy-dash' => "<span class=\"emoji emoji-wavy-dash".$style."\"></span>",
						':part-alternation-mark' => "<span class=\"emoji emoji-part-alternation-mark".$style."\"></span>",
						':circled-ideograph-congratulation' => "<span class=\"emoji emoji-circled-ideograph-congratulation".$style."\"></span>",
						':circled-ideograph-secret' => "<span class=\"emoji emoji-circled-ideograph-secret".$style."\"></span>",
						':mahjong-tile-red-dragon' => "<span class=\"emoji emoji-mahjong-tile-red-dragon".$style."\"></span>",
						':joker-card' => "<span class=\"emoji emoji-joker-card".$style."\"></span>",
						':white-a' => "<span class=\"emoji emoji-white-a".$style."\"></span>",
						':white-b' => "<span class=\"emoji emoji-white-b".$style."\"></span>",
						':white-o' => "<span class=\"emoji emoji-white-o".$style."\"></span>",
						':white-p' => "<span class=\"emoji emoji-white-p".$style."\"></span>",
						':white-ab' => "<span class=\"emoji emoji-white-ab".$style."\"></span>",
						':white-cl' => "<span class=\"emoji emoji-white-cl".$style."\"></span>",
						':squared-cool' => "<span class=\"emoji emoji-squared-cool".$style."\"></span>",
						':squared-free' => "<span class=\"emoji emoji-squared-free".$style."\"></span>",
						':squared-id' => "<span class=\"emoji emoji-squared-id".$style."\"></span>",
						':squared-new' => "<span class=\"emoji emoji-squared-new".$style."\"></span>",
						':squared-ng' => "<span class=\"emoji emoji-squared-ng".$style."\"></span>",
						':squared-ok' => "<span class=\"emoji emoji-squared-ok".$style."\"></span>",
						':sos' => "<span class=\"emoji emoji-sos".$style."\"></span>",
						':squared-up' => "<span class=\"emoji emoji-squared-up".$style."\"></span>",
						':squared-vs' => "<span class=\"emoji emoji-squared-vs".$style."\"></span>",
						':squared-katakana-koko' => "<span class=\"emoji emoji-squared-katakana-koko".$style."\"></span>",
						':squared-katakana-sa' => "<span class=\"emoji emoji-squared-katakana-sa".$style."\"></span>",
						':squared-cjk-unified-ideograph-7121' => "<span class=\"emoji emoji-squared-cjk-unified-ideograph-7121".$style."\"></span>",
						':squared-cjk-unified-ideograph-6307' => "<span class=\"emoji emoji-squared-cjk-unified-ideograph-6307".$style."\"></span>",
						':squared-cjk-unified-ideograph-7981' => "<span class=\"emoji emoji-squared-cjk-unified-ideograph-7981".$style."\"></span>",
						':squared-cjk-unified-ideograph-7a7a' => "<span class=\"emoji emoji-squared-cjk-unified-ideograph-7a7a".$style."\"></span>",
						':squared-cjk-unified-ideograph-5408' => "<span class=\"emoji emoji-squared-cjk-unified-ideograph-5408".$style."\"></span>",
						':squared-cjk-unified-ideograph-6e80' => "<span class=\"emoji emoji-squared-cjk-unified-ideograph-6e80".$style."\"></span>",
						':squared-cjk-unified-ideograph-6709' => "<span class=\"emoji emoji-squared-cjk-unified-ideograph-6709".$style."\"></span>",
						':squared-cjk-unified-ideograph-6708' => "<span class=\"emoji emoji-squared-cjk-unified-ideograph-6708".$style."\"></span>",
						':squared-cjk-unified-ideograph-7533' => "<span class=\"emoji emoji-squared-cjk-unified-ideograph-7533".$style."\"></span>",
						':squared-cjk-unified-ideograph-5272' => "<span class=\"emoji emoji-squared-cjk-unified-ideograph-5272".$style."\"></span>",
						':squared-cjk-unified-ideograph-55b6' => "<span class=\"emoji emoji-squared-cjk-unified-ideograph-55b6".$style."\"></span>",
						':circled-ideograph-advantage' => "<span class=\"emoji emoji-circled-ideograph-advantage".$style."\"></span>",
						':circled-ideograph-accept' => "<span class=\"emoji emoji-circled-ideograph-accept".$style."\"></span>",
						':cyclone' => "<span class=\"emoji emoji-cyclone".$style."\"></span>",
						':foggy' => "<span class=\"emoji emoji-foggy".$style."\"></span>",
						':closed-umbrella' => "<span class=\"emoji emoji-closed-umbrella".$style."\"></span>",
						':night-with-stars' => "<span class=\"emoji emoji-night-with-stars".$style."\"></span>",
						':sunrise-over-mountains' => "<span class=\"emoji emoji-sunrise-over-mountains".$style."\"></span>",
						':sunrise' => "<span class=\"emoji emoji-sunrise".$style."\"></span>",
						':cityscape-at-dusk' => "<span class=\"emoji emoji-cityscape-at-dusk".$style."\"></span>",
						':sunset-over-buildings' => "<span class=\"emoji emoji-sunset-over-buildings".$style."\"></span>",
						':rainbow' => "<span class=\"emoji emoji-rainbow".$style."\"></span>",
						);
		if (array_key_exists(mb_strtolower($item), $emojiArr)) {
			return $emojiArr[mb_strtolower($item)];
		} else {
			return $item.$style;
		}
	}

	private function get_stlye($item) {
		/*gets the style to be used in conversion*/
		if (strpos($item, "-") === false) {
			$style = "";
			return $style;
		} else {
			$break = explode("-", $item);
			$count = sizeof($break);
			$pos = $count-1;
			if ($break[$pos] == "tw" OR $break[$pos] == "an") {
				$style = "-".$break[$pos];
				return $style;
			} else {
				$item = implode("-", $break);
			   	$style = "";
			   	return $style;
			}
		}
	}

	private function split_into_words($text) {
		/*splits the text given into separate words*/
		$result = explode(' ', $text);
		for ($i = 0; $i < count($result); $i++) {
	        $result[$i] = trim($result[$i]);
	    }
	    return $result;
	}

	public function emoji($string) {
		/*main function*/
		$wordArray = $this->split_into_words($string);
		$arrayLength = count($wordArray);
		$finishArray = array();
		for ($c=0; $c < $arrayLength; $c++) {
			$style = $this->get_stlye($wordArray[$c]);
			$check = $this->convert_replace($wordArray[$c], $style);
			array_push($finishArray, $check);
		}
		return implode(" ", $finishArray);
	}
}