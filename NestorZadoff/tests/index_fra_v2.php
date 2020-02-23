<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<meta name="robots" content="index, nofollow">
<title>Néstor Zadoff</title>

<link href="style_00.css" rel="stylesheet" type="text/css">
<link href="style_01.css" rel="stylesheet" type="text/css">
</head>

<body>
    <script type="text/javascript" src="acciones.js"></script>

	<?php

	$archivo = "contador.txt";
	$contador = 0;

	$fp = fopen($archivo,"r");
	$contador = intval(fgets($fp));
	fclose($fp);

	?> 

    <div id="div_hd">
        <div id="div_hd_title">
            <div id="div_hd_title_mail"><a href="mailto:info@nestorzadoff.com.ar" target="_blank"><img src="./img/hd_title_mail.jpg" alt="Mail" border="0"></a></div>
        </div>
        <!-- <div id="div_hd_logo">&nbsp;</div> -->
    </div>

    <table style="width: 97%; border: 0px; border-spacing: 0px;">
        <tr>
            <td style="width: 300px;">
                <div id="panel_izq">
                    <br />
                    <div id="boton_curric" class="div_selector_on" onclick="CambiarPagina('curric')">CURRICULUM</div>
                    <div id="boton_transc" class="div_selector_off" onclick="CambiarPagina('transc')">TRANSCRIPTIONS</div>
                    <div id="boton_articulos" class="div_selector_off" onclick="CambiarPagina('articulos')">ARTICLES MUSICOLOGIQUES</div>
					<div id="boton_arreglos" class="div_selector_off" onclick="CambiarPagina('arreglos')">ARRANGEMENTS CHORALES</div>
                    <div id="boton_contacto" class="div_selector_off" onclick="CambiarPagina('contacto')">CONTACT</div>
                    <br />
                    <br />
                    <img src="img/band_esp.png" alt="español" height="20" class="selector_lang" /><span class="texto_panel" style="cursor: pointer"><a href="index.php">Español</a></span><br />
                    <img src="img/band_ing.png" alt="english" height="20" class="selector_lang" /><span class="texto_panel" style="cursor: pointer"><a href="index_eng.php">English</a></span><br />
					<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
					<span class="texto_panel">&nbsp;&nbsp;<?php echo "VISITES: $contador"; ?></span>
					<br /><br /><br /><br /><br />
					<span class="texto_pie">&nbsp;&nbsp;Webmaster Flavio Hualpa</span>
                </div>
            </td>
            <td>
                <div id="pagina_curric" class="div_der">
                    <br />
                    <p class="titulo_panel"><u>NÉSTOR ZADOFF</u></p><br />

                    <!--
                    <div style="background-color: wheat; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); float: left; margin-right: 25px; border-radius: 8px;">
                        <img src="img/retrato.jpg" width="267" height="387" alt="Néstor Zadoff" style="border-radius: 8px;" />
                        <div style="text-align: center;">
                            <p style="font-family: arial; font-size: 12pt; color: maroon; margin: 4px;">1998</p>
                        </div>
                    </div>
                    -->
                    <div style="background-color: wheat; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); float: left; margin-right: 25px; margin-bottom: 10px; border-radius: 8px;">
                        <img src="img/retrato2018.jpg" width="267" height="387" alt="Néstor Zadoff" style="border-radius: 8px;" />
                        <!--
                        <div style="text-align: center;">
                            <p style="font-family: arial; font-size: 12pt; color: maroon; margin: 4px;">2018</p>
                        </div>
                        -->
                    </div>

                    <p class="texto_panel">Né en 1952 à Buenos Aires, Argentine.</p><br />
                    <p class="texto_panel">Il est Professeur Nat. de Musique, et Lic. en Arts Musicaux, spétialisation Direction Chorale.</p>
                    <p class="texto_panel">Il a étudié Harmonie et Contrepoint avec Erwin Leuchter et Direction Chorale avec Antonio Russo.</p>
                    <p class="texto_panel">Entre 1976-79 a suivi des études chez Jean-Michel Vaccaro à Tours, France, où il a eu son</p>
                    <p class="texto_panel">Doctorat en Lettres et Sciences Humaines (Musicologie) de l'Université Fr. Rabelais.</p><br />
                    <p class="texto_panel">Son activité comme chef de choeur est commencée en 1971.</p>
                    <p class="texto_panel">Pendant 30 ans il a dirigé le <strong>Coro Nacional de Jóvenes</strong> (24 Prix internationaux dont</p>
                    <p class="texto_panel">le GP du Florilége Vocal de Tours, 1er Prix à Porto Alegre 1995, Lindenholzhausen 1999, Spittal 2003),</p>
                    <p class="texto_panel">et depuis 1981 dirige le <strong>Grupo Coral Divertimento</strong> (GCD, <a src="http://www.gcdivertimento.com.ar">www.gcdivertimento.com.ar</a>)</p>
                    <p class="texto_panel">chez lequel s'est orienté vers le genre symphonique-choral de toutes époques.</p><br />
                    <p class="texto_panel">Il enseigne la Direction Chorale et Morfologie Chorale depuis plus de 30 ans.</p>
                    <p class="texto_panel">En ce moment il est titulaire du cours de Direction Chorale à l'Université Nationale des Arts</p>
                    <p class="texto_panel">(UNA-DAMUS) à Buenos Aires. Il enseigne aussi Morphologie Chorale et Arrangements Chorals.</p><br />
                    <p class="texto_panel">Il est souvent invité à diriger des chorales ainsi qu'il anime des ateliers</p>
                    <p class="texto_panel">et stages de formation des chefs de chœurs en Argentine, Amérique et en Europe.</p><br />
                    <p class="texto_panel">En France il a intervenu dans presque toutes les régions animant des stages chorales de musique latinoamericaine depuis 1997,</p>
                    <p class="texto_panel">aux Choralies 2010 il a été le résponsable du Chant Commun au Théatre Antique de Vaison la Romaine.</p><br />
                    <p class="texto_panel">Il a écrit plus de 100 arrangements chorales. Ses arrengements sont publiés en Argentine par les Ediciones GCC,</p>
                    <p class="texto_panel">en France par Editions A Coeur Joie et aux EEUU par Kjos.</p>
                    <p class="texto_panel">En 1998 Mr. Zadoff a eu le <strong>Prix Konex</strong> en Direction Chorale pour son activité dans la décenie 89-99, et une 2º fois entre 99-09.</p>
                    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                </div>

                <div id="pagina_transc" class="div_der" style="display: none">
                    <br />
                    <p class="titulo_panel"><u>TRANSCRIPTIONS GRATUITES D'OEUVRES CHORALS DU XVI SIÈCLE</u></p><br /><br />
                    <p class="texto_panel">Dans les dernières années j'ai retourné à mon activité de chercheur spétialisé en Musique Ancienne.</p>
                    <p class="texto_panel">Dans une époque où l'industrie éditoriale est en grave crise au monde entier,</p>
                    <p class="texto_panel">je me suis décidé à offrir de manière entiérement gratuite mon travail à travers de cette plataforme</p>
                    <p class="texto_panel">à tous ceux qui s'intéressent au répértoire du XVI. J'ai choisi transcrire des pièces peu o upas du</p>
                    <p class="texto_panel">tout connues et qui à ma connaissance n'ont pas encore été éditées.</p>
                    <p class="texto_panel">On pourra trouver ici des transcriptions à notation moderne, avec un criterium musicologique actualisé,</p>
                    <p class="texto_panel">des <em>chansons</em> françaises, <em>villanesche</em> italiennes et <em>madrigaux</em> espagnols</p>
                    <p class="texto_panel">composées au XVI et début XVII.</p>
                    <p class="texto_panel">C'est mon souhait que ce travail permette la vraie <em>renaissance</em> sonore de ces oeuvres</p>
                    <p class="texto_panel">par des groupes de musique ancienne et choeurs de toutes nationalités.</p><br /><br />
                    <p class="titulo_panel"><u>PRINCIPES DE TRANSCRIPTION</u></p><br /><br />
                    <p class="texto_panel">• Les valuers rythmiques ont été réduits à la moitié de leur valeur visuel.</p>
                    <p class="texto_panel" style="margin-top: 5px;">• Les indications métriques emplyées à partir de ca. 1530 ont été:</p>
                    <p class="texto_panel" style="margin-top: 5px;">&nbsp;&nbsp;a) <img src="img/tactus minima.png" alt="tactus" height="21" style="vertical-align: middle;" /> (tactus -unité de mensuration- à la minime avec subdivision binaire)</p>
                    <p class="texto_panel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dans des pièces assez rythmées (villanesche, villanelle, moresche, mascherate);</p>
                    <p class="texto_panel">&nbsp;&nbsp;b) <img src="img/tactus semibreve.png" alt="tactus" height="32" style="vertical-align: middle;" /> (tactus à la semibrève avec subdivision binaire) chez des oeuvres sérieuses</p>
                    <p class="texto_panel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(madrigaux italiens et espagnols, chansons françaises) de mouvement rythmique plus calme, et</p>
                    <p class="texto_panel">&nbsp;&nbsp;c) <img src="img/tactus ternario.png" alt="tactus" height="20" style="vertical-align: middle;" /> (tactus avec subdivision ternaire).</p>
                    <p class="texto_panel" style="margin-top: 5px;">• Dans les cas où l'on trouverait des passages de métriques différentes (binaire et ternaire)</p>
                    <p class="texto_panel">&nbsp;&nbsp;dans la même pièce, le tactus doit rester sans variation; donc, aux passages ternaires leurs</p>
                    <p class="texto_panel">&nbsp;&nbsp;subdivisions seront plus rapides que chez les binaires, avec une relation 3 contre 2.</p>
                    <p class="texto_panel">&nbsp;&nbsp;<em><u>Chaggio perduto</u></em> de Cornet nous en fourni un bon exemple. De même, les 3 indications métriques</p>
                    <p class="texto_panel">&nbsp;&nbsp;sont présentes au madrigal <em><u>Entre dos mansos arroyos</u></em> de Mateo Romero</p>
                    <p class="texto_panel">&nbsp;&nbsp;(Mathieu Romarin, 1575-1647), dont je propose de l'observer en détail.</p>
                    <p class="texto_panel" style="margin-top: 5px;">• Les sensibilisations éditoriales sont suggérées sur la note en question.</p>
                    <p class="texto_panel" style="margin-top: 5px;">• Les passages où la place du texte est confuse dans l'original seront indiqués</p>
                    <p class="texto_panel">&nbsp;&nbsp;entre [ ] signifiant qu'il s'agit de propositions éditoriales.</p>
                    <p class="texto_panel">&nbsp;&nbsp;Ceci est assez habituel dans les oeuvres de Josquin et Nola, en revanche</p>
                    <p class="texto_panel">&nbsp;&nbsp;dans les plus tardives (Cornet et Lassus) la place du texte est bien précise.</p>
                    <p class="texto_panel" style="margin-top: 5px;">• Dans cette période on n'utilisait pas de barres de mesure. Pour faciliter la lecture,</p>
                    <p class="texto_panel">&nbsp;&nbsp;dans mes transcriptions plus récentes (notamment oeuvres de Josquin, chansons françaises,</p>
					<p class="texto_panel">&nbsp;&nbsp;Nola et Cornet) je propose des barres individuelles dans chaque voix, lesquelles sont placées</p>
                    <p class="texto_panel">&nbsp;&nbsp;en accord avec leur propre phrasé, respectant l'accentuation naturelle des mots.</p>
					<p class="texto_panel">&nbsp;&nbsp;Cette prémisse étant essentielle dans la période.</p>
                    <p class="texto_panel" style="margin-top: 5px;">• Il est évident que les barres vont coincider entre toutes les voix aux passages verticales.</p>
                    <p class="texto_panel">&nbsp;&nbsp;Mais, dans les imitatifs (très présents dans les pièces d'auteurs franco-flamands)</p>
                    <p class="texto_panel">&nbsp;&nbsp;chaque voix aura son phrasée spécifique.</p>
					<p class="texto_panel" style="margin-top: 5px;">• Dans quelques oeuvres j'ai décidé de les transcrire à une <em>autre tonalité</em>, pour ainsi les adapter</p>
					<p class="texto_panel">&nbsp;&nbsp;aux tessitures des chorales mixtes actuelles. J'ai indiqué la tonalité original</p>
					<p class="texto_panel">&nbsp;&nbsp;(<em>La morre est jeu, Ventz hardis</em>)</p>
					<p class="texto_panel" style="margin-top: 5px;">• Aussi, dans certaines pièces j'ai proposé des indications d'interprétation, lesquelles bien entendu,</p>
					<p class="texto_panel">&nbsp;&nbsp;ne sont pas originales. On le trouvera bien indiqué.</p>
                    <br /><br />

                    <p class="titulo_panel">JOSQUIN DES PRES (ca. 1450/55-1521)&nbsp;&nbsp;<img id="carpeta_despres" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('despres')" /></p><br />
                    <ul id="obras_despres" style="display: none;">
                    <span class="esp_lista">&lt;&lt; Pour voir les articles concernant Josquin aller à ARTICLES MUSICOLOGIQUES</span>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\portada_josquin.png">Couverture originale de l'édition</a></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=27');">Parfons regretz</a> à 5 (SSATB) - <em>(7* livre des chansons, Susato, Anvers, 1545)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=41');">Ie me complains</a> à 5 (SATTB) - <em>(7* livre des chansons, Susato, Anvers, 1545)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=42');">Cueur langoreux</a> à 5 (SATTB) - <em>(7* livre des chansons, Susato, Anvers, 1545)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=56');">Regretz sans fin</a> à 6 (SATTTB) - <em>(7* livre des chansons, Susato, Anvers, 1545, version dans le ton d'origine)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=43');">Regretz sans fin</a> à 6 (SSAATB) - <em>(7* livre des chansons, Susato, Anvers, 1545, version transposée pour choeur mixte)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=47');">En non saichant</a> à 5 (SATTB) - <em>(7* livre des chansons, Susato, Anvers, 1545, attribution douteuse)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=48');">Je ne me puis tenir d'aimer</a> à 5 (SATTB) - <em>(36* Livre, XXX Chansons musicales, P. Attaingnant, Paris, 1549)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=64');">Cueurs desolez</a> à 5 (SATTB) - <em>(36* Livre, XXX Chansons musicales, P. Attaingnant, Paris, 1549)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=69');">Plus nulz regretz</a> à 4 (ATTB) - <em>(36* Livre, XXX Chansons musicales, P. Attaingnant, Paris, 1549)</em><span class="etiqueta_nuevo">NOUVEAUTÉ</span></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=52');">Cueurs desolez</a> à 4 (STTB) - <em>(attribué à Josquin et/ou Benedictus Appenzeller dans diverses sources d'époque, y compris Attaingnant, 1534, Paris, version dans le ton d'origine)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=53');">Cueurs desolez</a> à 4 (SATB) - <em>(attribué à Josquin et/ou Benedictus Appenzeller dans diverses sources d'époque, y compris Attaingnant, 1534, Paris, version transposée pour choeur mixte)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">SEVERIN CORNET (ca. 1530-1582)&nbsp;&nbsp;<img id="carpeta_cornet" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('cornet')" /></p><br />
                    <ul id="obras_cornet" style="display: none;">
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\Severin Cornet (français).pdf">Biographie</a></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\portada_cornet.png">Couverture originale de l'édition</a></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=49');">Che t'aggio fatto</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=31');">Signora Mia</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=32');">Sio fosse certo</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=19');">Hor va canzona</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=34');">Tu m'arrobasti</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=28');">Parmi di star</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=30');">Se per sentir</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=07');">Chaggio perduto</a></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=08');">Che giova saettar</a></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=51');">Sei tanto gratiosa</a></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=54');">O Lucia (partie 1)</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=55');">O Lucia (partie 2)</a></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">GIOVANNI DA NOLA (ca. 1510-1592)&nbsp;&nbsp;<img id="carpeta_danola" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('danola')" /></p><br />
                    <ul id="obras_danola" style="display: none;">
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\Giovanni Domenico (français).pdf">Biographie et commentaires</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\portada_nola.png">Couverture originale de l'édition</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=24');">Medici nui siam</a> - <em>Canzon villanesca (ed. 1541)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=26');">Oyme dolente</a> - <em>Canzon villanesca (ed. 1541)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=25');">O dolce vita mia</a> - <em>Canzon villanesca (ed. 1541)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=09');">Chi dirra</a> - <em>Canzon villanesca (ed. 1541)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">ORLANDE DE LASSUS (1532-1594)&nbsp;&nbsp;<img id="carpeta_lassus" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('lassus')" /></p><br />
                    <ul id="obras_lassus" style="display: none;">
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\Portada Lassus.pdf">Couverture de la Mellange de Orlande de Lassus</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=14');">Dessus le marche</a> - <em>(Continuation du Mellange d'Orlande de Lassus, Le Roy & Ballard, 1584, Paris)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=35');">Tu traditora</a> - <em>(Villanella, 1555)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=02');">Ave mater</a> - <em>(Motete, Magnum Opus Musicum, München, 1604)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=21');">La morre est jeu</a> - <em>(Chanson, Mellange d'Orlande de Lassus, Paris, 1570, Le Roy & Ballard)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=16');">En espoir vis</a> - <em>(Chanson, Mellange d'Orlande de Lassus, Paris, 1570, Le Roy & Ballard)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">CHANSONS FRANÇAISES D'AUTEURS DIVERS&nbsp;&nbsp;<img id="carpeta_francesas" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('francesas')" /></p><br />
                    <ul id="obras_francesas" style="display: none;">
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=36');">Ventz hardis</a> - <em>(Clement Janequin (ca. 1485-1558), 1552, Paris, N. Du Chemin)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=38');">Voulant honneur</a> - <em>(Pierre Sandrin -Pierre Regnault-, ed 18* livre des chansons, Attaingnant, Paris 1545)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=50');">Avant l'aymer</a> - <em>(Pierre Sandrin -Pierre Regnault-, ed 18* livre des chansons, Attaingnant, Paris 1545)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=46');">Es tu bien malade</a> - <em>(Anonyme, 27 chansons musicales, P. Attaingnant, Paris, 1534)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=44');">De trop aymer</a> - <em>(Anonyme, 27 chansons musicales, P. Attaingnant, Paris, 1534)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">MADRIGAUX ET VILLANELLES ITALIENNES D'AUTEURS DIFFÉRENTS&nbsp;&nbsp;<img id="carpeta_italianas" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('italianas')" /></p><br />
                    <ul id="obras_italianas" style="display: none;">
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=57');">Quando per mio destin</a> - <em>(Nicolo Vicentino, 5* livre de madrigaux, 1572)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=58');">Vecchie letrose</a> - <em>(Adrian Willaert, Canzone villanesche, ed. A. Gardane, Venise, 1545)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">MADRIGAUX ET VILLANELLES ESPAGNOLS D'AUTEURS DIFFÉRENTS&nbsp;&nbsp;<img id="carpeta_españolas" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('españolas')" /></p><br />
                    <ul id="obras_españolas" style="display: none;">
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=75');">Teresica hermana</a> - <em>(Attribué à Mateo Flecha, Cancionero de Uppsala, 1556)</em><span class="etiqueta_nuevo">NOUVEAUTÉ</span></li>
                    </ul>
                    <br /><br />

                    <!--
                    <p class="titulo_panel">ARTICLES MUSICOLOGIQUES&nbsp;&nbsp;<img id="carpeta_artmus" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('artmus')" /></p><br />
                    <ul id="obras_artmus" style="display: none;">
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; vertical-align: middle" /><a target="_blank" href="pdfs\Damus Nro 433.pdf">Entre dos mansos arroyos, madrigal espagnol du début du XVIIe siècle, magazine digital 433 du Damus-UNA, 2012</a></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; vertical-align: middle" /><a target="_blank" href="pdfs\Cantata 1994.pdf">Approche de Palestrina et Lassus, magazine Cantata, 1994</a></li>
                    </ul>
                    <br /><br />
                    -->
                </div>

                <div id="pagina_articulos" class="div_der" style="display: none">
                    <br />
                    <p class="titulo_panel"><u>ARTICLES MUSICOLOGIQUES</u></p><br /><br />
                    <ul id="obras_artmus">
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\Josquin des Pres (français).pdf">JOSQUIN DESPREZ - Commentaire musicologique</a> (1* Partie)</li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\Los estilos de Josquin (français).pdf">Les styles des chansons de JOSQUIN DESPREZ</a> (2* Partie)<span class="etiqueta_nuevo">NOUVEAUTÉ</span></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; vertical-align: middle" /><a target="_blank" href="pdfs\Damus Nro 433.pdf">Entre dos mansos arroyos, madrigal espagnol du début du XVIIe siècle, magazine digital 433 du Damus-UNA, 2012</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; vertical-align: middle" /><a target="_blank" href="pdfs\Cantata 1994.pdf">Approche de Palestrina et Lassus, magazine Cantata, 1994</a></li>
                        <li>&nbsp;</li>
                        <li class="texto_panel">Prochainement:</li>
                        <li class="texto_panel">• Placement du texte dans les œuvres du XVI: problèmes et solutions</li>
                        <li class="texto_panel">• Les sensibilisations pas écrites dans les originaux du XVI: où, quand et pourquoi devraient-elles être appliquées?</li>
                    </ul>
                    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                </div>

				<div id="pagina_arreglos" class="div_der" style="display: none">
                    <br />
                    <p class="titulo_panel"><u>ARRANGEMENTS CHORALES SUR MUSIQUES POPULAIRES</u></p><br /><br />
                    <p class="texto_panel">J'ai décidé d' enrichir cette plataforme avec quelques uns de mes arrangements chorals <strong>pas encore édités.</strong></p>
                    <p class="texto_panel">J'avais commencé à les écrire dés 1972, et presque toujours avec le but de les faire chanter</p>
                    <p class="texto_panel">par les groupes chorals que j'ai dirigés tout au long de mes 45 ans dans l'activité.</p><br />
                    <p class="texto_panel">Un certain nombre d'autres arrangements sont imprimés en Argentine (Ediciones GCC),</p>
                    <p class="texto_panel">France (Edit. A Coeur Joie) et aux Etats Unis (Kjos). Pour les obtenir on doit</p>
                    <p class="texto_panel">s'adresser auprés de ces maisons d'édition.</p><br />
                    <p class="texto_panel">Prochainement je vais présenter la liste complète de mes arrangements</p>
                    <p class="texto_panel">(plus d'une centaine!) ainsi que leur effectif choral.</p><br />
                    <p class="texto_panel">Vous trouverez ici des pièces de A. Piazzolla, M. E. Walsh, Beatles, negro spirituals ainsi</p>
                    <p class="texto_panel">que des chansons d'auteurs latinoaméricains; vous pouvez les télécharger gratuitement.</p><br />
                    <p class="texto_panel">Onze de mes travaux ont été primés dans des concours en Argentine,</p>
                    <p class="texto_panel">dont quelques uns sont ici disponibles et indiqués avec <img src="img/award-icon.png" class="icono-premio"></p><br />
                    <p class="texto_lista_panel">• Canción del Jardinero (SA) I Prix dans la catégorie des voix égales (Nacional 1985)</p>
                    <p class="texto_lista_panel">• Jacinto Chiclana (SATB) III Prix Tango-Milonga (Nacional 1985)</p>
                    <p class="texto_lista_panel">• Adiós nonino (SATB) IV Prix Tango-Milonga (Nacional 1985)</p>
                    <p class="texto_lista_panel">• Serenata para la tierra de uno (SATB) III Prix de la Chanson (Nacional 1985) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• El árbol ya fue plantado (SATB) IV Prix de la Chanson (Nacional 1985)</p>
                    <p class="texto_lista_panel">• Cuatro estrofas (SATB) I Prix (Municipal 1986) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• Zamba del nuevo día (SATB) I Prix (Esiteddfod 1992) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• Tonada de La Quiaca (SAB) I Mention (Fondo de las Artes 2007)</p>
                    <p class="texto_lista_panel">• Guanuqueando (SAB) II Mention (Fondo de las Artes 2007) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• Exaudiat (œuvre originale) (SATB) Mention (Ars Nova de Rosario 2012) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• Canción de la vacuna (SATB) III Prix (AAMCANT 2015) <img src="img/award-icon.png" class="icono-premio"></p><br />

                    <ul>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=62');">And so it goes</a> - <em>TTBB (Billy Joel, 1999)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=01');">Años de soledad</a> - <em>SATB (Astor Piazzolla, 2012)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=72');">Atacama tierra mía</a> - <em>SATB (Stage d'arrangements choraux, Copiapó, Chili 2015)</em><span class="etiqueta_nuevo">NOUVEAUTÉ</span></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=05');">Buenos Aires hora cero</a> - <em>TTBB (Astor Piazzolla, 2014)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=15');">Canción de la vacuna (el brujito de Gulubú)</a> - <em>SATB (M. E. Walsh, 1982)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=06');">Canción del estornudo (el otro Mambrú)</a> - <em>SATB (M. E. Walsh, 1983)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=61');">Can't you live humble</a> - <em>SSATB (Spiritual, 1995)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=73');">Como la cigarra</a> - <em>SATB (M. E. Walsh, 1982)</em><span class="etiqueta_nuevo">NOUVEAUTÉ</span></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=10');">Coral</a> - <em>SATB (Astor Piazzolla, 2000)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=11');">Cuando partí</a> - <em>SSAA (M. Alemán Mónico, 2001)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=12');">Cuatro estrofas</a> - <em>SATB (A. Lerner, 1986)</em> <img src="img/award-icon.png" class="icono-premio"></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=63');">Déjame que me vaya</a> - <em>SATB (Carabajal-Ternán, 2014)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=45');">Despertar de mi tierra</a> - <em>SATB (G. Morales - S.O'Brian, 2015)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=17');">Exaudiat te Dominus</a> - <em>SATB (N. Zadoff, œuvre originale, 2009)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=18');">Guanuqueando</a> - <em>SAB (R. Vilca, 2007)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=74');">I wanna be your man</a> - <em>SATB et orchestre (Lennon-McCartney, 2007)</em><span class="etiqueta_nuevo">NOUVEAUTÉ</span></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=03');">I will</a> - <em>SATB (P. Mc Cartney, 2005)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=65');">I will</a> - <em>SATB et orchestre (P. Mc Cartney, 2006)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=20');">Juana y José</a> - <em>SATB (Cruz F. Iriarte, Venezuela, 1986)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=71');">La canción del Jacarandá</a> - <em>SA / chœur d'enfants (M. E. Walsh, 2018)</em><span class="etiqueta_nuevo">NOUVEAUTÉ</span></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=70');">La vaca estudiosa</a> - <em>SA / chœur d'enfants (M. E. Walsh, 2009)</em><span class="etiqueta_nuevo">NOUVEAUTÉ</span></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=22');">Lady Madonna</a> - <em>SATB et orchestre (Lennon-Mc Cartney, 2006)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=23');">Love of my life</a> - <em>SATB et orchestre (F. Mercury, 2006)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=68');">Manuelita la tortuga</a> - <em>SA / chœur d'enfants (M. E. Walsh, 2017)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=60');">Romance de la Luna sanjuanina</a> - <em>SATB (Gustavo Troncozo, 2013)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=59');">San Juan por mi sangre</a> - <em>SATB (Ernesto Villavicencio, 2012)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=29');">Sangena</a> - <em>SATB (Canto nupcial africano, 2012)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=67');">Serenata para la tierra de uno</a> - <em>SATB (M. E. Walsh, 1984)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=33');">Sobredosis de chamamé</a> - <em>SATB (A. Balestra, 2007)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=37');">Verano porteño</a> - <em>SATB (Astor Piazzolla, 1974)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=04');">Yesterday</a> - <em>SATB (P. Mc Cartney, 2005)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=66');">Yesterday</a> - <em>SATB et orchestre (P. Mc Cartney, 2006)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=39');">Zamba del nuevo día</a> - <em>SATB (O. Cardozo Ocampo, 1992)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=40');">Zamba para Pepe</a> - <em>SATB (M. E. Walsh, 1996)</em></li>
                    </ul>
                    <br /><br />
                </div>

                <div id="pagina_contacto" class="div_der" style="display: none">
                    <div>
                        <br />
                        <p class="titulo_panel">ENVOYEZ-MOI VOTRE CONSULTATION</p><br /><br />
                        <form action="send_fra.php" method="post">
                            <p id="par_01">NOM</p><input type="text" name="nombre" size="78" style="background:#c1c27c; color:#404033; font-family:Arial, Helvetica, sans-serif; font-size:12px; height:25px; width:450px;">
                            <br>
                            <p id="par_01">EMAIL</p><input type="text" name="email" size="78" style="background:#c1c27c; color:#404033; font-family:Arial, Helvetica, sans-serif; font-size:12px; height:25px;width:450px;">
                            <br>
                            <p id="par_01">CONSULTATION</p><textarea name="coment" cols="75" rows="4" style="background:#c1c27c; color:#404033; font-family:Arial, Helvetica, sans-serif; font-size:12px;height:125px;width:450px;"></textarea>
                            <br><br>
                            <input type="submit" value="Envoyer">
                        </form>
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>