
window.onload = function ()
{
   let input = document.querySelector('input[type=file]')
   let label = document.querySelector('label.custom-file-label')
   let img = document.querySelector('.element-image')
   let keepImg = document.querySelector('#keep_image')
   let pickButton = document.querySelector('i.fa-images')
   let removeButton = document.querySelector('i.fa-trash-alt')
   let noImageUrl = document.querySelector('#no_img_url').value
   let noImageText = label.innerText
   let lastFile = input.files
   let reader = new FileReader()

   input.addEventListener(
      'change',
      function () {
         let file = input.files[0]
         if (file && file.type.startsWith('image')) {
            reader.readAsDataURL(file)
         }
         else {
            input.files = lastFile
         }
      }
   )

   reader.addEventListener(
      'load',
      function () {
         lastFile = input.files
         label.innerText = input.files[0].name
         img.src = reader.result

         uncheckKeepImage()
      }
   )

   pickButton.addEventListener(
      'click',
      function () {
         input.click()
      }
   )

   removeButton.addEventListener(
      'click',
      function () {
         input.value = null
         lastFile = input.files
         label.innerText = noImageText
         img.src = noImageUrl
         
         uncheckKeepImage()
      }
   )

   function uncheckKeepImage()
   {
      if (keepImg)
         keepImg.checked = false
   }
}
