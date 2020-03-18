function CambiarPagina(nombre) {

    const tabs = document.querySelectorAll('div[id^=boton_]');
    const pages = document.querySelectorAll('div[id^=pagina_]');
    var id;

    for (tab of tabs)
    {
        id = tab.id.split('_')[1];

        tab.className = (id == nombre) ?
            'div_selector_on' :
            'div_selector_off';
    }

    for (page of pages)
    {
        id = page.id.split('_')[1];

        page.style.display = (id == nombre) ? '' : 'none';
    }

    document.querySelectorAll('.tooltip-text')
        .forEach(el => el.style.display = 'none')

    /*
    boton_curric.className = boton_curric.id == 'boton_' + nombre ? 'div_selector_on' : 'div_selector_off';
    boton_transc.className = boton_transc.id == 'boton_' + nombre ? 'div_selector_on' : 'div_selector_off';
    boton_articulos.className = boton_articulos.id == 'boton_' + nombre ? 'div_selector_on' : 'div_selector_off';
    boton_arreglos1.className = boton_arreglos1.id == 'boton_' + nombre ? 'div_selector_on' : 'div_selector_off';
    boton_arreglos2.className = boton_arreglos2.id == 'boton_' + nombre ? 'div_selector_on' : 'div_selector_off';
    boton_conciertos.className = boton_conciertos.id == 'boton_' + nombre ? 'div_selector_on' : 'div_selector_off';
    boton_contacto.className = boton_contacto.id == 'boton_' + nombre ? 'div_selector_on' : 'div_selector_off';

    pagina_curric.style.display = pagina_curric.id == 'pagina_' + nombre ? '' : 'none';
    pagina_transc.style.display = pagina_transc.id == 'pagina_' + nombre ? '' : 'none';
    pagina_articulos.style.display = pagina_articulos.id == 'pagina_' + nombre ? '' : 'none';
    pagina_arreglos1.style.display = pagina_arreglos1.id == 'pagina_' + nombre ? '' : 'none';
    pagina_arreglos2.style.display = pagina_arreglos2.id == 'pagina_' + nombre ? '' : 'none';
    pagina_conciertos.style.display = pagina_conciertos.id == 'pagina_' + nombre ? '' : 'none';
    pagina_contacto.style.display = pagina_contacto.id == 'pagina_' + nombre ? '' : 'none';
    */
}

function AlternarCarpeta(nombre) {
    var elemento;
    var lista;
    elemento = document.getElementById('carpeta_' + nombre);
    lista = document.getElementById('obras_' + nombre);

    if (elemento.src.endsWith('img/carpeta.png')) {
        elemento.src = 'img/carpeta_abierta.png';
        lista.style.display = '';
    }
    else {
        elemento.src = 'img/carpeta.png'
        lista.style.display = 'none';
    }
}

function AbrirDescarga(id)
{
    window.open('displaypdf.php?' + id);
}

function AgregarEtiquetasNuevo(texto)
{
    var items = document.getElementsByName("pdfnz");
    var cant = items.length;
    for (i = 0; i < cant; i++)
    {
        pub = items[i].attributes["publicado"];
        if (pub != null)
        {
          fecha = new Date(pub.value);
          if (new Date() - fecha <= 240*60*60*1000)
            items[i].innerHTML += "<span class=\"etiqueta_nuevo\">" + texto + "</span>";
        }
    }
}

function showModal(imgId)
{
    var bg = document.querySelector('.modal-bg');
    var modal = document.querySelector('.modal-box');
    var sourceImg = document.querySelector('#' + imgId);
    var modalImg = document.querySelector('.modal-img')

    bg.style.display = 'block';
    modal.style.display = 'block';
    modalImg.src = sourceImg.src;
}

function closeModal() {
    var bg = document.querySelector('.modal-bg');
    var modal = document.querySelector('.modal-box');
    modal.style.display = 'none';
    bg.style.display = 'none';
}
