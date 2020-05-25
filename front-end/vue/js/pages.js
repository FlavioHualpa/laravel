window.onload = function () {
   
   let app = new Vue({
      el: '.tab-component',

      data: {
         tabStops: [
            {
               title: 'Primera',
               index: 0,
               z: 10
            },
            {
               title: 'Segunda',
               index: 1,
               z: 9
            },
            {
               title: 'Tercera',
               index: 2,
               z: 8
            },
            {
               title: 'Cuarta',
               index: 3,
               z: 7
            },
            {
               title: 'Quinta',
               index: 4,
               z: 6
            }
         ],

         activeTab: 0
      },

      mounted() {
         for (index = 0, z = 10; index < this.totalTabs; index++, z--) {
            this.tabStops[index].index = index;
            this.tabStops[index].z = z;
         }
      },

      methods:
      {
         zIndex(index)
         {
            return `z-index: ${index};`
         },

         changeToTab(index)
         {
            let z = 10

            this.tabStops[index].z = z

            for (i = index + 1; i < this.totalTabs; i++) {
               z--
               this.tabStops[i].z = z
            }

            z = 10

            for (i = index - 1; i >= 0; i--) {
               z--
               this.tabStops[i].z = z
            }

            this.activeTab = index
         }
      },

      computed: {
         totalTabs() {
            return this.tabStops.length
         }
      }
      
   })

}
