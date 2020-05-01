let btn = document.querySelector('.btn')
btn.addEventListener(
   'click',
   function () {
      Swal.fire({
         title: 'Descargas',
         text: 'Confirmas la descarga?',
         icon: 'question',
         confirmButtonText: 'Sí',
         cancelButtonText: 'No',
         showCancelButton: true
      })
      .then(function (result) {
         if (result.value) {

            request = new FormData()
            request.append('key', 25)

            fetch('get_pdf_name.php', {
               method: 'POST',
               body: request
            })
            .then(function (response) {
               return response.json()
            })
            .then(function (data) {
               if (data) {
                  // console.log(data)
                  window.location = data[0]
               }
            })
         
         }
      })
   }
)

let app = new Vue({
   el: '#app',

   data: {
      message: 'Descargando...',
      percent: 0,
      isInfoVisible: false,
      info: '',

      items: [
         {
            title: 'naranjas',
            description: 'Frescas y dulces'
         },
         {
            title: 'peras',
            description: 'Maduras y saludables'
         },
         {
            title: 'duraznos',
            description: 'Tiernos y deliciosos'
         },
         {
            title: 'frutillas',
            description: 'Grandes y jugosas'
         },
         {
            title: 'limones',
            description: 'Llenos de vitaminas'
         },
         {
            title: 'kiwis',
            description: 'Los mejores que puede encontrar'
         },
         {
            title: 'bananas',
            description: 'Dulces y carnosas'
         }
      ]
   },

   methods: {
      showInfo(text) {
         this.info = text
         this.isInfoVisible = true
      },

      hideInfo() {
         this.isInfoVisible = false
      },
   }
})

app.percent = 15;

Vue.component('progressbar', {
   template: `
      <div>
         <label for="file">{{ message }}</label>
         <br>
         <progress id="file"
            :value="percent"
            @mousemove="incrementProgress"
            max="100"
         >
            {{ percent }}%
         </progress>
      </div>
   `,

   props: {
      percent: {
         type: String,
         default: 0
      },
      message: {
         type: String,
         required: true
      }
   },

   data() {
      return {

      }
   },

   methods: {
      incrementProgress() {
         this.percent += 0.1
      }
   }
})
