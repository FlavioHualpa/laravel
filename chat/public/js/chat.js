Echo.private('chat')
   .listen('MessageSent', data => {
      receiveMessage(data)
   })

function sendMessage()
{
   const message = document.getElementById('message').value
   const _token = document.querySelector('meta[name=csrf-token]')
      .getAttribute('content')
   const search = new URLSearchParams(window.location.search)
   const channel = search.get('channel')

   event.preventDefault()

   if (message == null || channel == null)
      return
   
   axios.post('/send', { message, channel, _token })
      .then(response => {
         // console.log(response.data)

         // agregar el mensaje al historial del chat
         addMessageToList({
            user: response.data[0],
            message: response.data[1]
         })

         // limpiar el mensaje escrito
         document.getElementById('message').value = null
      })
}

function receiveMessage(data)
{
   const search = new URLSearchParams(window.location.search)
   const channel = search.get('channel')

   if (channel != data.message.channel_id)
      return
   
   addMessageToList(data)
}

function addMessageToList(data)
{
   const list = document.getElementById('messagesList')

   const container = document.createElement('div')
   container.setAttribute('class', 'border-t border-gray-300 p-3')
   
   const header = document.createElement('div')
   header.setAttribute('class', 'flex justify-between')
   
   const headerLeft = document.createElement('p')
   headerLeft.setAttribute('class', 'text-green-400 text-sm font-bold')
   
   const headerRight = document.createElement('p')
   headerRight.setAttribute('class', 'text-green-400 text-xs')
   
   headerLeft.appendChild(
      document.createTextNode(data.user.name)
   )

   headerRight.appendChild(
      document.createTextNode(toShortDate(data.message.created_at))
   )

   header.appendChild(headerLeft)
   header.appendChild(headerRight)

   const body = document.createElement('p')
   body.setAttribute('class', 'text-gray-600')
   
   body.appendChild(
      document.createTextNode(data.message.content)
   )

   container.appendChild(header)
   container.appendChild(body)
   list.appendChild(container)
}

function toShortDate(dateString)
{
   const date = new Date(dateString)

   return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()} ${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`
}
