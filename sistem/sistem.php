<?php

	require_once "fonksiyon.php";

	## Tema İçerik Fonksiyonu ##
	function tema_icerik(){

		$do = g("do");
		Switch ($do){

			case 'pages':
				require_once TEMA."/pages.php";
			break;
			case 'news':
				require_once TEMA."/news.php";
			break;
			case 'news_single':
				require_once TEMA."/news_single.php";
			break;
			case 'products_search':
				require_once TEMA."/products_search.php";
			break;
			case 'products':
				require_once TEMA."/products.php";
			break;
			case 'products_single':
				require_once TEMA."/products_single.php";
			break;
			case 'register':
				require_once TEMA."/register.php";
			break;
			case 'login':
				require_once TEMA."/login.php";
			break;
			case 'logout':
				require_once TEMA."/logout.php";
			break;
			case 'profile':
				require_once TEMA."/profile.php";
			break;
			case 'search':
				require_once TEMA."/search.php";
			break;
			case 'add':
				require_once TEMA."/add.php";
			break;
			case 'post':
				require_once TEMA."/post.php";
			break;
			case 'search_post':
				require_once TEMA."/search_post.php";
			break;
			case 'about':
				require_once TEMA."/about.php";
			break;
			case 'timeline':
				require_once TEMA."/timeline_m.php";
			break;
			case 'contact':
				require_once TEMA."/contact.php";
			break;
			case 'subscribe':
				require_once TEMA."/subscribe_ok.php";
			break;

			default:
			if (!g("do")){
				require_once TEMA."/main.php";
			}else {
				$hata = "Böyle bir sayfa bulunmuyor!";
				require_once TEMA."/hata.php";
			}
			break;

		}

	}
