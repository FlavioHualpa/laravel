Vue.component(
   'list-panel',
   {
      template: `
         <div class="list-row">
            <list title="Todas" filter=""></list>
            <list title="Incompletas" filter="incomplete"></list>
            <list title="Completas" filter="complete"></list>
         </div>
      `,

      data() {
         return {
            items: [
               { text: 'Ir a la granja', completed: false },
               { text: 'Comprar los elementos', completed: true },
               { text: 'Leer el libro grande', completed: false },
               { text: 'Practicar canto', completed: true },
               { text: 'Lavar la ropa', completed: true },
               { text: 'Planchar la ropa', completed: false },
               { text: 'Ir a la reunión', completed: false },
               { text: 'Preparar el almuerzo', completed: true },
            ]
         }
      }
   }
)

Vue.component(
   'list',
   {
      props: ['title', 'filter' ],
      
      template: `
         <div class="list-col">
            <h3>{{ title }}</h3>
            <ul v-if="filter == ''">
               <li v-for="item in $parent.items">
                  {{ item.text }}
                  <i class="far fa-check-circle"
                     @click="toggleItemState(item)"
                     v-if="! item.completed"
                  >
                  </i>
                  <i class="far fa-circle"
                     @click="toggleItemState(item)"
                     v-if="item.completed"
                  >
                  </i>
               </li>
            </ul>
            <ul v-if="filter == 'complete'">
               <li v-for="item in completedItems"
                  v-text="item.text"
               >
               </li>
            </ul>
            <ul v-if="filter == 'incomplete'">
               <li v-for="item in incompletedItems"
                  v-text="item.text"
               >
               </li>
            </ul>
         </div>
      `,

      // data() {
      //    return {
      //       items: [
      //          { text: 'Ir a la granja', completed: false },
      //          { text: 'Comprar los elementos', completed: true },
      //          { text: 'Leer el libro grande', completed: false },
      //          { text: 'Practicar canto', completed: true },
      //          { text: 'Lavar la ropa', completed: true },
      //          { text: 'Planchar la ropa', completed: false },
      //          { text: 'Ir a la reunión', completed: false },
      //          { text: 'Preparar el almuerzo', completed: true },
      //       ]
      //    }
      // },

      computed: {
         completedItems() {
            return this.$parent.items.filter(el => el.completed)
         },

         incompletedItems() {
            return this.$parent.items.filter(el => ! el.completed)
         }
      },

      methods: {
         toggleItemState(item) {
            item.completed = !item.completed
            
            // let index = this.items.indexOf(item)
            
            // this.items[index].completed = !this.items[index].completed
         }
      }
   }
)
