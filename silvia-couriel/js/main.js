// var gal = JSON.parse(gallery);
var galleryImages;
var galleryDots;
var shownImageIndex;
var selectedWorkIndex;

const previous = -2;
const next = -1;

window.onload = function () {
  
  if (document.querySelector('.content-box')) {
    this.generateGallery(gallery[0].id);
    this.generateIndex();
  }

  $('header i.fa-bars').click(
    function () {
      $('.slide-menu').animate(
        {
          left: '0'
        },
        'fast'
      )
    }
  )

  let t = $('#audio-track')[0]

  if (sessionStorage.getItem('audio-time')) {
    t.currentTime = sessionStorage.getItem('audio-time')
  }

  if (sessionStorage.getItem('audio-state') == 'paused')
  {
    pauseMusic(t)
  }
  else
  {
    playMusic(t)
  }

  $('header i.fa-music, header i.fa-volume-up, header i.fa-volume-mute').click(
    function () {
      if (t.paused) {
        playMusic(t)        
        sessionStorage.setItem('audio-state', 'playing')
      }
      else {
        pauseMusic(t)        
        sessionStorage.setItem('audio-state', 'paused')
        sessionStorage.setItem('audio-time', t.currentTime)
      }
    }
  )

  $('.slide-menu .title-wrapper i').click(
    function () {
      $('.slide-menu').animate(
        {
          left: '-320px'
        },
        'fast'
      )
    }
  )

}

function findWorkById(id)
{
  for (var work of gallery) {
    if (work.id == id) {
      return work;
    }
  }

  return null;
}

function generateGallery(workId)
{
  var work = findWorkById(workId);
  if (!workId) return;

  var galleryElement = document.querySelector('.gallery');
  var descDiv = document.querySelector('#description');

  // primero hay que vaciar los contenedores
  // de imágenes e índice de trabajos
  galleryElement.innerHTML = null;
  galleryImages = [];
  galleryDots = [];
  descDiv.innerHTML = '';

  var divElement = document.createElement('div');
  divElement.setAttribute('class', 'gallery-content');

  var imgElement;
  var pElement;
  var iElement;
  var wrapElement;
  var spanElement;

  // genero dinámicamente las imágenes del trabajo seleccionado
  for (let imageUrl of work.urls) {
    imgElement = document.createElement('img');
    imgElement.setAttribute('src', imageUrl);
    imgElement.setAttribute('alt', work.title);
    divElement.appendChild(imgElement);
    galleryImages.push(imgElement);
  }

  // creo los botones de anterior y siguiente si hay más de una imagen
  if (work.urls.length > 1) {
    iElement = document.createElement('i');
    iElement.setAttribute('class', 'fas fa-chevron-left');
    iElement.addEventListener(
      'click',
      showPrevImage
    );
    divElement.appendChild(iElement);
  
    iElement = document.createElement('i');
    iElement.setAttribute('class', 'fas fa-chevron-right');
    iElement.addEventListener(
      'click',
      showNextImage
    );
    divElement.appendChild(iElement);

    // genero los círculos para navegar por las imágenes
    wrapElement = document.createElement('div');
    wrapElement.setAttribute('class', 'selectors-wrapper');

    for (let i = 0; i < work.urls.length; i++) {
      spanElement = document.createElement('span');
      spanElement.addEventListener(
        'click',
        function () {
          showImageWithIndex(i);
        }
      );
      if (i == 0) spanElement.classList.add('active');
      wrapElement.appendChild(spanElement);
      galleryDots.push(spanElement);
    }
    
    divElement.appendChild(wrapElement);
  }

  galleryElement.appendChild(divElement);

  // agrego las descripciones de la imagen
  pElement = document.createElement('p');
  pElement.innerHTML = work.title;
  galleryElement.appendChild(pElement);
  descDiv.appendChild(pElement.cloneNode(true));

  pElement = document.createElement('p');
  pElement.innerHTML = work.features;
  galleryElement.appendChild(pElement);
  descDiv.appendChild(pElement.cloneNode(true));

  divElement.children[0].style.opacity = 1;
  shownImageIndex = 0;
}

function generateIndex()
{
  var indexElement;
  var divElement;
  var imgElement;
  var id;

  indexElement = document.querySelector('.works-index');

  // ahora genero el índice de los trabajos
  indexElement.innerHTML = '';
  selectedWorkIndex = gallery[0].id;
  id = 1;

  // por cada trabajo uso la primera imagen como índice
  for (let work of gallery)
  {
    divElement = document.createElement('div');
    imgElement = document.createElement('img');
    imgElement.setAttribute('src', work.urls[0]);
    imgElement.setAttribute('data-work-id', work.id);
    imgElement.addEventListener(
      'click',
      (ev) => {
        let newSelectedIndex = ev.target.getAttribute('data-work-id');
        generateGallery(newSelectedIndex);

        document
          .querySelector(`[data-work-id="${selectedWorkIndex}"]`)
          .classList.toggle('selected');
        
        ev.target
          .classList.toggle('selected');
        
        selectedWorkIndex = newSelectedIndex;

        window.location = '#';
      }
    )
    if (id == 1 /*selectedWorkIndex*/) imgElement.classList.toggle('selected');

    id++;

    divElement.appendChild(imgElement);
    indexElement.appendChild(divElement);
  }

}

function showPrevImage()
{
  changeToImage(previous);
}

function showNextImage()
{
  changeToImage(next);
}

function showImageWithIndex(i)
{
  changeToImage(i);
}

function changeToImage(i)
{
  galleryImages[shownImageIndex].style.opacity = 0;
  galleryDots[shownImageIndex].classList.toggle('active');

  switch (i) {

    case previous:
      shownImageIndex--;
      if (shownImageIndex < 0) {
        shownImageIndex = galleryImages.length - 1;
      }
      break;
    
    case next:
      shownImageIndex++;
      if (shownImageIndex == galleryImages.length) {
        shownImageIndex = 0;
      }
      break;
    
    default:
      shownImageIndex = i;
      break;
  }

  galleryImages[shownImageIndex].style.opacity = 1;
  galleryDots[shownImageIndex].classList.toggle('active');
}

function saveAudioTime()
{
  let t = $('#audio-track')[0]
  sessionStorage.setItem('audio-time', t.currentTime)
}

function resetAudio()
{
  sessionStorage.setItem('audio-state', 'playing')
  sessionStorage.setItem('audio-time', 0)
}

function playMusic(t)
{
  t.play()

  $('header i.fa-music')
    .attr('title', 'music on')

  $('header i.fa-volume-up')
    .css('display', 'inline')
    .attr('title', 'music on')

  $('header i.fa-volume-mute')
    .css('display', 'none')
    .attr('title', 'music on')
}

function pauseMusic(t)
{
  t.pause()

  $('header i.fa-music')
    .attr('title', 'music off')

  $('header i.fa-volume-up')
    .css('display', 'none')
    .attr('title', 'music off')

  $('header i.fa-volume-mute')
    .css('display', 'inline')
    .attr('title', 'music off')
}