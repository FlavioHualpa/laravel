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

    if ($fp = fopen($archivo,"r"))
    {
        $contador = intval(fgets($fp));
        fclose($fp);

        ++$contador;

        $fp = fopen($archivo,"w+");
        fwrite($fp, $contador);
        fclose($fp);
    }

	?>

    <div class="modal-bg" onclick="closeModal()">
    </div>
    <div class="modal-box">
        <img src="" alt="" class="modal-img">
    </div>
    
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
                    <div id="boton_transc" class="div_selector_off" onclick="CambiarPagina('transc')">TRANSCRIPCIONES</div>
                    <div id="boton_articulos" class="div_selector_off green_highlight tooltip" onclick="CambiarPagina('articulos')">ARTÍCULOS MUSICOLÓGICOS
                        <div class="tooltip-text">
                            Nueva Publicación
                        </div>
                    </div>
					<div id="boton_arreglos1" class="div_selector_off" onclick="CambiarPagina('arreglos1')">ARREGLOS CORALES GRATUITOS</div>
                    <div id="boton_arreglos2" class="div_selector_off" onclick="CambiarPagina('arreglos2')">ARREGLOS CORALES EDITADOS</div>
                    <div id="boton_conciertos" class="div_selector_off" onclick="CambiarPagina('conciertos')">PRÓXIMOS CONCIERTOS DIRIGIDOS POR NÉSTOR ZADOFF</div>
                    <div id="boton_contacto" class="div_selector_off" onclick="CambiarPagina('contacto')">CONTACTO</div>
                    <br />
                    <br />
                    <img src="img/band_fra.png" alt="français" height="20" class="selector_lang" /><span class="texto_panel" style="cursor: pointer"><a href="index_fra.php">Français</a></span><br />
                    <img src="img/band_ing.png" alt="english" height="20" class="selector_lang" /><span class="texto_panel" style="cursor: pointer"><a href="index_eng.php">English</a></span><br />
					<br /><br /><br /><br /><br />
					<span class="texto_panel">&nbsp;&nbsp;<?php echo "VISITAS: $contador"; ?></span>
					<br /><br /><br /><br /><br />
					<span class="texto_pie">&nbsp;&nbsp;Webmaster Flavio Hualpa</span>
                </div>
            </td>
            <td>
                <!--
                <div class="div_der">
                    <br>
                    <img src="img/luto.png" alt="luto" style="width: 32px; margin-top: 40px; margin-right: 8px; float: left;">
                    <img src="img/alarcon-zadoff.jpg" alt="Víctor Alarcón y Néstor Zadoff" style="width: 96px; margin-right: 12px; box-shadow: 2px 2px 6px #404040; float: left;">
                    <div class="texto_panel" style="display: inline-block; margin-top: 30px;"><em><strong>Esta Web está de luto<br>por el fallecimiento de<br>mi querido amigo-hermano<br>Víctor Alarcón (Chile)</strong></em></div>
                    <br style="clear: both;">
                    <br>
                    <hr style="margin-right: 20px;">
                    <br>
                </div>
                -->
                <div id="pagina_curric" class="div_der">
                    <br />

                    <!--
                    <div style="background-color: #f0fff0; border: 4px solid #800000; padding: 12px; width: 900px; margin-bottom: 24px;">
                        <img src="img\icon-technical-support.png" alt="problemas técnicos" style="width: 60px; display: inline-block; margin-right: 12px; vertical-align: top;">
                        <h3 style="display: inline-block; font-family: Arial; font-size: 20px; color: #800000; line-height: 1.4; margin-top: 3px;">Lamentamos el inconveniente técnico por el cual no se pudieron descargar archivos<br>durante los últimos días, las descargas ahora funcionan correctamente</h3>
                    </div>
                    -->

                    <p class="titulo_panel"><u>NÉSTOR ZADOFF</u></p><br />

                    <!--
                    <div style="background-color: wheat; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); float: left; margin-right: 25px; border-radius: 8px;">
                        <img src="img/retrato.jpg" width="267" height="387" alt="N�stor Zadoff" style="border-radius: 8px;" />
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

                    <p class="texto_panel">Nació en Buenos Aires, Argentina, en 1952.</p><br />
                    <p class="texto_panel">Es <strong>Profesor Nacional de Música</strong> egresado del Conservatorio Nacional y</p>
                    <p class="texto_panel"><strong>Licenciado en Artes Musicales</strong> (Universidad Nacional de las Artes</p>
					<p class="texto_panel">Departamento de Artes Musicales, UNA-DAMUS, www.artesmusicales.org).</p>
                    <p class="texto_panel">Estudió Armonía con Erwin Leuchter y Dirección Coral con Antonio Russo en el</p>
                    <p class="texto_panel">Conservatrio J.J.Castro (La Lucila). Entre 1976-1979 fue becado por el Gobierno Francés.</p>
                    <p class="texto_panel">Estudió con Jean-Michel Vaccaro, y obtuvo en 1979 el título de <strong>Doctor en Letras y</strong></p>
                    <p class="texto_panel"><strong>Ciencias Humanas, especialidad Musicología</strong> en la <em>Université François Rabelais</em> de Tours. </p>
                    <p class="texto_panel">Regresó ese año a Argentina, y se reinsertó en el medio musical al frente de coros y conjuntos de cámara.</p><br />
                    <p class="texto_panel">Desde 1981 es director del <strong>Grupo Coral Divertimento</strong> (coro sinfónico, <a src="http://www.gcdivertimento.com.ar">www.gcdivertimento.com.ar</a>)</p>
					<p class="texto_panel">con el que ha ofrecido oratorios sinfónico-corales desde el Barroco a nuestros días.</p>
                    <p class="texto_panel">Ha sido el fundador del <strong>Coro Nacional de Jóvenes</strong> y su titular entre 1985-2015. Con este Organismo estable</p>
					<p class="texto_panel">del Ministerio de Cultura obtuvo 24 premios en concursos corales internacionales (entre ellos el <strong>Grand Prix</strong></p>
                    <p class="texto_panel"><strong>del <em>Florilège Vocal de Tours</em></strong> en 1998, 1eros Premios en <em>Porto Alegre</em> (Brasil) en 1995,</p>
                    <p class="texto_panel">en <em>Lindenholzhausen</em> (Alemania) en 1999, y en <em>Spittal</em> (Austria) en 2003).</p><br />
                    <p class="texto_panel">Fue Profesor de Dirección Coral en el Conservatorio J.J.Castro (1980-2009)</p>
                    <p class="texto_panel">y en la Univ. Nacional de Rosario (2000-2010). Es actualmente Profesor Titular</p>
                    <p class="texto_panel">en UNA-Damus (desde 2003) de Dirección Coral, Morfología Coral y de Arreglos Corales.</p><br />
                    <p class="texto_panel">Conduce frecuentemente cursos y talleres de dirección coral en Argentina, Chile, Brasil y Europa,</p>
                    <p class="texto_panel">así como también es convocado frecuentemente como director invitado de coros y orquestas en el país y en el exterior.</p><br />
                    <p class="texto_panel">Es, por otra parte, autor de más de 100 arreglos corales, de los que 11 han sido premiados en diversos concursos en nuestro país.</p>
                    <p class="texto_panel">En 1998 fue nombrado miembro honorario del Consejo Argentino de la Música;</p>
                    <p class="texto_panel">en 1999 le fue otorgado el Diploma Konex a la <em>Revelación en Dirección Coral</em> de la década 1989-98.</p>
                    <p class="texto_panel">En 2009 recibió el Diploma Konex en la categoría <em>Director de Coro</em> de la década 1999-2008.</p>
                    <br /><br /><br /><br /><br /><br /><br /><br /><br />
                </div>

                <div id="pagina_transc" class="div_der" style="display: none">
                    <br />
                    <p class="titulo_panel"><u>TRANSCRIPCIONES GRATUITAS DE OBRAS CORALES DEL SIGLO XVI</u></p><br /><br />
                    <p class="texto_panel">En los últimos años he vuelto a mi actividad de investigador especialista en Música Antigua.</p>
                    <p class="texto_panel">En una época en la que la industria editorial está en grave crisis a nivel mundial</p>
                    <p class="texto_panel">decidí ofrecer de manera gratuita mi trabajo a través de esta plataforma</p>
                    <p class="texto_panel">a quienes se interesen en obras vocales poco o nada conocidas del período Renacentista,</p>
                    <p class="texto_panel">y que estimo no han sido impresas con anterioridad.</p>
                    <p class="texto_panel">Habrá aquí transcripciones a notación moderna y con criterio musicológico actualizado</p>
                    <p class="texto_panel">de <em>chansons</em> francesas, <em>villanesche</em> italianas y <em>madrigales</em> españoles</p>
                    <p class="texto_panel">compuestas durante el XVI y comienzos del XVII.</p>
                    <p class="texto_panel">Es mi deseo que estos aportes permitan el renacimiento de estas obras a través</p>
                    <p class="texto_panel">de grupos de cámara y coros de cualquier nacionalidad.</p><br /><br />
                    <p class="titulo_panel"><u>PRINCIPIOS DE TRANSCRIPCIÓN</u></p><br /><br />
                    <p class="texto_panel">• Los valores rítmicos fueron reducidos a la mitad de su valor visual.</p>
                    <p class="texto_panel" style="margin-top: 5px;">• Las indicaciones de métrica utilizadas desde ca. 1530 fueron:</p>
                    <p class="texto_panel" style="margin-top: 5px;">&nbsp;&nbsp;a) <img src="img/tactus minima.png" alt="tactus" height="21" style="vertical-align: middle;" /> (tactus -unidad de medida- a la mínima con subdivisión binaria)</p>
                    <p class="texto_panel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;para obras de ritmo ágil (villanesche, villanelle, moresche, mascherate);</p>
                    <p class="texto_panel">&nbsp;&nbsp;b) <img src="img/tactus semibreve.png" alt="tactus" height="32" style="vertical-align: middle;" /> (tactus a la semibreve con subdivisión binaria) en obras serias</p>
                    <p class="texto_panel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(madrigales italianos y españoles, chansons francesas) cuyo movimiento rítmico es más calmo, y</p>
                    <p class="texto_panel">&nbsp;&nbsp;c) <img src="img/tactus ternario.png" alt="tactus" height="20" style="vertical-align: middle;" /> (tactus con subdivisión ternaria).</p>
                    <p class="texto_panel" style="margin-top: 5px;">• En caso de aparecer en diferentes pasajes de la misma obra las indicaciones métricas</p>
                    <p class="texto_panel">&nbsp;&nbsp;de tactus binario y ternario, la relación métrica entre ellos debe resolverse manteniendo la unidad</p>
                    <p class="texto_panel">&nbsp;&nbsp;de medida invariable; ello significará que en los pasajes ternarios las subdivisiones serán más rápidas</p>
                    <p class="texto_panel">&nbsp;&nbsp;que en el binario, con una relación 3 a 2. Tenemos un ejemplo clarificador en <em><u>Chaggio perduto</u></em></p>
                    <p class="texto_panel">&nbsp;&nbsp;de Severin Cornet. Asimismo, las 3 indicaciones métricas están presentes en el tardío madrigal español</p>
                    <p class="texto_panel">&nbsp;&nbsp;<em><u>Entre dos mansos arroyos</u></em>, de Mateo Romero (Mathieu Romarin, 1575-1647), que sugiero observar con detenimiento.</p>
                    <p class="texto_panel" style="margin-top: 5px;">• Las sensibilizaciones editoriales están sugeridas sobre la nota en cuestión a la que solamente se refieren.</p>
                    <p class="texto_panel" style="margin-top: 5px;">• Los pasajes en los que el texto es confuso en el original estarán entre [ ] indicando que son sugerencia editorial.</p>
                    <p class="texto_panel">&nbsp;&nbsp;Las obras tempranas (Josquin, Nola) presentan varias situaciones de ese tipo, en cambio en las más tardías</p>
                    <p class="texto_panel">&nbsp;&nbsp;(Cornet, Lassus) la ubicación del texto en los originales es muy precisa.</p>
                    <p class="texto_panel" style="margin-top: 5px;">• Durante el período renacentista no se usaban las barras de compás a la que estamos acostumbrados.</p>
                    <p class="texto_panel">&nbsp;&nbsp;Para facilitar la lectura a músicos y coreutas actuales, en mis transcripciones recientes (especialmente</p>
                    <p class="texto_panel">&nbsp;&nbsp;en obras de Josquin, chansons francesas, Nola y Cornet) he indicado barras individuales para cada voz,</p>
                    <p class="texto_panel">&nbsp;&nbsp;las que están ubicadas de acuerdo a su propio fraseo individual, y respetando la acentuación natural de las palabras.</p>
                    <p class="texto_panel">&nbsp;&nbsp;Esta última premisa era esencial en el período.</p>
                    <p class="texto_panel" style="margin-top: 5px;">• Es obvio que en pasajes verticales las barras serán coincidentes entre todas las voces,</p>
                    <p class="texto_panel">&nbsp;&nbsp;pero en otros imitativos (muy presentes en las obras de autores franco-flamencos)</p>
                    <p class="texto_panel">&nbsp;&nbsp;cada voz tendrá su fraseo específico.</p>
					<p class="texto_panel" style="margin-top: 5px;">• Hay aquí algunas transcripciones que he transpuesto a <em>otro tono</em>, para así adecuarlas</p>
					<p class="texto_panel">&nbsp;&nbsp;a tesituras de coros mixtos actuales. En esos casos he indicado la tonalidad original</p>
					<p class="texto_panel">&nbsp;&nbsp;(<em>La morre est jeu, Ventz hardis</em>)</p>
					<p class="texto_panel" style="margin-top: 5px;">• Asimismo, en algunas obras hice una propuesta integral de indicaciones de interpretación,</p>
					<p class="texto_panel">&nbsp;&nbsp;las que, por supuesto, no son originales. Está indicado claramente en cada caso.</p>
                    <br><br><br>

                    <p class="titulo_panel">JOSQUIN DES PRES (ca. 1450/55-1521)&nbsp;&nbsp;<img id="carpeta_despres" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('despres')" /></p><br />
                    <ul id="obras_despres" style="display: none;">
                        <span class="esp_lista">&lt;&lt; Ver en <strong>Artículos Musicológicos</strong> info sobre Josquin</span>
                        <li class="link_panel"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\portada_josquin.png">Portada original de la edición</a></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=42">Cueur langoreux</a> a 5 (SATTB) - <em>(7* livre des chansons, Susato, Anvers, 1545)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=47">En non saichant</a> a 5 (SATTB) - <em>(7* livre des chansons, Susato, Anvers, 1545, atribución en duda)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=41">Ie me complains</a> a 5 (SATTB) - <em>(7* livre des chansons, Susato, Anvers, 1545)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=27">Parfons regretz</a> a 5 (SSATB) - <em>(7* livre des chansons, Susato, Anvers, 1545)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=56">Regretz sans fin</a> a 6 (SATTTB) - <em>(7* livre des chansons, Susato, Anvers, 1545, versión en el tono original)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=43">Regretz sans fin</a> a 6 (SSAATB) - <em>(7* livre des chansons, Susato, Anvers, 1545, versión transpuesta para coro mixto)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=64">Cueurs desolez</a> a 5 (SATTB) - <em>(36* Livre, XXX Chansons musicales, P. Attaingnant, Paris, 1549)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=48">Je ne me puis tenir d'aimer</a> a 5 (SATTB) - <em>(36* Livre, XXX Chansons musicales, P. Attaingnant, Paris, 1549)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=69">Plus nulz regretz</a> a 4 (ATTB) - <em>(36* Livre, XXX Chansons musicales, P. Attaingnant, Paris, 1549)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=52">Cueurs desolez</a> a 4 (STTB) - <em>(atribuida a Josquin y/o a Benedictus Appenzeller en diversas fuentes de época, entre ellas Attaingnant, 1534, Paris, versión en el tono original)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=53">Cueurs desolez</a> a 4 (SATB) - <em>(atribuida a Josquin y/o a Benedictus Appenzeller en diversas fuentes de época, entre ellas Attaingnant, 1534, Paris, versión para coro mixto)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">SEVERIN CORNET (ca. 1530-1582)&nbsp;&nbsp;<img id="carpeta_cornet" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('cornet')" /></p><br />
                    <ul id="obras_cornet" style="display: none;">
						<li class="link_panel"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\Severin Cornet.pdf">Biografía</a></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\portada_cornet.png">Portada original de la edición</a></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=49">Che t'aggio fatto</a></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=07">Chaggio perduto</a></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=08">Che giova saettar</a></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=19">Hor va canzona</a></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=54">O Lucia (parte 1)</a></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=55">O Lucia (parte 2)</a></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=28">Parmi di star</a></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=30">Se per sentir</a></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=51">Sei tanto gratiosa</a></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=31">Signora Mia</a></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=32">Sio fosse certo</a></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=34">Tu m'arrobasti</a></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">GIOVANNI DA NOLA (ca. 1510-1592)&nbsp;&nbsp;<img id="carpeta_danola" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('danola')" /></p><br />
                    <ul id="obras_danola" style="display: none;">
						<li class="link_panel"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\Giovanni Domenico.pdf">Biografía y comentarios</a></li>
                        <li class="link_panel"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\portada_nola.png">Portada original de la edición</a></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=09">Chi dirra</a> - <em>Canzon villanesca (ed. 1541)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=24">Medici nui siam</a> - <em>Canzon villanesca (ed. 1541)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=25">O dolce vita mia</a> - <em>Canzon villanesca (ed. 1541)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=26">Oyme dolente</a> - <em>Canzon villanesca (ed. 1541)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">ORLANDE DE LASSUS (1532-1594)&nbsp;&nbsp;<img id="carpeta_lassus" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('lassus')" /><!-- <img src="img/animated-arrow-image-0313.gif" alt="atención"><span class="etiqueta_nuevo">NUEVAS DESCARGAS</span> --></p><br />
                    <ul id="obras_lassus" style="display: none;">
                        <span class="esp_lista">&lt;&lt; Ver en <strong>Artículos Musicológicos</strong> info musicológica,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;traducción y sugerencias de interpretación</span>
						<li class="link_panel"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\Portada Lassus.pdf">Portada de la Mellange de Orlande de Lassus</a></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=02">Ave mater</a> - <em>(Motete, Magnum Opus Musicum, München, 1604)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=14">Dessus le marche</a> - <em>(Continuation du Mellange d'Orlande de Lassus, Le Roy & Ballard, 1584, París)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="9/8/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><span>&#x00A7;</span> <a target="_blank" href="displaypdf.php?id=92">Du cors absent</a> - <em>(Chanson, Mellange d'Orlande de Lassus, París, 1570, Le Roy & Ballard)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=16">En espoir vis</a> - <em>(Chanson, Mellange d'Orlande de Lassus, París, 1570, Le Roy & Ballard)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=21">La morre est jeu</a> - <em>(Chanson, Mellange d'Orlande de Lassus, París, 1570, Le Roy & Ballard)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="9/8/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><span>&#x00A7;</span> <a target="_blank" href="displaypdf.php?id=93">Un avocat dit a sa femme</a> - <em>(Chanson, Mellange d'Orlande de Lassus, París, 1570, Le Roy & Ballard)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="10/13/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><span>&#x00B6;</span> <a target="_blank" href="displaypdf.php?id=98">La cortesia</a> - <em>(Villanella, Le 14ème livre des chansons, ed. Susato, Anvers, 1555)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="10/13/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><span>&#x00B6;</span> <a target="_blank" href="displaypdf.php?id=94">Per pianto</a> - <em>(Madrigal, Le 14ème livre des chansons, ed. Susato, Anvers, 1555)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><span>&#x00B6;</span> <a target="_blank" href="displaypdf.php?id=35">Tu traditora</a> - <em>(Villanella, Le 14ème livre des chansons, ed. Susato, Anvers, 1555)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">CHANSONS FRANCESAS DE DIVERSOS AUTORES&nbsp;&nbsp;<img id="carpeta_francesas" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('francesas')" /><!-- <img src="img/animated-arrow-image-0313.gif" alt="atención"><span class="etiqueta_nuevo">NUEVAS DESCARGAS</span> --></p><br />
                    <ul id="obras_francesas" style="display: none;">
                        <span class="esp_lista">&lt;&lt; Ver en <strong>Artículos Musicológicos</strong> info musicológica,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;traducción y sugerencias de interpretación</span>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=50">Avant l'aymer</a> - <em>(Pierre Sandrin -Pierre Regnault-, ed 18* livre des chansons, Attaingnant, Paris 1545)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=44">De trop aymer</a> - <em>(Anónimo, 27 chansons musicales, P. Attaingnant, Paris, 1534)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=46">Es tu bien malade</a> - <em>(Anónimo, 27 chansons musicales, P. Attaingnant, Paris, 1534)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="9/8/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><span>&#x00A7;</span> <a target="_blank" href="displaypdf.php?id=87">Fyez vous y si vous voulez</a> - <em>(Clement Janequin (ca. 1485-1558), 26 Chansons a 4 parties, Attaingnant 1534, Paris)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="9/8/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><span>&#x00A7;</span> <a target="_blank" href="displaypdf.php?id=89">Ie n'ay point plus</a> - <em>(Claudin de Sermisy, ed 18* livre des chansons, Attaingnant, Paris 1545)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="9/8/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><span>&#x00A7;</span> <a target="_blank" href="displaypdf.php?id=90">Il n'est que d'estre sur l'herbette</a> - <em>(Claude Gervaise, 16* livre des chansons, N. du Chemin, Paris 1550)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="9/8/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><span>&#x00A7;</span> <a target="_blank" href="displaypdf.php?id=91">Perdre le sens devant vous</a> - <em>(Claude le Jeune, Le Printemps, R. Ballard, Paris 1603)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="9/8/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><span>&#x00A7;</span> <a target="_blank" href="displaypdf.php?id=88">Rigueur me tient</a> - <em>(Claudin de Sermisy, ed 18* livre des chansons, Attaingnant, Paris 1545)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=36">Ventz hardis</a> - <em>(Clement Janequin (ca. 1485-1558), 1552, Paris, N. Du Chemin)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=38">Voulant honneur</a> - <em>(Pierre Sandrin -Pierre Regnault-, ed 18* livre des chansons, Attaingnant, Paris 1545)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">MADRIGALES Y VILLANELLE ITALIANAS DE DIVERSOS AUTORES&nbsp;&nbsp;<img id="carpeta_italianas" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('italianas')" /><!-- <img src="img/animated-arrow-image-0313.gif" alt="atención"><span class="etiqueta_nuevo">NUEVAS DESCARGAS</span> --></p><br />
                    <ul id="obras_italianas" style="display: none;">
                        <span class="esp_lista">&lt;&lt; Ver en <strong>Artículos Musicológicos</strong> info musicológica,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;traducción y sugerencias de interpretación</span>
                        <li class="link_panel" name="pdfnz" publicado="10/13/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><span>&#x00B6;</span> <a target="_blank" href="displaypdf.php?id=97">Gentil madonna</a> - <em>(Filippo Azzaiolo, Villotta, 1557)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="10/13/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><span>&#x00B6;</span> <a target="_blank" href="displaypdf.php?id=96">La piaga ch'ho nel core</a> - <em>(Claudio Monteverdi, IV libro de madrigales, 1603)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="10/13/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><span>&#x00B6;</span> <a target="_blank" href="displaypdf.php?id=95">Mirate che mi fa</a> - <em>(Salomone Rossi, Canzonetta, 1589)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=57">Quando per mio destin</a> - <em>(Nicolo Vicentino, 5* libro de madrigales, 1572)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=58">Vecchie letrose</a> - <em>(Adrian Willaert, Canzone villanesche, ed. A. Gardane, Venecia, 1545)</em></li>
                    </ul>
                    <br /><br />

                    <p class="titulo_panel">MADRIGALES Y VILLANCICOS ESPAÑOLES DE DIVERSOS AUTORES&nbsp;&nbsp;<img id="carpeta_españolas" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('españolas')" /><!-- <img src="img/animated-arrow-image-0313.gif" alt="atención"><span class="etiqueta_nuevo">NUEVAS DESCARGAS</span> --></p><br />
                    <ul id="obras_españolas" style="display: none;">
                        <span class="esp_lista">&lt;&lt; Ver en <strong>Artículos Musicológicos</strong> info sobre las obras españolas aquí transcriptas</span>
						<li class="link_panel" name="pdfnz" publicado="9/3/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=82">Corten espadas afiladas</a> - <em>(Anónimo, Cancionero de Medinaceli (ca. 1540-70))</em></li>
						<li class="link_panel" name="pdfnz" publicado="9/3/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=77">Gasajemonos de husía</a> - <em>(Juan del Encina, Cancionero Musical de Palacio (ca. 1470-1520))</em></li>
						<li class="link_panel" name="pdfnz" publicado="9/3/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=76">Las tristesas no me espantan</a> - <em>(Anónimo, Cancionero Musical de Palacio (ca. 1470-1520))</em></li>
						<li class="link_panel" name="pdfnz" publicado="9/3/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=81">Ojos garços a la niña</a> - <em>(Anónimo, Cancionero de Uppsala (ed. 1556))</em></li>
						<li class="link_panel" name="pdfnz" publicado="9/3/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=78">Quédate carillo adiós</a> - <em>(Juan del Encina, Cancionero Musical de Palacio (ca. 1470-1520))</em></li>
						<li class="link_panel" name="pdfnz" publicado="9/3/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=80">Si la noche haze escura</a> - <em>(Anónimo, Cancionero de Uppsala (ed. 1556))</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=75">Teresica hermana</a> - <em>(Atribuida a Mateo Flecha, Cancionero de Uppsala (ed. 1556))</em></li>
						<li class="link_panel" name="pdfnz" publicado="9/3/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=79">Todo mi bien e perdido</a> - <em>(Juan Ponce, Cancionero Musical de Palacio (ca. 1470-1520))</em></li>
                    </ul>
                    <br /><br />

                    <p class="texto_panel">&nbsp;&nbsp;<span>&#x00A7;</span>&nbsp;Música vocal francesa del XVI<br>
                    &nbsp;&nbsp;<span>&#x00B6;</span>&nbsp;Música vocal italiana del XVI<br><br></p>

                    <!--
                    <p class="titulo_panel">ARTÍCULOS MUSICOLÓGICOS&nbsp;&nbsp;<img id="carpeta_artmus" src="img/carpeta.png" alt="carpeta" height="24" style="vertical-align: middle; cursor: pointer;" onclick="AlternarCarpeta('artmus')" /></p><br />
                    <ul id="obras_artmus" style="display: none;">
                        <li class="link_panel"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\Damus Nro 433.pdf">Entre dos mansos arroyos, madrigal español de comienzos del XVII, revista digital 433 del Damus-UNA, 2012</a></li>
						<li class="link_panel"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\Cantata 1994.pdf">Acercándonos a Palestrina y Lassus, revista Cantata, 1994</a></li>
                    </ul>
                    <br /><br />
                    -->
                </div>

                <div id="pagina_articulos" class="div_der" style="display: none">
                    <br />
                    <p class="titulo_panel"><u>ARTÍCULOS MUSICOLÓGICOS</u></p><br /><br />
                    <ul id="obras_artmus">
                        <li class="link_panel" name="pdfnz" publicado="3/11/2020"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\Análisis de obras corales renacentistas por Néstor Zadoff.pdf">Análisis de obras corales renacentistas</a></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\Josquin des Pres.pdf">Josquin Desprez - Comentario musicológico</a> (Parte I)</li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\Los estilos de Josquin.pdf">Los estilos de las chansons de Josquin Desprez</a> (Parte II)</li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\Damus Nro 433.pdf">Entre dos mansos arroyos, madrigal español de comienzos del XVII</a>,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="pdfs\Damus Nro 433.pdf">revista digital 433 del Damus-UNA, 2012</a></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\Cantata 1994.pdf">Acercándonos a Palestrina y Lassus, revista Cantata, 1994</a></li>
						<li class="link_panel" name="pdfnz" publicado="11/28/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\Música vocal española del XVI.pdf">Info musicológica de transcripciones de obras españolas de esta web</a></li>
						<li class="link_panel" name="pdfnz" publicado="12/24/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\Música vocal francesa del XVI.pdf">Info musicológica de transcripciones de obras francesas de esta web</a></li>
						<li class="link_panel" name="pdfnz" publicado="12/24/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="pdfs\Música vocal italiana del XVI.pdf">Info musicológica de transcripciones de obras italianas de esta web</a></li>
                        <li>&nbsp;</li>
                        <li class="texto_panel">Próximamente:</li>
                        <li class="texto_panel">• Ubicación del texto en obras del XVI: problemática y soluciones</li>
                        <li class="texto_panel">• Sensibilizaciones no escritas en originales del XVI: cuáles y en qué circunstancias aplicarlas?</li>
                    </ul>
                    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                </div>

				<div id="pagina_arreglos1" class="div_der" style="display: none">
                    <br />
                    <p class="titulo_panel"><u>ARREGLOS CORALES DE MÚSICA POPULAR</u></p><br /><br />
                    <p class="texto_panel">He decidido incorporar a esta plataforma varios de mis arreglos corales <strong>nunca editados.</strong></p>
                    <p class="texto_panel">Empecé a escribir arreglos para coro desde muy joven en 1972, casi siempre para ser cantados</p>
                    <p class="texto_panel">por los coros que dirigí en más de 45 años en la actividad.</p><br />
                    <p class="texto_panel">Muchos de mis arreglos corales han sido editados desde hace años en Argentina</p>
                    <p class="texto_panel">(Ediciones GCC), Francia (Editions A Coeur Joie) y Estados Unidos (Kjos),</p>
                    <p class="texto_panel">y deben consultar a las editoriales para conseguirlos.</p><br />
                    <p class="texto_panel">Más adelante voy a detallar el listado completo de mis arreglos (son más de 100),</p>
                    <p class="texto_panel">así como el orgánico coral para el que han sido escritos.</p><br />
                    <p class="texto_panel">Aquí encontrarán arreglos corales de obras de Astor Piazzolla, María Elena Walsh,</p>
                    <p class="texto_panel">Beatles, negro spirituals, y de varios autores argentinos y latinoamericanos.</p>
                    <p class="texto_panel">Pueden descargarse desde aquí de manera gratuita.</p><br />
                    <p class="texto_panel">De todos mis arreglos corales, 11 han sido premiados en concursos en Argentina.</p>
                    <p class="texto_panel">Los indicados con <img src="img/award-icon.png" class="icono-premio"> están aquí disponibles:</p><br />
                    <p class="texto_lista_panel">• Canción del Jardinero (SA) I Premio categoría voces iguales (Nacional 1985)</p>
                    <p class="texto_lista_panel">• Jacinto Chiclana (SATB) III Premio Tango-Milonga (Nacional 1985)</p>
                    <p class="texto_lista_panel">• Adiós nonino (SATB) IV Premio Tango-Milonga (Nacional 1985)</p>
                    <p class="texto_lista_panel">• Serenata para la tierra de uno (SATB) III Premio Canción (Nacional 1985) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• El árbol ya fue plantado (SATB) IV Premio Canción (Nacional 1985) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• Cuatro estrofas (SATB) I Premio (Municipal 1986) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• Zamba del nuevo día (SATB) I Premio (Esiteddfod 1992) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• Tonada de La Quiaca (SAB) I Mención (Fondo de las Artes 2007)</p>
                    <p class="texto_lista_panel">• Guanuqueando (SAB) II Mención (Fondo de las Artes 2007) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• Exaudiat (obra original) (SATB) Mención (Ars Nova de Rosario 2012) <img src="img/award-icon.png" class="icono-premio"></p>
                    <p class="texto_lista_panel">• Canción de la vacuna (SATB) III Premio (AAMCANT 2015) <img src="img/award-icon.png" class="icono-premio"></p>
                    <br><br>

                    <p class="titulo_panel">ASTOR PIAZZOLLA</p><br>
                    <ul id="obras_piazzolla">
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=01">Años de soledad</a> - <em>SATB (Astor Piazzolla, 2012)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/15/2019"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=105">Buenos Aires hora cero</a> - <em>SSAA (Astor Piazzolla, 2014)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=05">Buenos Aires hora cero</a> - <em>TTBB (Astor Piazzolla, 2005)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=10">Coral</a> - <em>SATB (Astor Piazzolla, 2000)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=37">Verano porteño</a> - <em>SATB (Astor Piazzolla, 1974)</em></li>
                    </ul>
                    <br><br>

                    <p class="titulo_panel">MARÍA ELENA WALSH</p><br>
                    <ul id="obras_mewalsh">
                        <li class="link_panel" name="pdfnz" publicado="4/21/2019"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=106">Adivina adivinador</a> - <em>SA (M. E. Walsh, 2019)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=15">Canción de la vacuna (el brujito de Gulubú)</a> - <em>SATB (M. E. Walsh, 1982)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=06">Canción del estornudo (el otro Mambrú)</a> - <em>SATB (M. E. Walsh, 1983)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=73">Como la cigarra</a> - <em>SATB (M. E. Walsh, 1982)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=71">La canción del Jacarandá</a> - <em>SA / coro de niños (M. E. Walsh, 2018)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/2/2019"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=104">La Pájara Pinta</a> - <em>SA (M. E. Walsh, 2017)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=70">La vaca estudiosa</a> - <em>SA / coro de niños (M. E. Walsh, 2009)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=68">Manuelita la tortuga</a> - <em>SA / coro de niños (M. E. Walsh, 2017)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=67">Serenata para la tierra de uno</a> - <em>SATB (M. E. Walsh, 1984)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=40">Zamba para Pepe</a> - <em>SATB (M. E. Walsh, 1996)</em></li>
                    </ul>
                    <br><br>

                    <p class="titulo_panel">THE BEATLES - QUEEN</p><br>
                    <ul id="obras_beatles">
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=74">I wanna be your man</a> - <em>SATB y orquesta (Lennon-McCartney, 2007)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=03">I will</a> - <em>SATB (P. Mc Cartney, 2005)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=65">I will</a> - <em>SATB y orquesta (P. Mc Cartney, 2006)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=22">Lady Madonna</a> - <em>SATB y orquesta (Lennon-Mc Cartney, 2006)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="2/11/2019"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=101">Love of my life</a> - <em>SATB (F. Mercury, 1992)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=23">Love of my life</a> - <em>SATB y orquesta (F. Mercury, 2006)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=04">Yesterday</a> - <em>SATB (P. Mc Cartney, 2005)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=66">Yesterday</a> - <em>SATB y orquesta (P. Mc Cartney, 2006)</em></li>
                    </ul>
                    <br><br>

                    <p class="titulo_panel">FOLKLORE</p><br>
                    <ul id="obras_folklore">
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=62">And so it goes</a> - <em>TTBB (Billy Joel, 1999)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=72">Atacama tierra mía</a> - <em>SATB (Iván Darrigrande, Curso de Arreglos Corales, Copiapó, Chile 2015)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="1/2/2019"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=99">Carol of the bells</a> - <em>SSA (Mykola Leontovych, Peter Wilhousky, 2018)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="9/19/2019"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=107">Coplas de carnaval</a> <strong>(versión corregida)</strong> - <em>SATB (Tradicional del norte argentino, 2019)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=11">Cuando partí</a> - <em>SSAA (M. Alemán Mónico, 2001)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=12">Cuatro estrofas</a> - <em>SATB (A. Lerner, 1986)</em> <img src="img/award-icon.png" class="icono-premio"></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=63">Déjame que me vaya</a> - <em>SATB (Carabajal-Ternán, 2014)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=45">Despertar de mi tierra</a> - <em>SATB (G. Morales - S.O'Brian, Curso de Arreglos Corales, Copiapó, Chile 2015)</em></li>
						<li class="link_panel" name="pdfnz" publicado="9/3/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=86">El árbol ya fue plantado</a> - <em>SATB (E. Siro - D. Sánchez, 1991)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=18">Guanuqueando</a> <strong>(versión corregida)</strong> - <em>SAB (R. Vilca, 2007)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=20">Juana y José</a> - <em>SATB (Cruz F. Iriarte, Venezuela, 1986)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="9/3/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=83">Palito de tola</a> - <em>SATB (René Vargas Vera - Luis Sánchez Vera, 1996)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=60">Romance de la Luna sanjuanina</a> - <em>SATB (Gustavo Troncozo, 2013)</em></li>
						<li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=59">San Juan por mi sangre</a> - <em>SATB (Ernesto Villavicencio, 2012)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=29">Sangena</a> - <em>SATB (Canto nupcial africano, 2012)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="3/13/2019"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=102">Señora doña María</a> - <em>SATB (Villancico chileno, 1997)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=33">Sobredosis de chamamé</a> - <em>SATB (A. Balestra, 2007)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="3/13/2019"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=103">Tonada de la Quiaca</a> - <em>SSA (Tradicional del norte argentino, 2014)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=39">Zamba del nuevo día</a> - <em>SATB (O. Cardozo Ocampo, 1992)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                    </ul>
                    <br><br>
                    
                    <p class="titulo_panel">SPIRITUALS</p><br>
                    <ul id="obras_spirituals">
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=61">Can't you live humble</a> - <em>SSATB (Spiritual, 1995)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="9/3/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=84">Mary had a baby</a> - <em>SATB (Spiritual, 2000)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="9/3/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=85">Oh yes</a> - <em>SATB solos y SATB (Spiritual, 1982)</em></li>
                        <li class="link_panel" name="pdfnz" publicado="2/5/2019"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=100">Spiritual's Ode</a> - <em>Solos y SATB (N. Zadoff, obra original, 1998)</em></li>
                    </ul>
                    <br><br>

                    <p class="titulo_panel">OTRAS</p><br>
                    <ul id="obras_otras">
                        <li class="link_panel" name="pdfnz" publicado="4/30/2018"><img src="img/acrobat_icon.png" class="icono-pdf" /><a target="_blank" href="displaypdf.php?id=17">Exaudiat te Dominus</a> - <em>SATB (N. Zadoff, obra original, 2009)</em> <img src="img/award-icon.png" class="icono-premio"></li>
                    </ul>
                    <br><br>
                </div>

				<div id="pagina_arreglos2" class="div_der" style="display: none">
                    <br />
                    <p class="titulo_panel"><u>ARREGLOS CORALES EDITADOS</u></p><br /><br />
                    <p class="texto_panel">Mis siguientes arreglos están editados desde hace varios años y están disponibles en las editoriales respectivas:</p>
                    <br><br>
                    <ul>
                        <li class="lista_arreglos"><strong>Ediciones GCC (Argentina)</strong></li>
                        <li class="lista_arreglos">Contacto: <a href="mailto:edicionesgcc@gmail.com">edicionesgcc@gmail.com</a></li>
                        <li class="lista_arreglos">&nbsp;</li>
                        <li class="lista_arreglos">• Allá lejos y hace tiempo - <em>SATB (Ariel Ramírez, 1991)</em></li>
                        <li class="lista_arreglos">• Balada para mi muerte - <em>SATB (Astor Piazzolla, 1992)</em></li>
                        <li class="lista_arreglos">• Buenos Aires hora cero - <em>SATB (Astor Piazzolla, 2000)</em></li>
                        <li class="lista_arreglos">• Canción del jardinero - <em>SA (M. E. Walsh, 1985)</em></li>
                        <li class="lista_arreglos">• Dos canciones tradicionales españolas - <em>SA (Anónimo, 1991)</em></li>
                        <li class="lista_arreglos">• El gordo triste - <em>SAB (Astor Piazzolla, 2000)</em></li>
                        <li class="lista_arreglos">• La muerte del ángel - <em>SATB (Astor Piazzolla, 1991)</em></li>
                        <li class="lista_arreglos">• Jacinto Chiclana - <em>SATB (Astor Piazzolla, 1982)</em></li>
                    </ul>
                    <br><br>
                    <ul>
                        <li class="lista_arreglos"><strong>Editions A Coeur Joie (Francia)</strong></li>
                        <li class="lista_arreglos">Contacto: <a href="mailto:daudibert@choralies.org">daudibert@choralies.org</a></li>
                        <li class="lista_arreglos">&nbsp;</li>
                        <li class="lista_arreglos">• Adiós Nonino - <em>SATB (Astor Piazzolla, 1981)</em></li>
                        <li class="lista_arreglos">• Berimbau - <em>SATB (Vinicius-Powell, 2000)</em></li>
                        <li class="lista_arreglos">• Canten señores cantores - <em>Canon a 2 y 3 (Tradicional)</em></li>
                        <li class="lista_arreglos">• Huachito torito - <em>SAB (Tradicional, 1999)</em></li>
                        <li class="lista_arreglos">• La Puerca - <em>SAB (1999)</em></li>
                        <li class="lista_arreglos">• Plantita de alhelí - <em>SAB (Tradicional, 2003)</em></li>
                        <li class="lista_arreglos">• Tonada de La Quiaca - <em>SAB (Tradicional, 2006)</em></li>
                    </ul>
                    <br><br><br><br><br><br>
                </div>

                <div id="pagina_conciertos" class="div_der" style="display: none; min-height: calc(100vh - 150px);">

                    <br />
                    <p class="titulo_panel"><u>NOVIEMBRE/DICIEMBRE 2019</u></p>
                    <br />
                    <br />
                    <span class="perf_thumb" onclick="showModal('IM20191130')">
                        <img src="img/Zelenka-Misa-Votiva-Sacramentado.jpg" alt="30/11/2019 - Santuario Jesús Sacramentado - CABA" title="30/11/2019 - Santuario Jesús Sacramentado - CABA" id="IM20191130">
                    </span>
                    <span class="perf_thumb" onclick="showModal('IM20191205')">
                        <img src="img/Zelenka-Misa-Votiva-Catedral.jpg" alt="5/12/2019 - Catedral Metropolitana - CABA" title="5/12/2019 - Catedral Metropolitana - CABA" id="IM20191205">
                    </span>
                
                </div>

                <div id="pagina_contacto" class="div_der" style="display: none">
                    <div>
                        <br />
                        <p class="titulo_panel">ENVIAME TU CONSULTA</p><br /><br />
                        <form action="send_esp.php" method="post">
                            <p id="par_01">NOMBRE</p><input type="text" name="nombre" size="78" style="background:#c1c27c; color:#404033; font-family:Arial, Helvetica, sans-serif; font-size:12px; height:25px; width:450px;">
                            <br>
                            <p id="par_01">EMAIL</p><input type="text" name="email" size="78" style="background:#c1c27c; color:#404033; font-family:Arial, Helvetica, sans-serif; font-size:12px; height:25px;width:450px;">
                            <br>
                            <p id="par_01">CONSULTA</p><textarea name="coment" cols="75" rows="4" style="background:#c1c27c; color:#404033; font-family:Arial, Helvetica, sans-serif; font-size:12px;height:125px;width:450px;"></textarea>
                            <br><br>
                            <input type="submit" value="Enviar">
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
    <script>AgregarEtiquetasNuevo('NUEVO');</script>
</body>
</html>