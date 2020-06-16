function showModal(thumb)
{
   let bg = document.querySelector('.modal-bg')
   let modal = document.querySelector('.modal-box')
   let sourceImg = thumb.querySelector('img')
   let modalImg = document.querySelector('.modal-img')

   bg.style.display = 'block'
   modal.style.display = 'block'
   modalImg.src = sourceImg.src
}

function closeModal()
{
   let bg = document.querySelector('.modal-bg')
   let modal = document.querySelector('.modal-box')
   modal.style.display = 'none'
   bg.style.display = 'none'
}

function initModal()
{
   let bg = document.querySelector('.modal-bg')
   let modal = document.querySelector('.modal-box')
   let thumbs = document.querySelectorAll('.perf-thumb')

   let w = Math.min(window.innerWidth, 800)
   let h = w * 3.0 / 4.0

   modal.style.setProperty('--w', w + 'px')
   modal.style.setProperty('--h', h + 'px')

   bg.addEventListener(
      'click',
      () =>
      {
         closeModal()
      }
   )

   modal.querySelector('i').addEventListener(
      'click',
      () =>
      {
         closeModal()
      }
   )

   thumbs.forEach(
      el =>
      {
         el.addEventListener(
            'click',
            () => { showModal(el) }
         )
      }
   )
}

initModal()