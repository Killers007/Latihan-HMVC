<!DOCTYPE html>
<html>
<head>
	<title>Warning</title>
	<style type="text/css">
	@import url("https://fonts.googleapis.com/css?family=Poppins");
	html, body, div, span, applet, object, iframe,
	h1, h2, h3, h4, h5, h6, p, blockquote, pre,
	a, abbr, acronym, address, big, cite, code,
	del, dfn, em, img, ins, kbd, q, s, samp,
	small, strike, strong, sub, sup, tt, var,
	b, u, i, center,
	dl, dt, dd, ol, ul, li,
	fieldset, form, label, legend,
	table, caption, tbody, tfoot, thead, tr, th, td,
	article, aside, canvas, details, embed,
	figure, figcaption, footer, header, hgroup,
	menu, nav, output, ruby, section, summary,
	time, mark, audio, video {
		margin: 0;
		padding: 0;
		border: 0;
		font: inherit;
		font-size: 100%;
		vertical-align: baseline;
	}

	html {
		line-height: 1;
	}

	ol, ul {
		list-style: none;
	}

	table {
		border-collapse: collapse;
		border-spacing: 0;
	}

	caption, th, td {
		text-align: left;
		font-weight: normal;
		vertical-align: middle;
	}

	q, blockquote {
		quotes: none;
	}
	q:before, q:after, blockquote:before, blockquote:after {
		content: "";
		content: none;
	}

	a img {
		border: none;
	}

	article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
		display: block;
	}

	@keyframes shining {
		0% {
			opacity: 1;
		}
		100% {
			opacity: 0.2;
		}
	}
	body {
		background-color: #482472;
		font-family: Poppins;
	}

	.scenery {
		position: absolute;
		top: 50%;
		left: 50%;
		width: 1000px;
		height: 618px;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		transform: translate(-50%, -50%);
		overflow: hidden;
		border-radius: 5px;
		color: #fff;
		background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjAuMCIgeDI9IjAuNSIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzJhMWY2ZiIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2FlMzA4MiIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
		background-size: 100%;
		background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #2a1f6f), color-stop(100%, #ae3082));
		background-image: -moz-linear-gradient(#2a1f6f, #ae3082);
		background-image: -webkit-linear-gradient(#2a1f6f, #ae3082);
		background-image: linear-gradient(#2a1f6f, #ae3082);
		-moz-box-shadow: rgba(0, 0, 0, 0.8) 0px 0px 100px;
		-webkit-box-shadow: rgba(0, 0, 0, 0.8) 0px 0px 100px;
		box-shadow: rgba(0, 0, 0, 0.8) 0px 0px 100px;
	}

	.star {
		position: absolute;
		z-index: 1;
		background-color: #fff;
		animation-name: shining;
		animation-timing-function: ease;
		animation-direction: alternate;
		animation-iteration-count: infinite;
		-moz-box-shadow: #fff 0px 0px 5px;
		-webkit-box-shadow: #fff 0px 0px 5px;
		box-shadow: #fff 0px 0px 5px;
		-moz-border-radius: 200px;
		-webkit-border-radius: 200px;
		border-radius: 200px;
	}

	.star:nth-child(1) {
		width: 1px;
		height: 1px;
		bottom: 98px;
		left: 122px;
		animation-duration: 2s;
	}

	.star:nth-child(2) {
		width: 3px;
		height: 3px;
		bottom: 47px;
		left: 950px;
		animation-duration: 4s;
	}

	.star:nth-child(3) {
		width: 1px;
		height: 1px;
		bottom: 154px;
		left: 140px;
		animation-duration: 3s;
	}

	.star:nth-child(4) {
		width: 2px;
		height: 2px;
		bottom: 458px;
		left: 237px;
		animation-duration: 1.33333s;
	}

	.star:nth-child(5) {
		width: 1px;
		height: 1px;
		bottom: 314px;
		left: 117px;
		animation-duration: 2s;
	}

	.star:nth-child(6) {
		width: 1px;
		height: 1px;
		bottom: 127px;
		left: 38px;
		animation-duration: 1s;
	}

	.star:nth-child(7) {
		width: 1px;
		height: 1px;
		bottom: 59px;
		left: 738px;
		animation-duration: 4s;
	}

	.star:nth-child(8) {
		width: 1px;
		height: 1px;
		bottom: 386px;
		left: 544px;
		animation-duration: 1s;
	}

	.star:nth-child(9) {
		width: 1px;
		height: 1px;
		bottom: 337px;
		left: 351px;
		animation-duration: 1.5s;
	}

	.star:nth-child(10) {
		width: 2px;
		height: 2px;
		bottom: 175px;
		left: 585px;
		animation-duration: 1.33333s;
	}

	.star:nth-child(11) {
		width: 2px;
		height: 2px;
		bottom: 92px;
		left: 738px;
		animation-duration: 1.5s;
	}

	.star:nth-child(12) {
		width: 3px;
		height: 3px;
		bottom: 279px;
		left: 257px;
		animation-duration: 3s;
	}

	.star:nth-child(13) {
		width: 1px;
		height: 1px;
		bottom: 440px;
		left: 724px;
		animation-duration: 0.66667s;
	}

	.star:nth-child(14) {
		width: 2px;
		height: 2px;
		bottom: 306px;
		left: 278px;
		animation-duration: 1s;
	}

	.star:nth-child(15) {
		width: 2px;
		height: 2px;
		bottom: 474px;
		left: 683px;
		animation-duration: 1.33333s;
	}

	.star:nth-child(16) {
		width: 1px;
		height: 1px;
		bottom: 170px;
		left: 40px;
		animation-duration: 2s;
	}

	.star:nth-child(17) {
		width: 3px;
		height: 3px;
		bottom: 69px;
		left: 763px;
		animation-duration: 1.33333s;
	}

	.star:nth-child(18) {
		width: 1px;
		height: 1px;
		bottom: 13px;
		left: 96px;
		animation-duration: 1s;
	}

	.star:nth-child(19) {
		width: 1px;
		height: 1px;
		bottom: 419px;
		left: 332px;
		animation-duration: 2s;
	}

	.star:nth-child(20) {
		width: 3px;
		height: 3px;
		bottom: 440px;
		left: 345px;
		animation-duration: 1.5s;
	}

	.star:nth-child(21) {
		width: 1px;
		height: 1px;
		bottom: 609px;
		left: 278px;
		animation-duration: 2s;
	}

	.star:nth-child(22) {
		width: 1px;
		height: 1px;
		bottom: 498px;
		left: 989px;
		animation-duration: 2s;
	}

	.star:nth-child(23) {
		width: 1px;
		height: 1px;
		bottom: 311px;
		left: 749px;
		animation-duration: 2s;
	}

	.star:nth-child(24) {
		width: 3px;
		height: 3px;
		bottom: 507px;
		left: 108px;
		animation-duration: 2s;
	}

	.star:nth-child(25) {
		width: 1px;
		height: 1px;
		bottom: 68px;
		left: 627px;
		animation-duration: 2s;
	}

	.star:nth-child(26) {
		width: 2px;
		height: 2px;
		bottom: 322px;
		left: 197px;
		animation-duration: 0.5s;
	}

	.star:nth-child(27) {
		width: 1px;
		height: 1px;
		bottom: 265px;
		left: 627px;
		animation-duration: 2s;
	}

	.star:nth-child(28) {
		width: 3px;
		height: 3px;
		bottom: 301px;
		left: 211px;
		animation-duration: 4s;
	}

	.star:nth-child(29) {
		width: 1px;
		height: 1px;
		bottom: 94px;
		left: 646px;
		animation-duration: 1.33333s;
	}

	.star:nth-child(30) {
		width: 3px;
		height: 3px;
		bottom: 344px;
		left: 653px;
		animation-duration: 0.5s;
	}

	.star:nth-child(31) {
		width: 1px;
		height: 1px;
		bottom: 126px;
		left: 718px;
		animation-duration: 2s;
	}

	.star:nth-child(32) {
		width: 2px;
		height: 2px;
		bottom: 188px;
		left: 388px;
		animation-duration: 0.33333s;
	}

	.star:nth-child(33) {
		width: 1px;
		height: 1px;
		bottom: 9px;
		left: 938px;
		animation-duration: 0.33333s;
	}

	.star:nth-child(34) {
		width: 1px;
		height: 1px;
		bottom: 499px;
		left: 994px;
		animation-duration: 1s;
	}

	.star:nth-child(35) {
		width: 3px;
		height: 3px;
		bottom: 599px;
		left: 916px;
		animation-duration: 0.66667s;
	}

	.star:nth-child(36) {
		width: 3px;
		height: 3px;
		bottom: 481px;
		left: 321px;
		animation-duration: 0.5s;
	}

	.star:nth-child(37) {
		width: 1px;
		height: 1px;
		bottom: 386px;
		left: 461px;
		animation-duration: 1s;
	}

	.star:nth-child(38) {
		width: 3px;
		height: 3px;
		bottom: 185px;
		left: 388px;
		animation-duration: 0.66667s;
	}

	.star:nth-child(39) {
		width: 3px;
		height: 3px;
		bottom: 480px;
		left: 31px;
		animation-duration: 1s;
	}

	.star:nth-child(40) {
		width: 1px;
		height: 1px;
		bottom: 137px;
		left: 946px;
		animation-duration: 2s;
	}

	.star:nth-child(41) {
		width: 3px;
		height: 3px;
		bottom: 417px;
		left: 877px;
		animation-duration: 1s;
	}

	.star:nth-child(42) {
		width: 3px;
		height: 3px;
		bottom: 587px;
		left: 757px;
		animation-duration: 1s;
	}

	.star:nth-child(43) {
		width: 2px;
		height: 2px;
		bottom: 206px;
		left: 291px;
		animation-duration: 2s;
	}

	.star:nth-child(44) {
		width: 2px;
		height: 2px;
		bottom: 34px;
		left: 347px;
		animation-duration: 1s;
	}

	.star:nth-child(45) {
		width: 3px;
		height: 3px;
		bottom: 421px;
		left: 657px;
		animation-duration: 1.5s;
	}

	.star:nth-child(46) {
		width: 3px;
		height: 3px;
		bottom: 441px;
		left: 288px;
		animation-duration: 1s;
	}

	.star:nth-child(47) {
		width: 3px;
		height: 3px;
		bottom: 451px;
		left: 818px;
		animation-duration: 0.33333s;
	}

	.star:nth-child(48) {
		width: 1px;
		height: 1px;
		bottom: 600px;
		left: 892px;
		animation-duration: 0.66667s;
	}

	.star:nth-child(49) {
		width: 1px;
		height: 1px;
		bottom: 566px;
		left: 66px;
		animation-duration: 0.66667s;
	}

	.star:nth-child(50) {
		width: 3px;
		height: 3px;
		bottom: 48px;
		left: 578px;
		animation-duration: 3s;
	}

	.star:nth-child(51) {
		width: 2px;
		height: 2px;
		bottom: 443px;
		left: 908px;
		animation-duration: 1s;
	}

	.star:nth-child(52) {
		width: 2px;
		height: 2px;
		bottom: 48px;
		left: 722px;
		animation-duration: 1s;
	}

	.star:nth-child(53) {
		width: 2px;
		height: 2px;
		bottom: 398px;
		left: 561px;
		animation-duration: 1s;
	}

	.star:nth-child(54) {
		width: 1px;
		height: 1px;
		bottom: 198px;
		left: 583px;
		animation-duration: 1.33333s;
	}

	.star:nth-child(55) {
		width: 2px;
		height: 2px;
		bottom: 608px;
		left: 294px;
		animation-duration: 1s;
	}

	.star:nth-child(56) {
		width: 1px;
		height: 1px;
		bottom: 66px;
		left: 846px;
		animation-duration: 4s;
	}

	.star:nth-child(57) {
		width: 3px;
		height: 3px;
		bottom: 537px;
		left: 203px;
		animation-duration: 1s;
	}

	.star:nth-child(58) {
		width: 2px;
		height: 2px;
		bottom: 330px;
		left: 293px;
		animation-duration: 3s;
	}

	.star:nth-child(59) {
		width: 3px;
		height: 3px;
		bottom: 287px;
		left: 749px;
		animation-duration: 1.33333s;
	}

	.star:nth-child(60) {
		width: 1px;
		height: 1px;
		bottom: 572px;
		left: 608px;
		animation-duration: 4s;
	}

	.star:nth-child(61) {
		width: 2px;
		height: 2px;
		bottom: 472px;
		left: 951px;
		animation-duration: 4s;
	}

	.star:nth-child(62) {
		width: 2px;
		height: 2px;
		bottom: 550px;
		left: 145px;
		animation-duration: 1.5s;
	}

	.star:nth-child(63) {
		width: 2px;
		height: 2px;
		bottom: 20px;
		left: 93px;
		animation-duration: 0.66667s;
	}

	.star:nth-child(64) {
		width: 1px;
		height: 1px;
		bottom: 73px;
		left: 725px;
		animation-duration: 0.33333s;
	}

	.star:nth-child(65) {
		width: 2px;
		height: 2px;
		bottom: 441px;
		left: 575px;
		animation-duration: 1s;
	}

	.star:nth-child(66) {
		width: 1px;
		height: 1px;
		bottom: 565px;
		left: 934px;
		animation-duration: 4s;
	}

	.star:nth-child(67) {
		width: 3px;
		height: 3px;
		bottom: 411px;
		left: 883px;
		animation-duration: 2s;
	}

	.star:nth-child(68) {
		width: 2px;
		height: 2px;
		bottom: 595px;
		left: 507px;
		animation-duration: 1.33333s;
	}

	.star:nth-child(69) {
		width: 3px;
		height: 3px;
		bottom: 430px;
		left: 966px;
		animation-duration: 3s;
	}

	.star:nth-child(70) {
		width: 3px;
		height: 3px;
		bottom: 341px;
		left: 168px;
		animation-duration: 1s;
	}

	.star:nth-child(71) {
		width: 1px;
		height: 1px;
		bottom: 460px;
		left: 482px;
		animation-duration: 2s;
	}

	.star:nth-child(72) {
		width: 1px;
		height: 1px;
		bottom: 286px;
		left: 425px;
		animation-duration: 0.5s;
	}

	.star:nth-child(73) {
		width: 1px;
		height: 1px;
		bottom: 91px;
		left: 659px;
		animation-duration: 0.66667s;
	}

	.star:nth-child(74) {
		width: 3px;
		height: 3px;
		bottom: 74px;
		left: 413px;
		animation-duration: 3s;
	}

	.star:nth-child(75) {
		width: 2px;
		height: 2px;
		bottom: 388px;
		left: 216px;
		animation-duration: 1s;
	}

	.star:nth-child(76) {
		width: 2px;
		height: 2px;
		bottom: 114px;
		left: 103px;
		animation-duration: 1s;
	}

	.star:nth-child(77) {
		width: 1px;
		height: 1px;
		bottom: 71px;
		left: 687px;
		animation-duration: 1s;
	}

	.star:nth-child(78) {
		width: 3px;
		height: 3px;
		bottom: 448px;
		left: 24px;
		animation-duration: 1.33333s;
	}

	.star:nth-child(79) {
		width: 1px;
		height: 1px;
		bottom: 200px;
		left: 345px;
		animation-duration: 1s;
	}

	.star:nth-child(80) {
		width: 2px;
		height: 2px;
		bottom: 317px;
		left: 867px;
		animation-duration: 0.33333s;
	}

	.star:nth-child(81) {
		width: 1px;
		height: 1px;
		bottom: 308px;
		left: 705px;
		animation-duration: 0.66667s;
	}

	.star:nth-child(82) {
		width: 1px;
		height: 1px;
		bottom: 80px;
		left: 497px;
		animation-duration: 1.33333s;
	}

	.star:nth-child(83) {
		width: 3px;
		height: 3px;
		bottom: 194px;
		left: 715px;
		animation-duration: 1s;
	}

	.star:nth-child(84) {
		width: 1px;
		height: 1px;
		bottom: 517px;
		left: 442px;
		animation-duration: 1s;
	}

	.star:nth-child(85) {
		width: 3px;
		height: 3px;
		bottom: 203px;
		left: 555px;
		animation-duration: 0.33333s;
	}

	.star:nth-child(86) {
		width: 3px;
		height: 3px;
		bottom: 179px;
		left: 15px;
		animation-duration: 0.66667s;
	}

	.star:nth-child(87) {
		width: 3px;
		height: 3px;
		bottom: 448px;
		left: 439px;
		animation-duration: 2s;
	}

	.star:nth-child(88) {
		width: 3px;
		height: 3px;
		bottom: 268px;
		left: 666px;
		animation-duration: 2s;
	}

	.star:nth-child(89) {
		width: 1px;
		height: 1px;
		bottom: 425px;
		left: 46px;
		animation-duration: 1.5s;
	}

	.star:nth-child(90) {
		width: 2px;
		height: 2px;
		bottom: 453px;
		left: 11px;
		animation-duration: 1s;
	}

	.star:nth-child(91) {
		width: 3px;
		height: 3px;
		bottom: 212px;
		left: 94px;
		animation-duration: 2s;
	}

	.star:nth-child(92) {
		width: 1px;
		height: 1px;
		bottom: 260px;
		left: 947px;
		animation-duration: 1s;
	}

	.star:nth-child(93) {
		width: 2px;
		height: 2px;
		bottom: 118px;
		left: 226px;
		animation-duration: 2s;
	}

	.star:nth-child(94) {
		width: 1px;
		height: 1px;
		bottom: 564px;
		left: 282px;
		animation-duration: 1.33333s;
	}

	.star:nth-child(95) {
		width: 3px;
		height: 3px;
		bottom: 76px;
		left: 304px;
		animation-duration: 2s;
	}

	.star:nth-child(96) {
		width: 2px;
		height: 2px;
		bottom: 124px;
		left: 855px;
		animation-duration: 1s;
	}

	.star:nth-child(97) {
		width: 2px;
		height: 2px;
		bottom: 64px;
		left: 708px;
		animation-duration: 2s;
	}

	.star:nth-child(98) {
		width: 2px;
		height: 2px;
		bottom: 517px;
		left: 901px;
		animation-duration: 1s;
	}

	.star:nth-child(99) {
		width: 2px;
		height: 2px;
		bottom: 60px;
		left: 460px;
		animation-duration: 0.5s;
	}

	.title {
		position: relative;
		z-index: 50;
	}
	.title h1 {
		font-size: 15rem;
		font-weight: bold;
	}
	.title h1 span {
		vertical-align: middle;
		margin: 0 30px;
	}

	.message {
		margin-top: 50px;
	}
	.message h2 {
		font-size: 1.8rem;
	}

	.action {
		margin-top: 30px;
	}
	.action button {
		padding: 10px 20px;
		font-family: Poppins;
		font-size: 1.2rem;
		color: #fff;
		border: 2px solid #ff9c61;
		background-color: #ff9c61;
		border-radius: 50px;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		-webkit-transition: all 0.2s ease;
		transition: all 0.2s ease;
		box-shadow: 0px 0px 15px #ff9c61;
	}
	.action button:hover {
		cursor: pointer;
		background-color: transparent;
	}

	.square {
		width: 150px;
		height: 150px;
		display: inline-block;
		position: relative;
		vertical-align: middle;
		left: -30px;
		-moz-transform: scale(1.1) rotate(45deg);
		-ms-transform: scale(1.1) rotate(45deg);
		-webkit-transform: scale(1.1) rotate(45deg);
		transform: scale(1.1) rotate(45deg);
	}
	.square > * {
		position: absolute;
	}
	.square .light {
		box-shadow: 0px 0px 10px #fedbae;
		background-color: #fedbae;
	}
	.square .light1, .square .light3 {
		width: 15px;
		height: 135px;
		-moz-transform: skew(0deg, 45deg);
		-ms-transform: skew(0deg, 45deg);
		-webkit-transform: skew(0deg, 45deg);
		transform: skew(0deg, 45deg);
	}
	.square .light2, .square .light4 {
		width: 120px;
		height: 15px;
		-moz-transform: skew(45deg);
		-ms-transform: skew(45deg);
		-webkit-transform: skew(45deg);
		transform: skew(45deg);
	}
	.square .light1 {
		z-index: 10;
		top: 5.5px;
		left: 15px;
	}
	.square .light3 {
		z-index: 2;
		top: 7.5px;
		right: 15px;
	}
	.square .light2 {
		top: 0;
		left: 22.5px;
	}
	.square .light4 {
		bottom: 0;
		right: 22.5px;
	}
	.square .shadow {
		background-color: #ff9c61;
		box-shadow: 0px 0px 10px #ff9c61;
	}
	.square .shadow1 {
		bottom: 7.5px;
		right: 0;
		width: 15px;
		height: 120px;
		-moz-transform: skew(0deg, -45deg);
		-ms-transform: skew(0deg, -45deg);
		-webkit-transform: skew(0deg, -45deg);
		transform: skew(0deg, -45deg);
	}
	.square .shadow2 {
		z-index: 3;
		top: 15px;
		left: 22.5px;
		width: 120px;
		height: 15px;
		-moz-transform: skew(-45deg);
		-ms-transform: skew(-45deg);
		-webkit-transform: skew(-45deg);
		transform: skew(-45deg);
	}
	.square .stairs1 li, .square .stairs2 li, .square .stairs3 li, .square .stairs4 li {
		position: relative;
		width: 7.5px;
		height: 7.5px;
		background-color: #fedbae;
		box-shadow: 0px 0px 10px #fedbae;
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-webkit-transform: rotate(45deg);
		transform: rotate(45deg);
	}
	.square .stairs1 li::before, .square .stairs2 li::before {
		content: "";
		position: absolute;
		left: 0;
		width: 7.5px;
		height: 13px;
		background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuNSIgeDI9IjEuMCIgeTI9IjAuNSI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZlZGJhZSIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2ZmOWM2MSIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
		background-size: 100%;
		background-image: -webkit-gradient(linear, 0% 50%, 100% 50%, color-stop(0%, #fedbae), color-stop(100%, #ff9c61));
		background-image: -moz-linear-gradient(left, #fedbae, #ff9c61);
		background-image: -webkit-linear-gradient(left, #fedbae, #ff9c61);
		background-image: linear-gradient(to right, #fedbae, #ff9c61);
		box-shadow: 0px 0px 10px #fedbae;
	}
	.square .stairs1 {
		top: 1px;
		left: 11px;
		width: 0px;
		height: 150px;
	}
	.square .stairs1 li {
		margin-bottom: 3px;
	}
	.square .stairs1 li::before {
		top: 100%;
	}
	.square .stairs2 {
		z-index: 10;
		bottom: 19px;
		left: 3px;
		width: 150px;
		height: 0px;
		display: flex;
	}
	.square .stairs2 li {
		margin-right: 3.5px;
	}
	.square .stairs2 li:last-child::before {
		background: #fedbae;
	}
	.square .stairs2 li::before {
		bottom: 100%;
	}
	.square .stairs3 {
		bottom: -32px;
		right: 34px;
		width: 0px;
		height: 150px;
		z-index: 10;
	}
	.square .stairs3 li {
		margin-bottom: 3.5px;
	}
	.square .stairs4 {
		top: -4px;
		left: 16px;
		width: 150px;
		height: 0px;
		display: flex;
	}
	.square .stairs4 li {
		margin-right: 3.5px;
	}

	.planet {
		position: absolute;
		z-index: 10;
		width: 90px;
		height: 90px;
		border-radius: 50%;
		box-sizing: border-box;
	}
	.planet::before, .planet::after {
		content: "";
		position: absolute;
		z-index: 1;
		top: 50%;
		left: 50%;
		border-radius: 50%;
		transform: translate(-50%, -50%);
	}
	.planet::before {
		width: 70px;
		height: 70px;
	}
	.planet::after {
		width: 60px;
		height: 60px;
	}

	.planet1 {
		box-shadow: 0px 0px 30px #a3358c;
		bottom: 260px;
		left: 50px;
		border: 5px solid #a3358c;
		background-color: #cf3684;
	}
	.planet1::before {
		background-color: #fd8f5d;
	}
	.planet1::after {
		background-color: #ffdf70;
	}

	.planet2 {
		box-shadow: 0px 0px 30px #1383df;
		-moz-transform: scale(0.8);
		-ms-transform: scale(0.8);
		-webkit-transform: scale(0.8);
		transform: scale(0.8);
		bottom: 40px;
		right: 80px;
		border: 5px solid #1383df;
		background-color: #08abf3;
	}
	.planet2::before {
		background-color: #11c1f1;
	}
	.planet2::after {
		background-color: #22e5f1;
	}

	.planet3 {
		box-shadow: 0px 0px 30px #7a7afe;
		-moz-transform: scale(0.6);
		-ms-transform: scale(0.6);
		-webkit-transform: scale(0.6);
		transform: scale(0.6);
		top: 20px;
		right: 30px;
		border: 5px solid #7a7afe;
		background-color: #9a82ff;
	}
	.planet3::before {
		background-color: #b588ff;
	}
	.planet3::after {
		background-color: #d491ff;
	}

	.girl {
		position: absolute;
		z-index: 99;
		width: 12px;
		height: 40px;
		top: 130px;
		left: 460px;
	}
	.girl .head {
		position: relative;
		z-index: 10;
		width: 10px;
		height: 10px;
		box-sizing: border-box;
		background-color: #fff;
		border-left: 3px solid #000;
		border-radius: 5px;
		-moz-transform: rotate(-20deg);
		-ms-transform: rotate(-20deg);
		-webkit-transform: rotate(-20deg);
		transform: rotate(-20deg);
	}
	.girl .head::before {
		content: "";
		position: absolute;
		left: -16px;
		top: 0px;
		width: 0px;
		height: 0px;
		display: block;
		border-right: 15px solid #fff;
		border-top: 5px solid transparent;
		border-bottom: 4px solid transparent;
	}
	.girl .body {
		position: absolute;
		top: 7px;
		left: -2px;
		width: 0px;
		height: 0px;
		box-sizing: border-box;
		border-bottom: 20px solid #fff;
		border-left: 8px solid transparent;
		border-right: 8px solid transparent;
		border-radius: 7px;
	}
	.girl .legs {
		position: absolute;
		bottom: 5px;
		left: 3px;
		width: 3px;
		height: 10px;
		border-left: 2px solid #fff;
		border-right: 2px solid #fff;
	}

</style>
</head>
<body>

	<div class="scenery">
		<div class="stars">
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
			<div class="star"></div>
		</div>
		<div class="planet planet1"></div>
		<div class="planet planet2"></div>
		<div class="planet planet3"></div>
		<div class="girl">
			<div class="head"></div>
			<div class="body"></div>
			<div class="legs"></div>
		</div>
		<div class="title">
			<h1><span>4</span>
				<div class="square">
					<div class="light light1"></div>
					<div class="light light2"></div>
					<div class="light light3"></div>
					<div class="light light4"></div>
					<div class="shadow shadow1"></div>
					<div class="shadow shadow2"></div>
					<ul class="stairs1">
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
					</ul>
					<ul class="stairs2">
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
					</ul>
					<ul class="stairs3">
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
					</ul>
					<ul class="stairs4">
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
					</ul>
				</div><span><?php echo substr($heading, 2) ?></span>
			</h1>
		</div>
		<div class="message">
			<h2><?php echo $message ?></h2>
		</div>
		<div class="action">
			<button><?php echo $heading ?></button>
		</div>
	</div>
</body>
</html>