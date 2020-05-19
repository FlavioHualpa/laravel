window.onload = function() {
	let gal = new Gallery('frutas', 256, 256)
	gal.slideDir = 'left'
	gal.slide()
}

function Gallery(galleryId, sWidth, sHeight)
{
	this.slide = () => {
		setTimeout(() => {
			slideDir == 'right' ? slideRight() : slideLeft()
		}, 2000)
	}

	const NEXT = -1
	const PREVIOUS = -2

	let slides = null
	let slidesIndexes = null
	let slideWidth = null
	let slideHeight = null
	let slideDir = 'left'
	let activeSlide = 0
	let thisInstance = this

	Object.defineProperty(this, 'slideWidth', {
		get: () => slideWidth
	})

	Object.defineProperty(this, 'slideHeight', {
		get: () => slideHeight
	})
		
	Object.defineProperty(this, 'slideDir', {
		get: () => slideDir,
		set: value => {
			if (value != 'right' && value != 'left')
				throw new Error('Los valores válidos para slideDir son left o right')
			
			slideDir = value
		}
	})

	let galleryDiv = document.querySelector(`#${galleryId}`)
	let slidesDiv = galleryDiv.querySelector('.gallery-images')
	let dotsDiv = galleryDiv.querySelector('.gallery-dots')

	slides = slidesDiv.querySelectorAll('img')
	slidesIndexes = []
	slideWidth = sWidth
	slideHeight = sHeight

	galleryDiv.style.width = sWidth + 180 + 'px';
	slidesDiv.style.width = sWidth + 'px';
	slidesDiv.style.height = sHeight + 'px';

	for (i = 0; i < slides.length; i++) {
		slides[i].style.left = i * sWidth + 'px'
		slidesIndexes.push(i)
	}

	if (slides.length)
		slides[0].addEventListener(
			'animationend',
			adjustImagesOffsets
		)

	addGalleryDots(dotsDiv)


	//
	// funciones de apoyo
	//

	function addGalleryDots()
	{
		let n = slides.length

		for (let i = 0; i < n; i++)
		{
			let dot = document.createElement('span')
			dot.classList.add('gallery-dot')
			if (i == 0)
				dot.classList.add('active')
			dot.setAttribute('data-image-id', i)
			dotsDiv.appendChild(dot)
		}
	}

	function slideLeft()
	{
		if (slides.length < 2)
			return;
		
		slides.forEach(el => {
			el.classList.add('slideLeft')
		})

		thisInstance.slide()
	}

	function slideRight()
	{
		if (slides.length < 2)
			return;

		moveTail()

		slides.forEach(el => {
			el.classList.add('slideRight')
		})

		thisInstance.slide()
	}

	function adjustImagesOffsets()
	{
		slides.forEach(el => {
			if (el.classList.contains('slideLeft')) {
				el.classList.remove('slideLeft')
				el.style.left = parseInt(el.style.left) - slideWidth + 'px'
			}
			else {
				el.classList.remove('slideRight')
				el.style.left = parseInt(el.style.left) + slideWidth + 'px'
			}
		})

		if (slideDir == 'left') {
			toggleActiveDot(NEXT)
			moveHead()
		}
		else {
			toggleActiveDot(PREVIOUS)
		}
	}

	function toggleActiveDot(index)
	{
		let next

		if (index === NEXT) {
			next = (activeSlide + 1) % slides.length
		}
		else if (index === PREVIOUS) {
			next = (activeSlide + slides.length - 1) % slides.length
		}
		else {
			next = index
		}

		dotsDiv.children[activeSlide].classList.remove('active')
		dotsDiv.children[next].classList.add('active')
		activeSlide = next
	}

	function moveTail()
	{
		let last = slides.length - 1
		let i = slidesIndexes[last]
		let tail = slidesIndexes.pop()

		slides[i].style.left = -slideWidth + 'px'
		slidesIndexes.unshift(tail)
	}

	function moveHead()
	{
		let last = slides.length - 1
		let i = slidesIndexes[0]
		let head = slidesIndexes.shift()

		slides[i].style.left = last * slideWidth + 'px'
		slidesIndexes.push(head)
	}
}

/*
function Gallery(galleryId, slideWidth, slideHeight)
{
	let gallery = {
		slides: null,
		slidesIndexes: null,
		slideWidth: null,
		slideHeight: null,
		slideDir: 'left',

		slide: () => {
			setTimeout(() => {
				gallery.slideDir == 'right' ? slideRight() : slideLeft()
			}, 2000)
		}
	}

	let galleryDiv = document.querySelector(`#${galleryId}`)
	let slidesDiv = galleryDiv.querySelector('.gallery-images')

	gallery.slides = slidesDiv.querySelectorAll('img')
	gallery.slidesIndexes = []
	gallery.slideWidth = slideWidth
	gallery.slideHeight = slideHeight

	galleryDiv.style.width = slideWidth + 180 + 'px';
	slidesDiv.style.width = slideWidth + 'px';

	for (i = 0; i < gallery.slides.length; i++) {
		gallery.slides[i].style.left = i * gallery.slideWidth + 'px'
		gallery.slidesIndexes.push(i)
	}

	if (gallery.slides.length)
		gallery.slides[0].addEventListener(
			'animationend',
			adjustImagesOffsets
		)

	// al último elemento lo ubicamos atrás del primero
	// para lograr el efecto de deslizamiento continuo

	return gallery

	// funciones de apoyo

	function slideLeft()
	{
		if (gallery.slides.length < 2)
			return;
		
		gallery.slides.forEach(el => {
			el.classList.add('slideLeft')
		})

		gallery.slide()
	}

	function slideRight()
	{
		if (gallery.slides.length < 2)
			return;

		moveTail()

		gallery.slides.forEach(el => {
			el.classList.add('slideRight')
		})

		gallery.slide()
	}

	function adjustImagesOffsets()
	{
		// if (gallery.slideDir == 'right')
		// 	moveTail()
		
		gallery.slides.forEach(el => {
			if (el.classList.contains('slideLeft')) {
				el.classList.remove('slideLeft')
				el.style.left = parseInt(el.style.left) - gallery.slideWidth + 'px'
			}
			else {
				el.classList.remove('slideRight')
				el.style.left = parseInt(el.style.left) + gallery.slideWidth + 'px'
			}
		})

		if (gallery.slideDir == 'left')
			moveHead()
	}

	function moveTail()
	{
		let last = gallery.slides.length - 1
		let i = gallery.slidesIndexes[last]
		let tail = gallery.slidesIndexes.pop()

		gallery.slides[i].style.left = -gallery.slideWidth + 'px'
		gallery.slidesIndexes.unshift(tail)
	}

	function moveHead()
	{
		let last = gallery.slides.length - 1
		let i = gallery.slidesIndexes[0]
		let head = gallery.slidesIndexes.shift()

		gallery.slides[i].style.left = last * gallery.slideWidth + 'px'
		gallery.slidesIndexes.push(head)
	}
}
*/

/*
function setUpGallery()
{
	let galleryDiv = document.querySelector('.gallery-images')

	gallery.slides = galleryDiv.querySelectorAll('img')
	gallery.slidesIndexes = []
	gallery.slideWidth = galleryDiv.clientWidth

	for (i = 0; i < gallery.slides.length; i++) {
		gallery.slides[i].style.left = i * gallery.slideWidth + 'px'
		gallery.slidesIndexes.push(i)
	}

	gallery.slides[0].addEventListener('animationend', adjustImagesOffsets)

	// al último elemento lo ubicamos atrás del primero
	// para lograr el efecto de deslizamiento continuo

	moveTail(gallery)

	setTimeout(() => {
		slideLeft(gallery)
	}, 2000)
}

function slideLeft(gallery)
{
	gallery.slides.forEach(el => {
		el.classList.add('slideLeft')
	})

	setTimeout(() => {
		slideLeft(gallery)
	}, 2000)
}

function adjustImagesOffsets()
{
	let dir

	gallery.slides.forEach(el => {
		if (el.classList.contains('slideLeft')) {
			el.classList.remove('slideLeft')
			el.style.left = parseInt(el.style.left) - gallery.slideWidth + 'px'
			dir = 'left'
		}
		else {
			el.classList.remove('slideRight')
			el.style.left = parseInt(el.style.left) + gallery.slideWidth + 'px'
			dir = 'right'
		}
	})

	if (dir == 'left') {
		moveHead(gallery)
	}
	else {
		moveTail(gallery)
	}
}

function moveTail(gallery)
{
	let last = gallery.slides.length - 1
	let i = gallery.slidesIndexes[last]
	let tail = gallery.slidesIndexes.pop()

	gallery.slides[i].style.left = -gallery.slideWidth + 'px'
	gallery.slidesIndexes.unshift(tail)
}

function moveHead(gallery)
{
	let last = gallery.slides.length - 1
	let i = gallery.slidesIndexes[0]
	let head = gallery.slidesIndexes.shift()

	gallery.slides[i].style.left = last * gallery.slideWidth + 'px'
	gallery.slidesIndexes.push(head)
}
*/