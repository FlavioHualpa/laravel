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
                    <div id="boton_articulos" class="div_selector_off" onclick="CambiarPagina('articulos')">MUSICOLOGICAL ARTICLES</div>
					<div id="boton_arreglos" class="div_selector_off" onclick="CambiarPagina('arreglos')">CHORAL ARRANGEMENTS</div>
                    <div id="boton_contacto" class="div_selector_off" onclick="CambiarPagina('contacto')">CONTACT</div>
                    <br />
                    <br />
                    <img src="img/band_esp.png" alt="español" height="20" class="selector_lang" /><span class="texto_panel" style="cursor: pointer"><a href="index.php">Español</a></span><br />
                    <img src="img/band_fra.png" alt="français" height="20" class="selector_lang" /><span class="texto_panel" style="cursor: pointer"><a href="index_fra.php">Français</a></span><br />
					<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
					<span class="texto_panel">&nbsp;&nbsp;<?php echo "VISITS: $contador"; ?></span>
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

                    <p class="texto_panel">Néstor Zadoff was born in Buenos Aires, Argentina, in 1952.</p><br />
                    <p class="texto_panel">He graduated from the National Conservatory of Music with a degree in Music Education,</p>
					<p class="texto_panel">and from the National University of the Arts (Department of Musical Arts) with the degree</p>
                    <p class="texto_panel">of Licentiate of Musical Arts (UNA-DAMUS).</p>
					<p class="texto_panel">He studied Harmony privately with Erwin Leuchter and Choral Conducting with Antonio Russo</p>
					<p class="texto_panel">at the Juan José Castro Conservatory (La Lucila). From 1976 to 1979, and through a</p>
                    <p class="texto_panel">scholarship granted by the French government, he studied at the <em>Université François</em></p>
                    <p class="texto_panel"><em>Rabelais de Tours, France,</em> under the guidance of Jean-Michel Vaccaro.</p>
					<p class="texto_panel">He earned the degree of Doctor of Letters and Human Sciences, with a specialty in Musicology.</p><br />
                    <p class="texto_panel">Dr. Zadoff returned to Argentina in 1979 and since then he has been conducting</p>
					<p class="texto_panel">choirs and chamber ensembles, teaching, and arranging.</p><br />
					<p class="texto_panel">He has served as conductor of the <em>Grupo Coral Divertimento</em>, specializing in choral</p>
					<p class="texto_panel">symphonic repertoire, since 1981 (<a src="http://www.gcdivertimento.com.ar">www.gcdivertimento.com.ar</a>), presenting oratorios</p>
					<p class="texto_panel">from the Baroque period up until our time.</p><br />
                    <p class="texto_panel">Maestro Zadoff is the founder of the prestigious <em>Coro Nacional de Jóvenes</em></p>
					<p class="texto_panel">(National Young People Choir), depending from the Ministry of Culture, and he served</p>
					<p class="texto_panel">as its artistic director from 1985 to 2015. Under his guidance this group has won 24 prizes</p>
					<p class="texto_panel">in international competitions, including the <em>Grand Prix</em> at the <strong><em>Florilège Vocal de Tours</em></strong></p>
					<p class="texto_panel">in 1998, first prize in Porto Alegre (Brazil) in 1995,first prize in Lindenholzhausen (Germany) in 1999, and first prize in Spittal</p>
					<p class="texto_panel">(Austria) in 2003.</p><br />
                    <p class="texto_panel">He served as Professor of Choral Conducting at the Conservatorio Juan José Castro from</p>
					<p class="texto_panel">1980 to 2009, and at the National University of Rosario, from 2000 until 2010. Currently,</p>
					<p class="texto_panel">and from 2003, he serves as Professor of Choral Conducting, Choral Literature, and</p>
                    <p class="texto_panel">Choral Arranging at the National University of the Arts (UNA-Damus)</p><br />
                    <p class="texto_panel">He is a frequent choral clinician all throughout Argentina, Chile, Brazil, and Europe. He also</p>
                    <p class="texto_panel">has an intense activity as guest conductor of choirs and orchestras both in Argentina and abroad.</p><br />
                    <p class="texto_panel">Maestro Zadoff has authored more than 100 choral arrangements, 11 of which have received</p>
					<p class="texto_panel">important awards in different competitions in Argentina.</p><br />
                    <p class="texto_panel">He was named honorary member of the Argentine Council of Music in 1998, and in 1999</p>
                    <p class="texto_panel">he was presented with the <em>Diploma Konex</em>, recognizing him as <em>Revelación en Dirección Coral</em></p>
                    <p class="texto_panel">(Revelation in Choral Conducting) for the 1989-1998 decade.</p><br />
					<p class="texto_panel">In 2009 he received the <em>Diploma Konex</em> in the category Choral Conductor of the 1999-2008 decade.</p><br /><br />
					<br /><br /><br /><br /><br /><br /><br />
                </div>

                <div id="pagina_transc" class="div_der" style="display: none">
                    <br />
                    <p class="titulo_panel"><u>FREE TRANSCRIPTIONS OF CHORAL WORKS FROM THE XVI CENTURY</u></p><br /><br />
					<p class="texto_panel">Over the last several years, I have returned to my work as a researcher specializing in Early Music.</p>
					<p class="texto_panel">In times when the music publishing industry is going through a deep crisis of global dimensions,</p>
					<p class="texto_panel">I decided to offer my work free of charge through this platform to whoever would be interested</p>
					<p class="texto_panel">in rare vocal repertoire of the Renaissance period, which, I expect, is not currently available in print.</p>
					<p class="texto_panel">You will find transcriptions to modern notation and with updated musicological criteria of</p>
					<p class="texto_panel">French <em>chansons</em>, Italian <em>villanesche</em>, and Spanish <em>madrigals</em> written during the 16th century</p>
					<p class="texto_panel">and beginning of the 17th century. I hope these humble contributions will allow a <em>renaissance</em></p>
					<p class="texto_panel">of these works through chamber groups and choirs of any nationality.</p>
					<br /><br />
                    <p class="titulo_panel"><u>(Musicological) PRINCIPLES USED IN TRANSCRIPTIONS</u></p><br /><br />
                    <p class="texto_panel">• Rhythmic values were halved.</p>
                    <p class="texto_panel" style="margin-top: 5px;">• Metric indications used ca. 1530 were:</p>
                    <p class="texto_panel" style="margin-top: 5px;">&nbsp;&nbsp;a) <img src="img/tactus minima.png" alt="tactus" height="21" style="vertical-align: middle;" /> (tactus -metric unit- at the minima with binary subdivision)</p>
                    <p class="texto_panel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for works of quick rithms (villanesche, villanelle, moresche, mascherate);</p>
                    <p class="texto_panel">&nbsp;&nbsp;b) <img src="img/tactus semibreve.png" alt="tactus" height="32" style="vertical-align: middle;" /> (tactus at the semibreve with binary subdivision) in solemn works</p>
                    <p class="texto_panel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(italian and spanish madrigals, french chansons) whose rithm is calmer, and</p>
                    <p class="texto_panel">&nbsp;&nbsp;c) <img src="img/tactus ternario.png" alt="tactus" height="20" style="vertical-align: middle;" /> (tactus with ternary subdivision).</p>
                    <p class="texto_panel" style="margin-top: 5px;">• If it'd happen that within a same work we find binary and ternary metric indications,</p>
                    <p class="texto_panel">&nbsp;&nbsp;their metric relationship must keep the tactus unchanged. This would mean</p>
                    <p class="texto_panel">&nbsp;&nbsp;that in ternary passages the subdivision shall be faster than in the binary ones (3 against 2).</p>
                    <p class="texto_panel">&nbsp;&nbsp;We can find a good exemple in <em><u>Chaggio perduto</u></em> by de Severin Cornet.</p>
                    <p class="texto_panel">&nbsp;&nbsp;Likewise the 3 metric markings are also present in the late spanish madrigal</p>
                    <p class="texto_panel">&nbsp;&nbsp;<em><u>Entre dos mansos arroyos</u></em>, by Mateo Romero (Mathieu Romarin, 1575-1647),</p>
					<p class="texto_panel">&nbsp;&nbsp;which I suggest to observe closely.</p>
					<p class="texto_panel" style="margin-top: 5px;">• Editorial accidentals are suggested only for the specific pitches in question.</p>
					<p class="texto_panel" style="margin-top: 5px;">• Passages in which the text is confusing in the original score will be expressed</p>
					<p class="texto_panel">&nbsp;&nbsp;between [ ] indicating that they are editorial suggestions.</p>
                    <p class="texto_panel">&nbsp;&nbsp;This happens specially in earlier works as from Josquin and Nola.</p>
                    <p class="texto_panel">&nbsp;&nbsp;In later works (Cornet, Lassus) the composers and editors were very precise.</p>
                    <p class="texto_panel" style="margin-top: 5px;">• Bar-lines were not used in that historical period. To facilitate reading,</p>
					<p class="texto_panel">&nbsp;&nbsp;in my recent transcriptions my proposal includes individual bar-lines in each voice part</p>
					<p class="texto_panel">&nbsp;&nbsp;which are placed according to each line's phrasing, (specially in works by Josquin,</p>
					<p class="texto_panel">&nbsp;&nbsp;Nola and Cornet) and always considering the natural accentuation of the words.</p>
					<p class="texto_panel">&nbsp;&nbsp;This was an essential premise in the period.</p>
					<p class="texto_panel" style="margin-top: 5px;">• In homophonic passages, bar-lines will most likely coincide in all parts,</p>
					<p class="texto_panel">&nbsp;&nbsp;but in imitative sections (very common in works of Franco-Flemish composers)</p>
					<p class="texto_panel">&nbsp;&nbsp;each voice part will have its specific phrasing.</p>
                    <p class="texto_panel" style="margin-top: 5px;">• You'll find here several works that I decided to transpose, just to adapt them</p>
                    <p class="texto_panel">&nbsp;&nbsp;to the mixed choirs tessitura. In those cases I've indicated the original tone</p>
                    <p class="texto_panel">&nbsp;&nbsp;(<em>La morre est jeu, Ventz hardis</em>)</p>
                    <p class="texto_panel" style="margin-top: 5px;">• Likewise, in some works I made a complete interpretation proposal,</p>
                    <p class="texto_panel">&nbsp;&nbsp;which is not original. This is clearly specified in each case.</p>
					<br /><br />

                    <p class="titulo_panel">JOSQUIN DES PRES (ca. 1450/55-1521)&nbsp;&nbsp;<img id="carpeta_despres" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('despres')" /></p><br />
                    <ul id="obras_despres" style="display: none;">
                        <span class="esp_lista">&lt;&lt; Read about Josquin in the MUSICOLOGICAL ARTICLES section</span>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\portada_josquin.png">Edition original cover</a></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=27');">Parfons regretz</a> in 5 (SSATB) - <em>(7* livre des chansons, Susato, Anvers, 1545)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=41');">Ie me complains</a> in 5 (SATTB) - <em>(7* livre des chansons, Susato, Anvers, 1545)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=42');">Cueur langoreux</a> in 5 (SATTB) - <em>(7* livre des chansons, Susato, Anvers, 1545)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=56');">Regretz sans fin</a> in 6 (SATTTB) - <em>(7* livre des chansons, Susato, Anvers, 1545, original tone version)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=43');">Regretz sans fin</a> in 6 (SSAATB) - <em>(7* livre des chansons, Susato, Anvers, 1545, transposed version for mixed choir)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=47');">En non saichant</a> in 5 (SATTB) - <em>(7* livre des chansons, Susato, Anvers, 1545, dubious attribution)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=48');">Je ne me puis tenir d'aimer</a> in 5 (SATTB) - <em>(36* Livre, XXX Chansons musicales, P. Attaingnant, Paris, 1549)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=64');">Cueurs desolez</a> in 5 (SATTB) - <em>(36* Livre, XXX Chansons musicales, P. Attaingnant, Paris, 1549)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=69');">Plus nulz regretz</a> in 4 (ATTB) - <em>(36* Livre, XXX Chansons musicales, P. Attaingnant, Paris, 1549)</em><span class="etiqueta_nuevo">NEW</span></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=52');">Cueurs desolez</a> in 4 (STTB) - <em>(attributed to Josquin and/or Benedictus Appenzeller in various period sources, including Attaingnant, 1534, Paris, original tone version)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=53');">Cueurs desolez</a> in 4 (SATB) - <em>(attributed to Josquin and/or Benedictus Appenzeller in various period sources, including Attaingnant, 1534, Paris, transposed version for mixed choir)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">SEVERIN CORNET (ca. 1530-1582)&nbsp;&nbsp;<img id="carpeta_cornet" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('cornet')" /></p><br />
                    <ul id="obras_cornet" style="display: none;">
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\Severin Cornet (english).pdf">Biography</a></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\portada_cornet.png">Edition original cover</a></li>
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
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=54');">O Lucia (part 1)</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=55');">O Lucia (part 2)</a></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">GIOVANNI DA NOLA (ca. 1510-1592)&nbsp;&nbsp;<img id="carpeta_danola" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('danola')" /></p><br />
                    <ul id="obras_danola" style="display: none;">
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\Giovanni Domenico (english).pdf">Biography and commentaries</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\portada_nola.png">Edition original cover</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=24');">Medici nui siam</a> - <em>Canzon villanesca (ed. 1541)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=26');">Oyme dolente</a> - <em>Canzon villanesca (ed. 1541)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=25');">O dolce vita mia</a> - <em>Canzon villanesca (ed. 1541)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=09');">Chi dirra</a> - <em>Canzon villanesca (ed. 1541)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">ORLANDE DE LASSUS (1532-1594)&nbsp;&nbsp;<img id="carpeta_lassus" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('lassus')" /></p><br />
                    <ul id="obras_lassus" style="display: none;">
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\Portada Lassus.pdf">Original cover of the Mellange d'Orlande de Lassus</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=14');">Dessus le marche</a> - <em>(Continuation du Mellange d'Orlande de Lassus, Le Roy & Ballard, 1584, Paris)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=35');">Tu traditora</a> - <em>(Villanella, 1555)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=02');">Ave mater</a> - <em>(Motete, Magnum Opus Musicum, München, 1604)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=21');">La morre est jeu</a> - <em>(Chanson, Mellange d'Orlande de Lassus, Paris, 1570, Le Roy & Ballard)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=16');">En espoir vis</a> - <em>(Chanson, Mellange d'Orlande de Lassus, Paris, 1570, Le Roy & Ballard)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">FRENCH CHANSONS OF VARIOUS AUTHORS&nbsp;&nbsp;<img id="carpeta_francesas" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('francesas')" /></p><br />
                    <ul id="obras_francesas" style="display: none;">
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=36');">Ventz hardis</a> - <em>(Clement Janequin (ca. 1485-1558), 1552, Paris, N. Du Chemin)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=38');">Voulant honneur</a> - <em>(Pierre Sandrin -Pierre Regnault-, ed 18* livre des chansons, Attaingnant, Paris 1545)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=50');">Avant l'aymer</a> - <em>(Pierre Sandrin -Pierre Regnault-, ed 18* livre des chansons, Attaingnant, Paris 1545)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=46');">Es tu bien malade</a> - <em>(Anonymous, 27 chansons musicales, P. Attaingnant, Paris, 1534)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=44');">De trop aymer</a> - <em>(Anonymous, 27 chansons musicales, P. Attaingnant, Paris, 1534)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">ITALIAN MADRIGALS AND VILLANELLE OF VARIOUS AUTHORS&nbsp;&nbsp;<img id="carpeta_italianas" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('italianas')" /></p><br />
                    <ul id="obras_italianas" style="display: none;">
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=57');">Quando per mio destin</a> - <em>(Nicolo Vicentino, 5th book of madrigals, 1572)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=58');">Vecchie letrose</a> - <em>(Adrian Willaert, Canzone villanesche, ed. A. Gardane, Venice, 1545)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">SPANISH MADRIGALS AND VILLANELLE OF VARIOUS AUTHORS&nbsp;&nbsp;<img id="carpeta_españolas" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('españolas')" /></p><br />
                    <ul id="obras_españolas" style="display: none;">
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=75');">Teresica hermana</a> - <em>(Attributed to Mateo Flecha, Cancionero de Uppsala, 1556)</em><span class="etiqueta_nuevo">NEW</span></li>
                    </ul>
                    <br /><br />

                    <!--
                    <p class="titulo_panel">MUSICOLOGICAL ARTICLES&nbsp;&nbsp;<img id="carpeta_artmus" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('artmus')" /></p><br />
                    <ul id="obras_artmus" style="display: none;">
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; vertical-align: middle" /><a target="_blank" href="pdfs\Damus Nro 433.pdf">Entre dos mansos arroyos, spanish madrigal from the beginnings of XVII century, Damus-UNA digital magazine No 433, 2012</a></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; vertical-align: middle" /><a target="_blank" href="pdfs\Cantata 1994.pdf">Approaching Palestrina and Lassus, Cantata magazine, 1994</a></li>
                    </ul>
                    <br /><br />
                    -->
                </div>

                <div id="pagina_articulos" class="div_der" style="display: none">
                    <br />
                    <p class="titulo_panel"><u>MUSICOLOGICAL ARTICLES</u></p><br /><br />
                    <ul id="obras_artmus">
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\Josquin des Pres (english).pdf">Josquin Desprez - Musicological info</a> (Part I)</li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a target="_blank" href="pdfs\Los estilos de Josquin (english).pdf">The different styles in Josquin Desprez chansons</a> (Part II)<span class="etiqueta_nuevo">NEW</span></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; vertical-align: middle" /><a target="_blank" href="pdfs\Damus Nro 433.pdf">Entre dos mansos arroyos, spanish madrigal from the beginnings of XVII century, Damus-UNA digital magazine No 433, 2012</a></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; vertical-align: middle" /><a target="_blank" href="pdfs\Cantata 1994.pdf">Approaching Palestrina and Lassus, Cantata magazine, 1994</a></li>
                        <li>&nbsp;</li>
                        <li class="texto_panel">Coming soon:</li>
                        <li class="texto_panel">• Placement of the text in 16th century works: problems and solutions</li>
                        <li class="texto_panel">• Unwritten sensibilisations in 16th century originals: which ones and under what circumstances to apply them?</li>
                    </ul>
                    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                </div>

				<div id="pagina_arreglos" class="div_der" style="display: none">
                    <br />
                    <p class="titulo_panel"><u>CHORAL ARRANGEMENTS OF POPULAR MUSIC</u></p><br /><br />
                    <p class="texto_panel">I decided to enrich this platform with some of my choral arrangements that have <strong>never been published.</strong></p>
                    <p class="texto_panel">I began writing them as early as 1972 in my youth, and almost always with the goal of singing them</p>
                    <p class="texto_panel">with the choirs that I conducted for over 45 years in this activity.</p><br />
                    <p class="texto_panel">A number of my works are published in Argentina (Ediciones GCC), France (Edit. A Coeur Joie)</p>
                    <p class="texto_panel">and US (Kjos). You'd have to contact those publishers in order to get them.</p><br />
                    <p class="texto_panel">I will shortly present here the complete list of my work, indicating their choral output.</p><br />
                    <p class="texto_panel">You'll find here compositions by A. Piazzolla, M. E. Walsh, Beatles, negro spirituals and excellent</p>
                    <p class="texto_panel">latin-american composers; and you'll be able to download them free of any charge.</p><br />
                    <p class="texto_panel">Eleven of my works have been rewarded in different argentinian contests; they are indicated by an <img src="img/award-icon.png" class="icono-premio"></p><br />
                    <p class="texto_lista_panel">• Canción del Jardinero (SA) I Prize in the category similar voices (Nacional 1985)</p>
                    <p class="texto_lista_panel">• Jacinto Chiclana (SATB) III Prize Tango-Milonga (Nacional 1985)</p>
                    <p class="texto_lista_panel">• Adiós nonino (SATB) IV Prize Tango-Milonga (Nacional 1985)</p>
                    <p class="texto_lista_panel">• Serenata para la tierra de uno (SATB) III Prize Song (Nacional 1985) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• El árbol ya fue plantado (SATB) IV Prize Song (Nacional 1985)</p>
                    <p class="texto_lista_panel">• Cuatro estrofas (SATB) I Prize (Municipal 1986) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• Zamba del nuevo día (SATB) I Prize (Esiteddfod 1992) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• Tonada de La Quiaca (SAB) I Mention (Fondo de las Artes 2007)</p>
                    <p class="texto_lista_panel">• Guanuqueando (SAB) II Mention (Fondo de las Artes 2007) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• Exaudiat (original work) (SATB) Mention (Ars Nova de Rosario 2012) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• Canción de la vacuna (SATB) III Prize (AAMCANT 2015) <img src="img/award-icon.png" class="icono-premio"></p><br />

                    <ul>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=62');">And so it goes</a> - <em>TTBB (Billy Joel, 1999)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=01');">Años de soledad</a> - <em>SATB (Astor Piazzolla, 2012)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=72');">Atacama tierra mía</a> - <em>SATB (Choral arrangements workshop, Copiapó, Chile 2015)</em><span class="etiqueta_nuevo">NEW</span></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=05');">Buenos Aires hora cero</a> - <em>TTBB (Astor Piazzolla, 2014)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=15');">Canción de la vacuna (el brujito de Gulubú)</a> - <em>SATB (M. E. Walsh, 1982)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=06');">Canción del estornudo (el otro Mambrú)</a> - <em>SATB (M. E. Walsh, 1983)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=61');">Can't you live humble</a> - <em>SSATB (Spiritual, 1995)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=73');">Como la cigarra</a> - <em>SATB (M. E. Walsh, 1982)</em><span class="etiqueta_nuevo">NEW</span></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=10');">Coral</a> - <em>SATB (Astor Piazzolla, 2000)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=11');">Cuando partí</a> - <em>SSAA (M. Alemán Mónico, 2001)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=12');">Cuatro estrofas</a> - <em>SATB (A. Lerner, 1986)</em> <img src="img/award-icon.png" class="icono-premio"></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=63');">Déjame que me vaya</a> - <em>SATB (Carabajal-Ternán, 2014)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=45');">Despertar de mi tierra</a> - <em>SATB (G. Morales - S.O'Brian, 2015)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=17');">Exaudiat te Dominus</a> - <em>SATB (N. Zadoff, original work, 2009)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=18');">Guanuqueando</a> - <em>SAB (R. Vilca, 2007)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=74');">I wanna be your man</a> - <em>SATB and orchestra (Lennon-McCartney, 2007)</em><span class="etiqueta_nuevo">NEW</span></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=03');">I will</a> - <em>SATB (P. Mc Cartney, 2005)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=65');">I will</a> - <em>SATB and orchestra (P. Mc Cartney, 2006)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=20');">Juana y José</a> - <em>SATB (Cruz F. Iriarte, Venezuela, 1986)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=71');">La canción del Jacarandá</a> - <em>SA / children's choir (M. E. Walsh, 2018)</em><span class="etiqueta_nuevo">NEW</span></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=70');">La vaca estudiosa</a> - <em>SA / children's choir (M. E. Walsh, 2009)</em><span class="etiqueta_nuevo">NEW</span></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=22');">Lady Madonna</a> - <em>SATB and orchestra (Lennon-Mc Cartney, 2006)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=23');">Love of my life</a> - <em>SATB and orchestra (F. Mercury, 2006)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=68');">Manuelita la tortuga</a> - <em>SA / children's choir (M. E. Walsh, 2017)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=60');">Romance de la Luna sanjuanina</a> - <em>SATB (Gustavo Troncozo, 2013)</em></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=59');">San Juan por mi sangre</a> - <em>SATB (Ernesto Villavicencio, 2012)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=29');">Sangena</a> - <em>SATB (Canto nupcial africano, 2012)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=67');">Serenata para la tierra de uno</a> - <em>SATB (M. E. Walsh, 1984)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=33');">Sobredosis de chamamé</a> - <em>SATB (A. Balestra, 2007)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=37');">Verano porteño</a> - <em>SATB (Astor Piazzolla, 1974)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=04');">Yesterday</a> - <em>SATB (P. Mc Cartney, 2005)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=66');">Yesterday</a> - <em>SATB and orchestra (P. Mc Cartney, 2006)</em></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=39');">Zamba del nuevo día</a> - <em>SATB (O. Cardozo Ocampo, 1992)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" width="24" height="24" style="margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle" /><a href="#" onclick="AbrirDescarga('id=40');">Zamba para Pepe</a> - <em>SATB (M. E. Walsh, 1996)</em></li>
                    </ul>
                    <br /><br />
                </div>

                <div id="pagina_contacto" class="div_der" style="display: none">
                    <div>
                        <br />
                        <p class="titulo_panel">SEND ME YOUR QUERY</p><br /><br />
                        <form action="send_eng.php" method="post">
                            <p id="par_01">NAME</p><input type="text" name="nombre" size="78" style="background:#c1c27c; color:#404033; font-family:Arial, Helvetica, sans-serif; font-size:12px; height:25px; width:450px;">
                            <br>
                            <p id="par_01">EMAIL</p><input type="text" name="email" size="78" style="background:#c1c27c; color:#404033; font-family:Arial, Helvetica, sans-serif; font-size:12px; height:25px;width:450px;">
                            <br>
                            <p id="par_01">QUERY</p><textarea name="coment" cols="75" rows="4" style="background:#c1c27c; color:#404033; font-family:Arial, Helvetica, sans-serif; font-size:12px;height:125px;width:450px;"></textarea>
                            <br><br>
                            <input type="submit" value="Send">
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